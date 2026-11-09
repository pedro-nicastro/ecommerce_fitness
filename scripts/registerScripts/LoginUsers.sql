create database users;
use users;
create table usuarios(
ID INT PRIMARY KEY AUTO_INCREMENT,
nome varchar (255),
pass varchar(255),
cpf varchar(50),
mail varchar(255) not null

);