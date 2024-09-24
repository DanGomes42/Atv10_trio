create database aulas_atv10;
use aulas_atv10;

create table professores (
id_professor int primary key auto_increment,
nome_professor varchar(250) not null,
especialidade varchar(250),
email varchar(100)
);

CREATE TABLE aulas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    data_aula DATE NOT NULL,
    horario TIME NOT NULL,
    sala int not null,
    disciplina VARCHAR(100) NOT NULL,
    atividades text,
    observacoes text,
    nome_professor VARCHAR(250),
);

create table diaria (
id_diaria int primary key auto_increment,
id_professor int,
data_diaria date not null,
horario_diaria time not null,
 foreign key (id_professor) references professores(id_professor)
);