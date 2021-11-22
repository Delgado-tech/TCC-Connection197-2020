create database chat;
use chat;

create table usuario(
nome varchar(50),
tag int(4),
email varchar(60) not null primary key,
senha varchar(16),
autenticacao char(1) -- [S] sim / [N] não
);

create table usuario_perfil(
email varchar(60) not null primary key,
perfil_autoridade char(1), -- [A] admin / [B] moderador / [C] professor / [D] membro Especial / [E] usuario comum
perfil_foto longblob,
perfil_bio varchar(500),
perfil_idade datetime,
randColor char(2) -- 0 á 5 Cor aleatória para foto de perfil padrão
);
/*--------------------------------NOVO-----------------------------*/
create table usuario_configs(
email varchar(60) not null primary key,
receber_solicitacao char(1), -- [S] sim / [N] não
visualizacao_perfil char(1), -- [G] Global / [A] Amigos
visualizacao_avatar char(1), -- [G] Global / [A] Amigos
estilo_pagina int(3) -- [0] Full black [1] Smooth black [2 ] Smooth white [3] Full white
);

create table redefinicao_conta(
email varchar(60),
id_redefinicao varchar(6),
tipo_redefinicao char(1), -- [E] email / [S] senha
hora_envio datetime,
primary key(email, id_redefinicao)
);

create table cadastro_conta(
email varchar(60) not null primary key,
senha varchar(16),
nome varchar(50),
nascimento datetime,
id_verificacao varchar(6)
);
/*-----------------------------------------------------------------*/
create table amigos(
remetente varchar(60),
destinatario varchar(60),
remNome varchar(50),
desNome varchar(50),
hora_envio datetime,
confirmacao char(1), -- [S] Amizade confirmada / [N] Pedido enviado mais não respondido
primary key(remetente, destinatario)
);

create table chatTexto(
id_msg int(255),
codigo_msg int auto_increment not null,
id_conversa int(11),
usuario varchar(60),
remetente varchar(50),
destinatario varchar(50),
mensagem varchar(1000),
ip_usuario varchar(20),
hora_envio datetime,
primary key(codigo_msg, id_conversa,usuario)
);

CREATE TABLE POSTS ( 
post_ID int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
post_IMG longblob, 
post_txt varchar(500),
user_email varchar(60),
hora_publicada datetime,
tipo char(1), -- [P] Pública / [A] Apenas-Amigos / [N] Privada(ou não listada) / [G] Global
curtidas char(1), -- [S] Curtiu / [N] Não Curtiu
link_post varchar(1000)
);

CREATE TABLE POSTS_COMENTARIOS ( 
post_ID int(255), 
user_email varchar(60),
txt_comentario varchar(500)
);

insert into usuario values('Leo Delgado',3774,'leo.delgado@mail.com','1234','S');
insert into usuario_configs values('leo.delgado@mail.com','S','G','G',0);
insert into usuario_perfil(email,perfil_autoridade,randColor) values('leo.delgado@mail.com','A','0');

insert into usuario values('João Negreiros',4242,'joaoneg@betaTester.com','1234','S');
insert into usuario_configs values('joaoneg@betaTester.com','S','G','G',3);
insert into usuario_perfil(email,perfil_autoridade,randColor) values('joaoneg@betaTester.com','A','5');
