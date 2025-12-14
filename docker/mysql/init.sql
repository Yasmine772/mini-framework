CREATE TABLE  users (
                                     id INT AUTO_INCREMENT PRIMARY KEY,
                                     name VARCHAR(100),
                                     email VARCHAR(150)

);
INSERT INTO users (name, email) VALUES
                                    ('Alice', 'alice@example.com'),
                                    ('Bob', 'bob@example.com'),
                                    ('Charlie', 'charlie@example.com');
