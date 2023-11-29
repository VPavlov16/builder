import copy

class DB:
    def __init__(self, connection_string):
        self.connection_string = connection_string

    def execute_query(self, query):
        print(f"Executing query: {query}")

    def clone(self, deep=False):
        if deep:
            return copy.deepcopy(self)
        else:
            return copy.copy(self)

db_instance = DB("example_connection_string")
db_instance.execute_query("SELECT * FROM users")

shallow_clone = db_instance.clone()
shallow_clone.connection_string = "new_connection_string"

db_instance.execute_query("INSERT INTO products (name) VALUES ('Product 1')")
shallow_clone.execute_query("INSERT INTO products (name) VALUES ('Product 2')")
