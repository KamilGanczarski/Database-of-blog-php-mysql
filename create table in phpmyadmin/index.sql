DROP DATABASE IF EXISTS LoginSystem;
CREATE DATABASE LoginSystem DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci;
USE LoginSystem;

CREATE TABLE users
(
    id bigint unsigned primary key auto_increment,
    username varchar(50) not null,
    password varchar(50) not null
);

INSERT INTO users(id, username, password) values
  (1, 'admin', 'admin'),
  (2, 'admin0', 'admin0'),
  (3, 'admin1', 'admin1');

show databases;

SELECT * FROM users;


-- drop table if exists ocena;

-- create table uczen
-- (
-- 	id bigint unsigned primary key auto_increment,
-- 	id_klasa bigint unsigned not null,
-- 	imie varchar(50) not null,
-- 	nazwisko varchar(50) not null,
--
-- 	foreign key (id_klasa) references klasa(id)
-- )
-- engine=InnoDB default charset=utf8mb4 collate=utf8mb4_polish_ci;
--
-- create table kontakt
-- (
-- 	id bigint unsigned primary key,
-- 	email varchar(50) null unique,
-- 	telefon char(50) null unique,
--
-- 	foreign key (id) references uczen(id)
-- )
-- engine=InnoDB default charset=utf8mb4 collate=utf8mb4_polish_ci;
--
-- create table przedmiot
-- (
-- 	id bigint unsigned primary key auto_increment,
-- 	nazwa varchar(50) not null unique,
-- 	opis varchar(200) not null default 'Brak.'
-- )
-- engine=InnoDB default charset=utf8mb4 collate=utf8mb4_polish_ci;
--
-- create table ocena
-- (
-- 	id_uczen bigint unsigned not null,
-- 	id_przedmiot bigint unsigned not null,
-- 	wartosc tinyint not null,
--
-- 	primary key (id_uczen, id_przedmiot),
-- 	foreign key (id_uczen) references uczen(id),
-- 	foreign key (id_przedmiot) references przedmiot(id)
-- )
-- engine=InnoDB default charset=utf8mb4 collate=utf8mb4_polish_ci;
--
-- system echo 'klasa';
-- describe klasa;
-- system echo 'uczen';
-- describe uczen;
-- system echo 'kontakt';
--
-- show create table kontakt;
--
-- describe kontakt;
-- system echo 'przedmiot';
-- describe przedmiot;
-- system echo 'ocena';
-- describe ocena;
--
-- show create table ocena;
--
-- insert into klasa(id, nazwa) values
-- 	(1, '1 MI'),
-- 	(2, '1 TI'),
-- 	(3, '2 TI'),
-- 	(4, '3 TI'),
-- 	(5, '4 TI');
--
-- select * from klasa;
--
-- insert into uczen(id, id_klasa, imie, nazwisko) values
-- 	("1", "1", "Henson", "Powers"),
-- 	("2", "2", "Avery", "Grimes"),
-- 	("3", "3", "Josie", "Collier"),
-- 	("4", "4", "Luella", "Eaton"),
-- 	("5", "5", "Day", "Bartlett"),
-- 	("6", "1", "Lenore", "Nelson"),
-- 	("7", "2", "Serena", "Klein"),
-- 	("8", "3", "Marilyn", "Cooper"),
-- 	("9", "4", "Fannie", "Padilla"),
-- 	("10", "5", "Dale", "Hatfield");
-- select * from uczen;
--
-- insert into kontakt(id, email, telefon) values
-- 	("1", "josiecollier@nexgene.com", "926448265"),
-- 	("2", "averygrimes@sunclipse.com", "883510265"),
-- 	("3", "luellaeaton@eargo.com", "857472222"),
-- 	("4", "hensonpowers@zytrek.com", "955455264"),
-- 	("5", "daybartlett@neurocell.com", "877580231");
-- select * from kontakt;
--
-- insert into przedmiot(id, nazwa, opis) values
-- 	("1", "matematyka", ""),
-- 	("2", "polski", ""),
-- 	("3", "religia", ""),
-- 	("4", "fizyka", ""),
-- 	("5", "język angielski", "");
-- select * from przedmiot;
--
-- insert into ocena(id_uczen, id_przedmiot, wartosc) values
-- 	("1", "1", "4"),
-- 	("2", "2", "6"),
-- 	("3", "3", "6"),
-- 	("4", "4", "4"),
-- 	("5", "5", "4"),
-- 	("6", "1", "4"),
-- 	("7", "2", "6"),
-- 	("8", "3", "6"),
-- 	("9", "4", "2"),
-- 	("10", "5", "2"),
-- 	("11", "1", "4"),
-- 	("12", "2", "4"),
-- 	("13", "3", "2"),
-- 	("14", "4", "4"),
-- 	("15", "5", "4");
-- select * from ocena;
