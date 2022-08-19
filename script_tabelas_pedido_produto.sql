CREATE DATABASE gm_teste;

use gm_teste;

create table categoria (
	id int not null primary key auto_increment,
	nome varchar(45) not null
);
create table produto(
	id int not null primary key auto_increment,
    nome varchar(45) not null,
    categoria_id int not null,
	CONSTRAINT fk_categoria_id FOREIGN KEY produto(categoria_id) REFERENCES categoria(id)
);

create table pedido(
	id int not null primary key auto_increment,
    data_hora datetime
);

create table pedido_produto(
	id int not null primary key auto_increment,
    pedido_id int not null,
    produto_id int not null,
    CONSTRAINT fk_pedido_id FOREIGN KEY pedido_produto(pedido_id) REFERENCES pedido(id),
    CONSTRAINT fk_produto_id FOREIGN KEY pedido_produto(produto_id) REFERENCES produto(id)
);

INSERT INTO categoria (nome) values('epi'),('uniforme'),('ferramenta');

SELECT * FROM categoria;

INSERT INTO produto (nome, categoria_id) values ('Óculos de Proteção', 1), ('Luvas', 1), ('Protetor Auricular', 1), ('Capacete', 1)
('Camisa feminina (P)', 1), ('Camisa feminina (M)', 1), ('Camisa feminina (G)', 1);

SELECT * FROM pedido;

INSERT INTO pedido (data_hora) values (now());

INSERT INTO pedido_produto (pedido_id, produto_id, quantidade) VALUES (2, 3, '30');

#CONSULTA DO HISTÓRICO

SELECT PE.id AS numero_pedido, PE.data_hora, count(PR.id) AS quantidade_produtos_no_pedido
FROM pedido_produto PP JOIN pedido PE ON PE.id = PP.pedido_id
JOIN produto PR ON PR.id = PP.produto_id
GROUP BY PE.id
ORDER BY PE.data_hora;

#CONSULTA DO PEDIDO POR ID (AINDA NÃO SLUCIONADO)

SELECT PE.id AS numero_pedido, PR.nome, PP.quantidade
FROM pedido_produto PP JOIN pedido PE ON PE.id = PP.pedido_id
JOIN produto PR ON PR.id = PP.produto_id
GROUP BY PR.id;
















