-- @block1
CREATE TABLE users(
    id INT(11) AUTO_INCREMENT NOT NULL,
    PRIMARY KEY(id),
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    age INT(11) NOT NULL 
);

-- @block2
CREATE TABLE posts(
    id INT(11) AUTO_INCREMENT NOT NULL,
    PRIMARY KEY(id),
    user_id INT(11) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    url VARCHAR(255) NULL
);

-- @block3
ALTER TABLE posts ADD FOREIGN KEY (user_id) REFERENCES users(id)ON DELETE CASCADE ON UPDATE RESTRICT;
