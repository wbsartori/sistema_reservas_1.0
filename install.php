<?php
//select *
//from usuarios;
//
//drop table equipamentos;
//drop table veiculos;
//drop table salas;
//drop table usuarios;
//drop table reservas;
//
//
//create table reservas
//(
//    id            integer primary key autoincrement,
//    descricao text,
//    tipo text,
//    id_usuario text,
//    items text,
//    status        text,
//    criado_em     text,
//    alterado_em   text
//);
//
///*CREATE TABLES*/
//
//create table usuarios
//(
//    id            integer primary key autoincrement,
//    nome_completo text,
//    usuario       text,
//    senha         text,
//    contato       text,
//    email         text,
//    permissao     text,
//    status        text,
//    criado_em     text,
//    alterado_em   text
//);
//
//create table salas
//(
//    id          integer primary key autoincrement,
//    descricao   text,
//    capacidade  text,
//    status      text,
//    criado_em   text,
//    alterado_em text
//);
//
//create table equipamentos
//(
//    id                        integer primary key autoincrement,
//    data_aquisicao            text,
//    nota_compra               text,
//    numero_patrimonio         text,
//    descricao                 text,
//    equipamento_tipo          text,
//    equipamento_marca         text,
//    modelo                    text,
//    prazo_garantia_fabricante text,
//    prazo_garantia_loja       text,
//    numero_serie              text,
//    status                    text,
//    observacoes               text,
//    criado_em                 text,
//    alterado_em               text
//);
//
//create table veiculos
//(
//    id                  integer primary key autoincrement,
//    placa               text,
//    modelo              text,
//    renavam             text,
//    ano_fabricacao      text,
//    quilometragem_atual text,
//    ano_modelo          text,
//    chassi              text,
//    numero_motor        text,
//    observacoes         text,
//    status              text,
//    veiculo_tipo        text,
//    veiculo_combustivel text,
//    veiculo_cor         text,
//    veiculo_marca       text,
//    veiculo_modelo      text,
//    criado_em           text,
//    alterado_em         text
//);
//
//insert into departments
//values ('1', 'Administrativo', current_timestamp, current_timestamp);
//insert into departments
//values ('2', 'Atacado', current_timestamp, current_timestamp);
//insert into departments
//values ('3', 'Atendimento ao cliente', current_timestamp, current_timestamp);
//insert into departments
//values ('4', 'Auditoria', current_timestamp, current_timestamp);
//insert into departments
//values ('5', 'Comercial', current_timestamp, current_timestamp);
//insert into departments
//values ('6', 'Comunicação', current_timestamp, current_timestamp);
//insert into departments
//values ('7', 'Contabilidade', current_timestamp, current_timestamp);
//insert into departments
//values ('8', 'Controladoria', current_timestamp, current_timestamp);
//insert into departments
//values ('9', 'Credito', current_timestamp, current_timestamp);
//insert into departments
//values ('10', 'Desenvolvimento de negócios', current_timestamp, current_timestamp);
//insert into departments
//values ('11', 'Estratégia', current_timestamp, current_timestamp);
//insert into departments
//values ('12', 'Exportações', current_timestamp, current_timestamp);
//insert into departments
//values ('13', 'Financeiro', current_timestamp, current_timestamp);
//insert into departments
//values ('14', 'Garantia de Qualidade', current_timestamp, current_timestamp);
//insert into departments
//values ('15', 'Importações', current_timestamp, current_timestamp);
//insert into departments
//values ('16', 'Inteligência de Mercado', current_timestamp, current_timestamp);
//insert into departments
//values ('17', 'Legal', current_timestamp, current_timestamp);
//insert into departments
//values ('18', 'Logística', current_timestamp, current_timestamp);
//insert into departments
//values ('19', 'Manutenção', current_timestamp, current_timestamp);
//insert into departments
//values ('20', 'Marketing', current_timestamp, current_timestamp);
//insert into departments
//values ('21', 'Operações', current_timestamp, current_timestamp);
//insert into departments
//values ('22', 'Pesquisa e Desenvolvimento', current_timestamp, current_timestamp);
//insert into departments
//values ('23', 'Planejamento', current_timestamp, current_timestamp);
//insert into departments
//values ('24', 'Planejamento Financeiro', current_timestamp, current_timestamp);
//insert into departments
//values ('25', 'Processos', current_timestamp, current_timestamp);
//insert into departments
//values ('26', 'Produção', current_timestamp, current_timestamp);
//insert into departments
//values ('27', 'Projetos', current_timestamp, current_timestamp);
//insert into departments
//values ('28', 'Recursos Humanos', current_timestamp, current_timestamp);
//insert into departments
//values ('29', 'Seguros', current_timestamp, current_timestamp);
//insert into departments
//values ('30', 'Tesouraria', current_timestamp, current_timestamp);
//insert into departments
//values ('31', 'TI ? Tecnologia da Informação', current_timestamp, current_timestamp);
//insert into departments
//values ('32', 'Treinamento e Desenvolvimento', current_timestamp, current_timestamp);
//insert into departments
//values ('33', 'Tributário, Fiscal', current_timestamp, current_timestamp);
//insert into departments
//values ('34', 'Varejo', current_timestamp, current_timestamp);
//insert into departments
//values ('35', 'Vendas', current_timestamp, current_timestamp);