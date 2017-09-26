CREATE DATABASE sqlinjection1 DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
GRANT SELECT ON sqlinjection1.* TO "sqli1"@"%" IDENTIFIED BY "x2t4zTjKNfxMnK25zwH48B2ag8DAJF";
FLUSH PRIVILEGES;

CREATE TABLE news (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    title TEXT DEFAULT '' NOT NULL,
    content TEXT DEFAULT '' NOT NULL
);

INSERT INTO news (title, content) VALUES ('Taiwan NO.1', 'Taiwan is NO.1. I love Taiwan');
INSERT INTO news (title, content) VALUES ('BlackMaple', 'BlackMaple is NPC\'s president, and he loves boys.');


CREATE TABLE flag (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    useless_column TEXT DEFAULT 'useless' NOT NULL,
    useless_column1 TEXT DEFAULT 'useless' NOT NULL,
    useless_column2 TEXT DEFAULT 'useless' NOT NULL,
    flag TEXT
);

INSERT INTO flag (flag) VALUES ('NPC{...}');
