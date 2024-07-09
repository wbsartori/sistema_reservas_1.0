<?php
//
//
//select * from equipaments;
//drop table equipaments;
//drop table vehicles;
//drop table rooms;
//drop table users;
//drop table users_permissions;
//drop table reservation_rooms;
//drop table reservation_vehicles;
//drop table reservation_equipaments;
//
///*CREATE TABLES*/
//create table users
//(
//    id          integer primary key autoincrement,
//    full_name text,
//    username text,
//    password text,
//    contact text,
//    email text,
//    permission_id text,
//    created_at  text,
//    updated_at  text
//);
//
//create table rooms
//(
//    id          integer primary key autoincrement,
//    descricao text,
//    capacidade text,
//    status text,
//    created_at  text,
//    updated_at  text
//);
//
//create table equipaments
//(
//    id          integer primary key autoincrement,
//    data_aquisicao text,
//    nota_compra text,
//    numero_patrimonio text,
//    descricao text,
//    equipamento_tipo text,
//    equipamento_marca text,
//    modelo text,
//    prazo_garantia_fabricante text,
//    prazo_garantia_loja text,
//    numero_serie text,
//    status text,
//    observacoes text,
//    criado_em  text,
//    alterado_em  text
//);
//
//create table vehicles
//(
//    id          integer primary key autoincrement,
//    plate text,
//    model text,
//    reindeer text,
//    year_manufacture text,
//    current_km text,
//    year_model text,
//    chassi text,
//    number_engine text,
//    comment text,
//    status text,
//    vehicle_type text,
//    vehicle_fuel text,
//    vehicle_color text,
//    vehicle_brand text,
//    vehicle_model text,
//    created_at  text,
//    updated_at  text
//);
//
//insert into departments values('1','Administrativo', current_timestamp, current_timestamp);
//insert into departments values('2','Atacado', current_timestamp, current_timestamp);
//insert into departments values('3','Atendimento ao cliente', current_timestamp, current_timestamp);
//insert into departments values('4','Auditoria', current_timestamp, current_timestamp);
//insert into departments values('5','Comercial', current_timestamp, current_timestamp);
//insert into departments values('6','Comunicação', current_timestamp, current_timestamp);
//insert into departments values('7','Contabilidade', current_timestamp, current_timestamp);
//insert into departments values('8','Controladoria', current_timestamp, current_timestamp);
//insert into departments values('9','Credito', current_timestamp, current_timestamp);
//insert into departments values('10','Desenvolvimento de negócios', current_timestamp, current_timestamp);
//insert into departments values('11','Estratégia', current_timestamp, current_timestamp);
//insert into departments values('12','Exportações', current_timestamp, current_timestamp);
//insert into departments values('13','Financeiro', current_timestamp, current_timestamp);
//insert into departments values('14','Garantia de Qualidade', current_timestamp, current_timestamp);
//insert into departments values('15','Importações', current_timestamp, current_timestamp);
//insert into departments values('16','Inteligência de Mercado', current_timestamp, current_timestamp);
//insert into departments values('17','Legal', current_timestamp, current_timestamp);
//insert into departments values('18','Logística', current_timestamp, current_timestamp);
//insert into departments values('19','Manutenção', current_timestamp, current_timestamp);
//insert into departments values('20','Marketing', current_timestamp, current_timestamp);
//insert into departments values('21','Operações', current_timestamp, current_timestamp);
//insert into departments values('22','Pesquisa e Desenvolvimento', current_timestamp, current_timestamp);
//insert into departments values('23','Planejamento', current_timestamp, current_timestamp);
//insert into departments values('24','Planejamento Financeiro', current_timestamp, current_timestamp);
//insert into departments values('25','Processos', current_timestamp, current_timestamp);
//insert into departments values('26','Produção', current_timestamp, current_timestamp);
//insert into departments values('27','Projetos', current_timestamp, current_timestamp);
//insert into departments values('28','Recursos Humanos', current_timestamp, current_timestamp);
//insert into departments values('29','Seguros', current_timestamp, current_timestamp);
//insert into departments values('30','Tesouraria', current_timestamp, current_timestamp);
//insert into departments values('31','TI ? Tecnologia da Informação', current_timestamp, current_timestamp);
//insert into departments values('32','Treinamento e Desenvolvimento', current_timestamp, current_timestamp);
//insert into departments values('33','Tributário, Fiscal', current_timestamp, current_timestamp);
//insert into departments values('34','Varejo', current_timestamp, current_timestamp);
//insert into departments values('35','Vendas', current_timestamp, current_timestamp);