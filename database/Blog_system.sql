DROP DATABASE IF EXISTS Blog_system;
CREATE DATABASE Blog_system DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci;
USE Blog_system;

CREATE TABLE Permission(
   id INT PRIMARY KEY,
   name VARCHAR(50)
);

CREATE TABLE User(
   id INT PRIMARY KEY,
   username VARCHAR(50) NOT NULL,
   passwrd VARCHAR(50) NOT NULL,
   permission INT NOT NULL REFERENCES Permission
);

CREATE TABLE Type_of_blog(
   id INT PRIMARY KEY,
   name VARCHAR(50)
);

CREATE TABLE Post(
   id INT PRIMARY KEY,
   title VARCHAR(255) NOT NULL,
   username_id INT NOT NULL REFERENCES User,
   create_date DATE,
   typeof_id INT NOT NULL REFERENCES Type_of_blog,
   content TEXT NOT NULL
);

SYSTEM echo 'Permission';
INSERT INTO Permission(id, name) VALUES
   (0, 'admin'),
   (1, 'manager'),
   (2, 'user'),
   (3, 'guest');

SYSTEM echo 'User';
INSERT INTO User(id, username, passwrd, permission) VALUES
  (0, 'admin', 'admin', 0),
  (1, 'admin1', 'admin1', 1),
  (2, 'admin2', 'admin2', 2),
  (3, 'admin3', 'admin3', 2),
  (4, 'admin4', 'admin4', 3);

SYSTEM echo 'Type_of_blog';
INSERT INTO Type_of_blog(id, name) VALUES
   (0, 'C Language'),
   (1, 'Ruby'),
   (2, 'Java'),
   (3, 'Java Script'),
   (4, 'PHP'),
   (5, 'Python'),
   (6, 'Swift'),
   (7, 'Other type');

SYSTEM echo 'Post';
INSERT INTO Post(id, title, username_id, create_date, typeof_id, content) VALUES
  (0, 'Blog about Python', 1, '2019-06-17', 5, 'Python is an advanced programming language that is interpreted, object-oriented and built on flexible and robust semantics.'),
  (1, 'Blog about JavaScript', 0, '2019-06-16', 3, 'Often abbreviated as JS, is a high-level, interpreted programming language that conforms to the ECMAScript specification.'),
  (2, 'Blog about Java', 2, '2019-06-13', 2, 'Java is a general-purpose, object-oriented, high-level programming language with several features that make it ideal for web-based development.'),
  (3, 'Blog about Ruby', 0, '2019-06-12', 1, 'Ruby is an open-sourced, object-oriented scripting language that can be used independently or as part of the Ruby on Rails web framework.'),
  (4, 'Blog about C Language', 2, '2019-06-11', 0, 'C Language is a structure-oriented, middle-level programming language mostly used to develop low-level applications.'),
  (5, 'Blog about Swift', 3, '2019-06-10', 6, 'Swift is Apple’s newest open-source, multi-paradigm programming language for iOS and OS X apps.'),
  (6, 'Blog about PHP', 0, '2019-10-06', 4, 'PHP is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.');

SELECT * FROM Permission;
SELECT * FROM User;
SELECT * FROM Type_of_blog;
SELECT * FROM Post;

-- WORKSHOP

-- SELECT Post.id, Post.title, Post.username_id, User.username, Post.create_date,
--    Post.typeof_id, Type_of_blog.name
--    FROM Post
--    INNER JOIN User ON Post.username_id = User.id
--    INNER JOIN Type_of_blog ON Post.typeof_id = Type_of_blog.id;

-- SELECT Post.id, Post.title, User.username, Post.create_date,
--    Type_of_blog.name AS type, Post.content
--    FROM Post
--    INNER JOIN User ON Post.username_id = User.id
--    INNER JOIN Type_of_blog ON Post.username_id = Type_of_blog.id;