CREATE DATABASE sqlinjection2 DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
GRANT SELECT ON sqlinjection2.* TO "sqli2"@"%" IDENTIFIED BY "LGCXN9mzxwH4Y3bnSY9bbHXSw8GfZ8";
FLUSH PRIVILEGES;

CREATE TABLE users (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    username TEXT NOT NULL,
    password TEXT NOT NULL
);

INSERT INTO users (username, password) VALUES ('Ax83PKtf27nvz4Kb3YZ5', '5R5ducv8CC86j29YKVDR');
INSERT INTO users (username, password) VALUES ('Gm9DxbLbewN4QgBLZhZr', 'qKxq2LZwU5DbY2MWM3dm');