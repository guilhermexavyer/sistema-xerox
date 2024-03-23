CREATE DATABASE sistema_xerox;
DROP DATABASE sistema_xerox;

CREATE TABLE atividade (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dt DATE NOT NULL,
    turma VARCHAR(30) NOT NULL,
    disciplina VARCHAR(30) NOT NULL,
    n_copias INT NOT NULL
);

CREATE TABLE funcionarios (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dt DATE NOT NULL,
    nome VARCHAR(50) NOT NULL,
    n_copias INT NOT NULL
);

-- SELECT
SELECT * FROM atividade ORDER BY id DESC;
SELECT * FROM funcionarios;

-- DELETE
DELETE FROM atividade;
DELETE FROM funcionarios;

-- AUTO_INCREMENT
ALTER TABLE atividade AUTO_INCREMENT = 1;
ALTER TABLE funcionarios AUTO_INCREMENT = 1;