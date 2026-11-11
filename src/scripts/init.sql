-- DDL
-- Criação do banco
CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(64) NOT NULL UNIQUE,
    senha VARCHAR(64) NOT NULL,
    nome VARCHAR(32) NOT NULL
);

CREATE TABLE IF NOT EXISTS items(
    id INT AUTO_INCREMENT PRIMARY KEY,
    uid INT NOT NULL, FOREIGN KEY (uid) REFERENCES users(id),
    preco DOUBLE NOT NULL,
    qtd INT DEFAULT 1,
    titulo VARCHAR(64) NOT NULL,
    descr VARCHAR(1024),
    cat VARCHAR(16) CHECK (cat IN ('comida','roupa','outro')) DEFAULT 'outro',
    FULLTEXT idx (titulo, descr, cat)
);

CREATE TABLE IF NOT EXISTS carrinhos(
    uid INT NOT NULL, FOREIGN KEY (uid) REFERENCES users(id),
    iid INT NOT NULL, FOREIGN KEY (iid) REFERENCES items(id)
);

CREATE TABLE IF NOT EXISTS mensagens(
    sender INT NOT NULL, FOREIGN KEY (sender) REFERENCES users(id),
    getter INT NOT NULL, FOREIGN KEY (getter) REFERENCES users(id),
    texto VARCHAR(256) NOT NULL
);
-- DML
-- valores placeholder
INSERT INTO users(email, senha, nome) VALUES
('asdf@mail.com','senha','ayin'),
('zxcv@mail.com','senha','hokma'),
('qwerty@ml.com','senha','carmen');

INSERT INTO items(uid, preco, qtd, titulo, descr, cat) VALUES
(1,100,500,'enkefalina','energia extraída de seres humanos','comida'),
(1,250,1,'angela','assistente robô','outro'),
(3,0,1000,'E.G.O. grátis','sinal de força de vontade','roupa');

INSERT INTO carrinhos VALUES
(1,1),
(1,2),
(1,3);

INSERT INTO mensagens VALUES
(3,1,'its all your fault'),
(1,3,'you literally did it to yourself'),
(3,1,'what about your little robot assistant'),
(2,1,'clocks are so interesting'),
(2,1,'like, really, have you ever took any interest in watchmaking?');