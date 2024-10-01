create database certophp

create table certophp.usuario(
id int primary key auto_increment, 
nome varchar(50),
senha varchar(20)
)

insert into certophp.usuario(nome,senha) values ("teste", "123456");
select * from certophp.usuario;

alter table certophp.usuario add column email varchar(255);