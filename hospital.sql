create database hospital;

use hospital;

CREATE TABLE paciente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    data_nascimento DATE NOT NULL,
    email VARCHAR(255) NOT NULL,
);

CREATE TABLE medicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senha VARCHAR(255) NOT NULL,
    crm VARCHAR(15) NOT NULL,
    medico VARCHAR(100) NOT NULL
);


create table if not exists paciente (
	id_pac int(4) auto_increment not null primary key,
	nome varchar(25) not null
);

create table if not exists medico (
	crm char(6) not null primary key,
	nome varchar(25) not null,
	especialidade varchar(15) not null
);

create table if not exists material (
	id_material int(4) auto_increment not null primary key,
	nome varchar(25) not null
);

create table if not exists medicamentos (
	id_medicamento int(4) auto_increment not null primary key,
	nome varchar(25) not null
);

create table if not exists fornecedores (
	id_fornecedor int(4) auto_increment not null primary key,
	nome varchar(25) not null
);

create table if not exists consulta (
	id_consulta int(6) auto_increment not null primary key,
	data datetime not null,
	id_pac int(4) not null,
	crm char(6) not null,
	material int(4) not null,
	medicamento int(4) not null,
	fornecedor int(4) not null,
	carteira varchar(12) not null,
	foreign key (crm) references medico(crm),
	foreign key (id_pac) references paciente(id_pac),
	foreign key (material) references material(id_material),
	foreign key (medicamento) references medicamentos(id_medicamento),
	foreign key (fornecedor) references fornecedores(id_fornecedor),
	unique key (data, crm)
);
