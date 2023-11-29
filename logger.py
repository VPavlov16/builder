from datetime import datetime

class Logger:
    _instance = None

    def __new__(cls):
        if cls._instance is None:
            cls._instance = super(Logger, cls).__new__(cls)
            cls._instance._log_file = open("log.txt", "a")
        return cls._instance

    def log(self, message):
        timestamp = datetime.now().strftime("[%Y-%m-%d %H:%M:%S]")
        log_message = f"{timestamp} {message}\n"
        self._log_file.write(log_message)
        print(log_message)

class IProgram:
    def __init__(self):
        self.logger = Logger()

    def log(self, message):
        raise NotImplementedError("Подкласовете трябва да имплементират този метод.")

class MyProgram(IProgram):
    def log(self, message):
        self.logger.log(f"MyProgram: {message}")

my_program = MyProgram()
my_program.log("Съобщение след логване от MyProgram.")

Logger().log("Съобщение след логване.")
