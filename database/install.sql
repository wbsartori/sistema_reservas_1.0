/*DROP TABLES*/
drop table equipamentos;
drop table veiculos;
drop table salas;
drop table usuarios;
drop table reservas;

/*CREATE TABLES*/

create table usuarios
(
    id            integer primary key autoincrement,
    nome_completo text,
    usuario       text,
    senha         text,
    contato       text,
    email         text,
    permissao     text,
    status        text,
    criado_em     text,
    alterado_em   text
);

create table salas
(
    id          integer primary key autoincrement,
    descricao   text,
    capacidade  text,
    status      text,
    criado_em   text,
    alterado_em text
);

create table equipamentos
(
    id                        integer primary key autoincrement,
    data_aquisicao            text,
    nota_compra               text,
    numero_patrimonio         text,
    descricao                 text,
    equipamento_tipo          text,
    equipamento_marca         text,
    modelo                    text,
    prazo_garantia_fabricante text,
    prazo_garantia_loja       text,
    numero_serie              text,
    status                    text,
    observacoes               text,
    criado_em                 text,
    alterado_em               text
);

create table veiculos
(
    id                  integer primary key autoincrement,
    descricao           text,
    placa               text,
    ano_modelo          text,
    renavam             text,
    ano_fabricacao      text,
    quilometragem_atual text,
    chassi              text,
    numero_motor        text,
    observacoes         text,
    veiculo_tipo        text,
    veiculo_combustivel text,
    veiculo_cor         text,
    veiculo_marca       text,
    veiculo_modelo      text,
    status              text,
    criado_em           text,
    alterado_em         text
);

create table reservas
(
    id             integer primary key autoincrement,
    descricao      text,
    tipo           text,
    usuario_id     text,
    equipamento_id text,
    sala_id        text,
    veiculo_id     text,
    data           text,
    horario        text,
    observacoes    text,
    status         text,
    criado_em      text,
    alterado_em    text
);
