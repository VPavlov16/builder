<?php

class WebPage {
    private $title;
    private $header;
    private $content;
    private $footer;

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setHeader($header) {
        $this->header = $header;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setFooter($footer) {
        $this->footer = $footer;
    }

    public function generateHTML() {
        return "
            <h1>{$this->title}</h1>
            <p>{$this->header}</p>
            <p>{$this->content}</p>
            <p>{$this->footer}</p>
        ";
    }
}

class WebPageBuilder {
    private $webPage;

    public function __construct() {
        $this->webPage = new WebPage();
    }

    public function setTitle($title) {
        $this->webPage->setTitle($title);
        return $this;
    }

    public function setHeader($header) {
        $this->webPage->setHeader($header);
        return $this;
    }

    public function setContent($content) {
        $this->webPage->setContent($content);
        return $this;
    }

    public function setFooter($footer) {
        $this->webPage->setFooter($footer);
        return $this;
    }

    public function build() {
        $result = $this->webPage;
        $this->webPage = new WebPage();
        return $result;
    }
}

class WebPageDirector {
    private $builder;

    public function __construct(WebPageBuilder $builder) {
        $this->builder = $builder;
    }

    public function createArticle($content) {
        return $this->builder->setTitle("Article Title")
                            ->setHeader("Article Header")
                            ->setContent($content)
                            ->setFooter("Article Footer")
                            ->build();
    }

    public function createForm($title, $fields) {
        return $this->builder->setTitle($title)
                            ->setHeader("Form Header")
                            ->setContent("Form Fields: $fields")
                            ->build();
    }
}

$builder = new WebPageBuilder();
$director = new WebPageDirector($builder);

$articlePage = $director->createArticle("Alo alo test test");
$formPage = $director->createForm("Contact Form", "Name, Email, Message");

echo $articlePage->generateHTML();
echo "<hr>";
echo $formPage->generateHTML();
echo "<hr>";
echo "<hr>";
echo "<hr>";
$builder2 = new WebPageBuilder();
$director2 = new WebPageDirector($builder);

$articlePage2 = $director2->createArticle("Alo alo test test ama test2");
$formPage2 = $director2->createForm("REg form", "Imi, po6ta, kostaapi4");

echo $articlePage2->generateHTML();
echo "<hr>";
echo $formPage2->generateHTML();

?>
