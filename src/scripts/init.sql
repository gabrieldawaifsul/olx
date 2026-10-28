-- DDL. Criação do banco
CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(64) NOT NULL UNIQUE,
    senha VARCHAR(64) NOT NULL,
    nome VARCHAR(32) NOT NULL
);

CREATE TABLE items(
    id INT AUTO_INCREMENT PRIMARY KEY,
    uid INT NOT NULL, FOREIGN KEY (uid) REFERENCES users(id),
    preco DOUBLE NOT NULL,
    qtd INT DEFAULT 1,
    titulo VARCHAR(64) NOT NULL,
    descr VARCHAR(1024),
    cat VARCHAR(16) CHECK (cat IN ('comida','roupa','outro')) DEFAULT 'outro'
);

CREATE TABLE carrinhos(
    uid INT NOT NULL, FOREIGN KEY (uid) REFERENCES users(id),
    iid INT NOT NULL, FOREIGN KEY (iid) REFERENCES items(id)
);

CREATE TABLE mensagens(
    sender INT NOT NULL, FOREIGN KEY (sender) REFERENCES users(id),
    getter INT NOT NULL, FOREIGN KEY (getter) REFERENCES users(id),
    texto VARCHAR(256) NOT NULL
);
-- DML
-- valores placeholder
INSERT INTO users(email, senha, nome) VALUES
('asdf@mail.com','senha','ayin'),
('zxcv@mail.com','senha','hokma'),
('qwerty@ml.com','senha','carmen'),
('ghjkl@mal.com','senha','dante'),
('tyui@mail.com','senha','lolang');

INSERT INTO items(uid, preco, qtd, titulo, descr, cat) VALUES
(1,100,500,'enke box','like pure energy','comida'),
(1,250,1,'angela','like the doll form bloodborne','outro'),
(3,0,1000,'free EGO','just dont distort lowkey','roupa'),
(4,500,6,'golden bough','better than an enke box','comida'),
(4,0,40,'sloshmael','please just take this off my hands','outro');

INSERT INTO carrinhos VALUES
(1,4),
(3,5),
(2,1),
(2,4),
(5,2);

INSERT INTO mensagens VALUES
(3,1,'kill yourself'),
(3,4,'i NEED clock dante'),
(4,3,'tick tock tick tock'),
(2,1,'i NEED clock ayin'),
(5,4,'SEND THIS TO FIVE FELLOW MANAGERS FOR A FREE HAMHAMPANGPANG DEAL');


-- DQL
-- PROCEDIMENTOS. Queries em SQL que eu pretendo utilizar frequentemente no código. 
DELIMITER $$
CREATE PROCEDURE minhas_mensagens(id INT)
BEGIN
    SELECT sender 
    FROM mensagens
    WHERE getter = id
    UNION
    SELECT getter 
    FROM mensagens
    WHERE sender = id;
END$$

CREATE PROCEDURE minhas_mensagens_com(id1 INT, id2 INT)
BEGIN
    SELECT sender, texto
    FROM mensagens
    WHERE sender = id1 AND getter = id2
    UNION
    SELECT sender, texto
    FROM mensagens
    WHERE sender = id2 AND getter = id2;
END$$

CREATE PROCEDURE meu_carrinho(id INT)
BEGIN
  SELECT i.* 
  FROM items AS i
  JOIN carrinhos AS c 
  ON c.iid = i.id
  JOIN users AS u 
  on c.uid = u.id
  WHERE u.id = id;
END$$

CREATE PROCEDURE meus_items(id INT)
BEGIN
  SELECT i.* 
  FROM items AS i
  JOIN users AS u 
  on i.uid = u.id
  WHERE u.id = id;
END$$

DELIMITER ;
