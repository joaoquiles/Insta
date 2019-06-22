CREATE DATABASE projeto_login;
USE projeto_login;
CREATE TABLE cliente(
       id int AUTO_INCREMENT PRIMARY KEY, 
       nome varchar(30),
       nome_completo varchar(30),
       senha varchar(30)
);
CREATE TABLE pessoa( 
		idPessoa int,
        nome varchar(30) ,
		nome_completo varchar(30),
        senha varchar(30),
        idUsuario int, 
        CONSTRAINT pk_pessoa_id PRIMARY KEY(idPessoa), 
        CONSTRAINT fk_pesCarro FOREIGN KEY (idUsuario) REFERENCES cliente (id) 
);
