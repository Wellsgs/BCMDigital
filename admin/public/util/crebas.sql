/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     10/12/2009 10:07:29                          */
/*==============================================================*/


drop table if exists TBL_CARRINHO;

drop table if exists TBL_CATEGORIA;

drop table if exists TBL_CIDADE;

drop table if exists TBL_CLIENTE;

drop table if exists TBL_ENTREGA;

drop table if exists TBL_FORNECEDOR;

drop table if exists TBL_ITENS_PEDIDO;

drop table if exists TBL_PEDIDO;

drop table if exists TBL_PRODUTO;

drop table if exists TBL_PROMOCAO;

/*==============================================================*/
/* Table: TBL_CARRINHO                                          */
/*==============================================================*/
create table TBL_CARRINHO
(
   CAR_SESSAO           int not null,
   CAR_QUANTIDADE       numeric(5,2),
   CAR_VALOR            decimal(10,2),
   CAR_DATA             date,
   primary key (CAR_SESSAO)
);

/*==============================================================*/
/* Table: TBL_CATEGORIA                                         */
/*==============================================================*/
create table TBL_CATEGORIA
(
   CAT_CODIGO           int not null,
   CAT_DESCRICAO        varchar(30) not null,
   primary key (CAT_CODIGO)
);

/*==============================================================*/
/* Table: TBL_CIDADE                                            */
/*==============================================================*/
create table TBL_CIDADE
(
   CID_CODIGO           int not null,
   CID_DESCRICAO        varchar(40) not null,
   CID_UF               char(2),
   primary key (CID_CODIGO)
);

/*==============================================================*/
/* Table: TBL_CLIENTE                                           */
/*==============================================================*/
create table TBL_CLIENTE
(
   CLI_CODIGO           int not null,
   CID_CODIGO           int not null,
   CLI_NOME             varchar(40) not null,
   CLI_ENDERECO         varchar(50),
   CLI_NUMERO           varchar(10),
   CLI_COMPLEMENTO      varchar(20),
   CLI_BAIRRO           varchar(30),
   CLI_CEP              char(10),
   CLI_FONERES          varchar(16),
   CLI_FONECEL          varchar(16),
   CLI_FONECOM          varchar(16),
   CLI_CPF              varchar(14),
   CLI_RG               varchar(20),
   CLI_DATACADASTRO     date,
   CLI_DATANASC         date,
   CLI_EMAIL            varchar(60),
   CLI_LOGIN            varchar(10),
   CLI_SENHA            varchar(10),
   CLI_DATAULTCOMP      date,
   CLI_VALOR_ULTCOMP    numeric(10,2),
   CLI_VALOR_TOTAL      numeric(10,2),
   primary key (CLI_CODIGO)
);

/*==============================================================*/
/* Table: TBL_ENTREGA                                           */
/*==============================================================*/
create table TBL_ENTREGA
(
   ENT_CODIGO           int not null,
   CID_CODIGO           int not null,
   ENT_ENDERECO         varchar(50),
   ENT_BAIRRO           varchar(30),
   ENT_CEP              char(10),
   primary key (ENT_CODIGO)
);

/*==============================================================*/
/* Table: TBL_FORNECEDOR                                        */
/*==============================================================*/
create table TBL_FORNECEDOR
(
   FOR_CODIGO           int not null,
   CID_CODIGO           int not null,
   FOR_RAZAOSOCIAL      varchar(40) not null,
   FOR_NOME_FANTASIA    varchar(40),
   FOR_ENDERECO         varchar(50),
   FOR_BAIRRO           varchar(30),
   FOR_FONE             varchar(16),
   FOR_RESPONSAVEL      varchar(50),
   FOR_EMAIL            varchar(60),
   FOR_CNPJ             varchar(18),
   FOR_CEP              varchar(10),
   primary key (FOR_CODIGO)
);

/*==============================================================*/
/* Table: TBL_ITENS_PEDIDO                                      */
/*==============================================================*/
create table TBL_ITENS_PEDIDO
(
   PROD_CODIGO          int not null,
   PED_CODIGO           int not null,
   primary key (PROD_CODIGO, PED_CODIGO)
);

/*==============================================================*/
/* Table: TBL_PEDIDO                                            */
/*==============================================================*/
create table TBL_PEDIDO
(
   PED_CODIGO           int not null,
   CLI_CODIGO           int not null,
   PED_DATA             date,
   PED_HORA             time,
   PED_VALORTOTAL       decimal(10,2),
   PED_VALORFRETE       decimal(10,2),
   PED_STATUS           char(1),
   PED_FORMAPAGTO       char(1),
   PED_OBSERVACAO       text,
   primary key (PED_CODIGO)
);

/*==============================================================*/
/* Table: TBL_PRODUTO                                           */
/*==============================================================*/
create table TBL_PRODUTO
(
   PROD_CODIGO          int not null,
   FOR_CODIGO           int not null,
   CAR_SESSAO           int not null,
   CAT_CODIGO           int not null,
   PROD_DESCRICAO       varchar(40) not null,
   PROD_VALOR           numeric(10,2),
   PROD_QUANTIDADE      numeric(3,1),
   PROD_TIPO            varchar(5),
   PROD_OBS             text,
   PROD_IMAGEM          varchar(60),
   primary key (PROD_CODIGO)
);

/*==============================================================*/
/* Table: TBL_PROMOCAO                                          */
/*==============================================================*/
create table TBL_PROMOCAO
(
   PROM_CODIGO          int not null,
   PROM_DATAINI         date,
   PROM_DATAFIN         date,
   primary key (PROM_CODIGO)
);

alter table TBL_CLIENTE add constraint FK_CIDADES_CLIENTES foreign key (CID_CODIGO)
      references TBL_CIDADE (CID_CODIGO) on delete restrict on update restrict;

alter table TBL_ENTREGA add constraint FK_ENTREGA_CIDADE foreign key (CID_CODIGO)
      references TBL_CIDADE (CID_CODIGO) on delete restrict on update restrict;

alter table TBL_FORNECEDOR add constraint FK_CIDADE_FORNECEDOR foreign key (CID_CODIGO)
      references TBL_CIDADE (CID_CODIGO) on delete restrict on update restrict;

alter table TBL_ITENS_PEDIDO add constraint FK_TBL_ITENS_PEDIDO foreign key (PROD_CODIGO)
      references TBL_PRODUTO (PROD_CODIGO) on delete restrict on update restrict;

alter table TBL_ITENS_PEDIDO add constraint FK_TBL_ITENS_PEDIDO2 foreign key (PED_CODIGO)
      references TBL_PEDIDO (PED_CODIGO) on delete restrict on update restrict;

alter table TBL_PEDIDO add constraint FK_PEDIDO_CLIENTE foreign key (CLI_CODIGO)
      references TBL_CLIENTE (CLI_CODIGO) on delete restrict on update restrict;

alter table TBL_PRODUTO add constraint FK_PRODUTOS_CARRINHO foreign key (CAR_SESSAO)
      references TBL_CARRINHO (CAR_SESSAO) on delete restrict on update restrict;

alter table TBL_PRODUTO add constraint FK_PRODUTO_CATEGORIA foreign key (CAT_CODIGO)
      references TBL_CATEGORIA (CAT_CODIGO) on delete restrict on update restrict;

alter table TBL_PRODUTO add constraint FK_PRODUTO_FORNECEDOR foreign key (FOR_CODIGO)
      references TBL_FORNECEDOR (FOR_CODIGO) on delete restrict on update restrict;

