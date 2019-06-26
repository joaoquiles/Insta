CREATE DATABASE projeto_login;
USE projeto_login;
CREATE TABLE cliente(
       id int AUTO_INCREMENT PRIMARY KEY, 
       nome varchar(30),
       nome_completo varchar(30),
       senha varchar(30)
);
CREATE TABLE pessoa( 
	idTabela int AUTO_INCREMENT PRIMARY KEY,
	idPessoa int,
        nome varchar(30) ,
		nome_completo varchar(30),
        senha varchar(30),
        idUsuario int,  
        CONSTRAINT fk_pesCarro FOREIGN KEY (idUsuario) REFERENCES cliente (id) 
);
