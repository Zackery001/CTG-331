CREATE TABLE userdata.comments(
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    created_at TIMESTAMP NOT NULL,
    details LONGTEXT NOT NULL 
);

-- @block
ALTER TABLE userdata.comments ADD FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE RESTRICT;
ALTER TABLE userdata.comments ADD FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE ON UPDATE RESTRICT;
