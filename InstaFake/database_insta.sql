CREATE DATABASE projeto_login;
USE projeto_login;
CREATE TABLE cliente(
       id int AUTO_INCREMENT PRIMARY KEY, 
       nome varchar(30),
       nome_completo varchar(30),
       senha varchar(30)
);