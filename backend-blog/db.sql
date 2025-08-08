
CREATE DATABASE blog;
USE blog;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content TEXT,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT,
    post_id INT,
    user_id INT,
    FOREIGN KEY (post_id) REFERENCES posts(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (name, email) VALUES 
('user1', 'user1@example.com'),
('user2', 'user2@example.com');

INSERT INTO posts (title, content, user_id) VALUES
('First Post', 'This is the content of the first post.', 1),
('Second Post', 'This is the content of the second post.', 2);

INSERT INTO comments (content, post_id, user_id) VALUES
('comment 1', 1, 2),
('comment 2', 1, 1),
('comment 3', 2, 1);
