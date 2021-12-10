create database panamaBeer;
use panamaBeer;

create table tbl_administrador(
    idAdministrador int primary key auto_increment,
    nome varchar(255) not null,
    usuario varchar(255) not null,
    email varchar(255) not null,
    chave_de_autorizacao varchar (10) not null
    );
    
create table tbl_editaveis(
    idEditaveis int primary key auto_increment,
    nossa_istoria varchar(1000) not null,
    nossos_valores varchar(1000) not null
    );
    
create table tbl_produto(
    idProduto int primary key auto_increment,
    nome varchar(255) not null,
    preco varchar(100) not null,
    descricao varchar(1000) not null
    );
    
create table tbl_categoria(
    idCategoria int primary key auto_increment,
    nome varchar(255) not null
    );
    
create table tbl_produtoCategoria (
	idProdutoCategoria int not null auto_increment primary key,
	idProduto int not null,
    idCategoria int not null,
    
    constraint FK_Produto_ProdutoCategoria
    foreign key (idProduto)
    references tbl_produto (idProduto),
    
    constraint FK_Categoria_ProdutoCategoria 
    foreign key (idCategoria)
    references tbl_categoria (idCategoria),
    
    unique index (idProdutoCategoria)
);
        