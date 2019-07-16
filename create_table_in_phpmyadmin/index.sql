DROP DATABASE IF EXISTS Blog_system;
CREATE DATABASE Blog_system DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci;
USE Blog_system;

CREATE TABLE Users (
  id bigint unsigned primary key auto_increment,
  username varchar(50) not null,
  password varchar(50) not null
);

CREATE TABLE Blog_content (
  id bigint unsigned primary key auto_increment,
  title varchar(255) not null,
  username varchar(50) not null,
  create_date date,
  type varchar(255) not null,
  content TEXT not null
);

INSERT INTO Users(id, username, password) values
  (1, 'admin', 'admin'),
  (2, 'admin0', 'admin0'),
  (3, 'admin1', 'admin1');

INSERT INTO Blog_content(id, title, username, create_date, type, content) values
  (1, 'Python', 'admin0', '2019-06-17', 'Python',
    'Python is an advanced programming language that is interpreted, object-oriented and built on flexible and robust semantics.'),
  (2, 'JavaScript', 'admin', '2019-06-16', 'JavaScript',
    'Often abbreviated as JS, is a high-level, interpreted programming language that conforms to the ECMAScript specification.'),
  (3, 'Java', 'admin1', '2019-06-13', 'Java',
  'Java is a general-purpose, object-oriented, high-level programming language with several features that make it ideal for web-based development.'),
  (4, 'Ruby', 'admin', '2019-06-12', 'Ruby',
  'Ruby is an open-sourced, object-oriented scripting language that can be used independently or as part of the Ruby on Rails web framework.'),
  (5, 'C Language', 'admin1', '2019-06-11', 'C Language',
  'C Language is a structure-oriented, middle-level programming language mostly used to develop low-level applications.'),
  (6, 'Swift', 'admin0', '2019-06-10', 'Swift',
  'Swift is Apple’s newest open-source, multi-paradigm programming language for iOS and OS X apps.');

show databases;

SELECT * FROM Users;
SELECT * FROM Blog_content;
