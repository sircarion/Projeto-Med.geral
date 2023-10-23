-- Crie o banco de dados
CREATE DATABASE hospital;
USE hospital;

-- Crie as tabelas
CREATE TABLE paciente (
    id_pac int(4) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome varchar(25) NOT NULL,
    senha varchar(255) NOT NULL,
    cpf varchar(14) NOT NULL,
    data_nascimento date NOT NULL,
    email varchar(255) NOT NULL
);

CREATE TABLE medico (
    crm char(6) NOT NULL PRIMARY KEY,
    nome varchar(25) NOT NULL,
    especialidade varchar(15) NOT NULL
);

CREATE TABLE material (
    id_material int(4) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome varchar(25) NOT NULL
);

CREATE TABLE medicamentos (
    id_medicamento int(4) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome varchar(25) NOT NULL
);

CREATE TABLE fornecedores (
    id_fornecedor int(4) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome varchar(25) NOT NULL
);

CREATE TABLE consulta (
    id_consulta int(6) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    data datetime NOT NULL,
    id_pac int(4) NOT NULL,
    crm char(6) NOT NULL,
    material int(4) NOT NULL,
    medicamento int(4) NOT NULL,
    fornecedor int(4) NOT NULL,
    carteira varchar(12) NOT NULL,
    FOREIGN KEY (crm) REFERENCES medico(crm),
    FOREIGN KEY (id_pac) REFERENCES paciente(id_pac),
    FOREIGN KEY (material) REFERENCES material(id_material),
    FOREIGN KEY (medicamento) REFERENCES medicamentos(id_medicamento),
    FOREIGN KEY (fornecedor) REFERENCES fornecedores(id_fornecedor),
    UNIQUE KEY (data, crm)
);

INSERT INTO medico (crm, nome, especialidade)
VALUES
    ('CRM123', 'Dr. João', 'Cardiologista'),
    ('CRM456', 'Dra. Maria', 'Pediatra'),
    ('CRM789', 'Dr. Pedro', 'Dermatologista'),
    ('CRM101', 'Dra. Ana', 'Ginecologista'),
    ('CRM202', 'Dr. Carlos', 'Ortopedista');

INSERT INTO fornecedores (nome)
VALUES
    ('Fornecedor A'),
    ('Fornecedor B'),
    ('Fornecedor C'),
    ('Fornecedor D'),
    ('Fornecedor E');
INSERT INTO medicamentos (nome)
VALUES
    ('Medicamento 1'),
    ('Medicamento 2'),
    ('Medicamento 3'),
    ('Medicamento 4'),
    ('Medicamento 5');
INSERT INTO paciente (nome, senha, cpf, data_nascimento, email)
VALUES
    ('Paciente 1', 'senha1', '111.111.111-11', '1990-01-01', 'paciente1@example.com'),
    ('Paciente 2', 'senha2', '222.222.222-22', '1995-02-02', 'paciente2@example.com'),
    ('Paciente 3', 'senha3', '333.333.333-33', '1985-03-03', 'paciente3@example.com'),
    ('Paciente 4', 'senha4', '444.444.444-44', '1980-04-04', 'paciente4@example.com'),
    ('Paciente 5', 'senha5', '555.555.555-55', '1975-05-05', 'paciente5@example.com');
