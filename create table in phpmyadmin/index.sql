DROP DATABASE IF EXISTS LoginSystem;
CREATE DATABASE LoginSystem DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci;
USE LoginSystem;

CREATE TABLE Users
(
  id bigint unsigned primary key auto_increment,
  username varchar(50) not null,
  password varchar(50) not null
);

CREATE TABLE Blog_content
(
  id bigint unsigned primary key auto_increment,
  create_date date,
  username varchar(50) not null,
  title varchar(255) not null,
  content TEXT not null
);

INSERT INTO Users(id, username, password) values
  (1, 'admin', 'admin'),
  (2, 'admin0', 'admin0'),
  (3, 'admin1', 'admin1');

INSERT INTO Blog_content(id, username, create_date, title, content) values
  (1, 'admin', CURRENT_TIMESTAMP,
    'Blog about JavaScript',
  'Often abbreviated as JS, is a high-level, interpreted programming language that conforms to the ECMAScript specification.'),
  (2, 'admin0', CURRENT_TIMESTAMP,
    'Blog about JavaScript',
    'Often abbreviated as JS, is a high-level, interpreted programming language that conforms to the ECMAScript specification.');

show databases;

SELECT * FROM Users;
SELECT * FROM Blog_content;
