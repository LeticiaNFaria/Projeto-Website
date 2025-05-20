DROP  DATABASE IF EXISTS bakerycoffee;
CREATE DATABASE bakerycoffee;
USE bakerycoffee;

CREATE TABLE usuarios (
  id_usuario int NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  name varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  level char(1) NOT NULL,
  PRIMARY KEY (id_usuario)
);

CREATE TABLE produtos (
  produto_id int NOT NULL AUTO_INCREMENT,
  tipo varchar(100) NOT NULL,
  imagem varchar(200) NOT NULL,
  nome varchar(200) NOT NULL,
  valor decimal(20,2) NOT NULL,
  PRIMARY KEY (produto_id)
);

CREATE TABLE pedidos(
  pedido_id int NOT NULL AUTO_INCREMENT,
  datahora timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  cod_cliente int NOT NULL,
  nome varchar(50) NOT NULL,
  status varchar(20) NOT NULL,
  total decimal(20,2) NOT NULL,
  PRIMARY KEY (pedido_id),
  CONSTRAINT fk_pedidos_clientes FOREIGN KEY (cod_cliente) REFERENCES usuarios (id_usuario)
);

CREATE TABLE pedido_itens(
  codigo int NOT NULL AUTO_INCREMENT,
  produto varchar(200) NOT NULL,
  nome varchar(100) NOT NULL,
  valor decimal(20,2) NOT NULL,
  qtd int NOT NULL,
  codproduto int NOT NULL,
  pedido int NOT NULL,
  status varchar(20) NOT NULL,
  PRIMARY KEY (codigo),
  CONSTRAINT fk_pedido_itens_pedidos FOREIGN KEY (pedido) REFERENCES pedidos (pedido_id),
  CONSTRAINT fk_pedido_itens_produtos FOREIGN KEY (codproduto) REFERENCES produtos (produto_id)
);

INSERT INTO usuarios(username,password,name,email,level) VALUES("admin","$2y$10$1xmCZLn4aZWbhHXEzApXvuZN2vwvmhfkYDPChfau4YZnN5x0AF86O","Administrador","admin@gmail.com","A");
INSERT INTO usuarios(username,password,name,email,level) VALUES ("user","$2y$10$0.7qZ0KARMZgVTwX5f5e7OBpHf3sQNAWkoXZHEW8RK8HkOPurh02W","Usuário","user@gmail.com","U");


insert into produtos(tipo,imagem,nome,valor) values("BEBIDA", "img/cafe.jpg","Café","4.00");
insert into produtos(tipo,imagem,nome,valor) values("BEBIDA", "img/cappuccino.jpg","Cappuccino","5.50");
insert into produtos(tipo,imagem,nome,valor) values("COMIDA", "img/croasaint.jpg","Croasaint","6.00");
insert into produtos(tipo,imagem,nome,valor) values("COMIDA", "img/baguettes.jpg","Baguette","4.50");
insert into produtos(tipo,imagem,nome,valor) values("COMIDA", "img/tortaamora.jpg","Torta de amora","10.00");
insert into produtos(tipo,imagem,nome,valor) values("COMIDA", "img/tortachocolate.jpg","Torta de chocolate","10.00");
insert into produtos(tipo,imagem,nome,valor) values("BEBIDA", "img/sucomelancia.jpg","Suco de melancia","6.00");
insert into produtos(tipo,imagem,nome,valor) values("BEBIDA", "img/sucolaranja.jpg","Suco de laranja","6.00");
