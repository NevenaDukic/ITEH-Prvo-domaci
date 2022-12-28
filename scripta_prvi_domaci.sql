create database iteh;
use iteh;
create table user(id int auto_increment,username varchar(255) unique,password varchar(255)unique,firstName varchar(255),lastName varchar(255),age int, primary key(id,username,password));
create table predstava(id int auto_increment primary key,naziv varchar(255),datum date, brojSlMesta int);
create table karta(id_k int auto_increment,predstava_id int,user_id int, primary key(id_k),foreign key(predstava_id)references predstava(id),foreign key(user_id) references user(id));

insert into predstava(naziv,datum,brojSlMesta) values("Brod plovi za Beograd", '2022-12-22',100);
insert into predstava(naziv,datum,brojSlMesta) values("Mamma mia", '2022-12-22',100);
insert into predstava(naziv,datum,brojSlMesta) values("Brod plovi za Beograd", '2022-12-25',70);
insert into predstava(naziv,datum,brojSlMesta) values("Jadnici", '2022-12-19',90);

select * from predstava;
select * from karta;
select * from user;
