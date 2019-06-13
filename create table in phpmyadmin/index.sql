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
  username varchar(50) not null,
  password varchar(50) not null
);

INSERT INTO Users(id, username, password) values
  (1, 'admin', 'admin'),
  (2, 'admin0', 'admin0'),
  (3, 'admin1', 'admin1');

show databases;

SELECT * FROM users;
