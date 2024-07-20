create database if not exists nossa_terra
default character set utf8
default collate utf8_general_ci;

create table usuarios(
id_user int auto_increment NOT NULL,
user_name varchar(100) NOT NULL,
user_email varchar(100) NOT NULL,
user_ocupacao varchar(100) NOT NULL default 'Turista',
user_cidade_residencia varchar(100) NOT NULL default 'Huambo, Angola',
user_phone int NOT NULL,
user_genero varchar(10) NOT NULL default 'Masculino',
user_data_nascimento date NOT NULL default NOW(),
user_senha varchar(100) NOT NULL,
primary key(id_user)
)engine=InnoDB;

create table locais(
id_local int auto_increment NOT NULL,
local_nome varchar(100) NOT NULL,
local_introducao text NOT NULL default 'Seu próximo destino',
local_descricao text NOT NULL,
local_localizacao text NOT NULL default 'Huambo',
local_municipio varchar(200) NOT NULL default 'Huambo',
local_foto varchar(200) NOT NULL,
local_adicionado_por varchar(100) NOT NULL,
local_likes int NOT NULL default 0,
local_estado varchar(20) NOT NULL default 'Espera',
primary key(id_local)
)engine=InnoDB;

create table comentarios(
id_comentario int auto_increment NOT NULL,
comentario text NOT NULL,
comentario_user varchar(100) NOT NULL,
comentario_id_local int NOT NULL,
primary key(id_comentario)
)engine=InnoDB;