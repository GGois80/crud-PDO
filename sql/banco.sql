 CREATE DATABASE IF NOT EXISTS empresa_fulls;
 SHOW DATABASES;
 USE empresa_fulls;

-- drop table setores;
CREATE TABLE IF NOT EXISTS setores (
		id_setores  INT PRIMARY KEY AUTO_INCREMENT, 	
        nome		varchar (30)
);

-- drop table funcionarios;
CREATE TABLE IF NOT EXISTS funcionarios(
		id_func		INT PRIMARY KEY AUTO_INCREMENT,
        nome_func 	varchar(30),
        sexo_func 	varchar(5),
        data_nasc 	varchar(15), 
        cpf 		char   (11),
        observacoes text,
        idSetor INT NOT NULL);

select * from setores;

select * from funcionarios;



-- INSERT INTO funcionarioss (nome, sexo, nascimento, obs, id_setor) VALUES ('gois', 'm', '2019-06-12', 'Melhor do mundo 11', '3');

-- UPDATE setores SET nome = 'recursos humanos ' WHERE id_setores = 4;

-- DELETE FROM `empresa_fulls`.`funcionarios` WHERE (`id_func` = '1');
-- DELETE FROM `empresa_fulls`.`funcionarios` WHERE (`id_func` = '2');


