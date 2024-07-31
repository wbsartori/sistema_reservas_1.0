/*CREATE TABLES*/

create table equipamentos
(
    id                        integer
        primary key autoincrement,
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
    criado_em                 text DEFAULT current_timestamp,
    alterado_em               text DEFAULT current_timestamp
);

create table reservas
(
    id             integer
        primary key autoincrement,
    descricao      text,
    tipo           text,
    usuario_id     text,
    equipamento_id text,
    sala_id        text,
    data           text,
    horario        text,
    observacoes    text,
    status         text,
    criado_em      text DEFAULT current_timestamp,
    alterado_em    text DEFAULT current_timestamp
);

create table salas
(
    id          integer
        primary key autoincrement,
    descricao   text,
    capacidade  text,
    status      text,
    criado_em   text DEFAULT current_timestamp,
    alterado_em text DEFAULT current_timestamp
);

create table usuarios
(
    id                   integer
        primary key autoincrement,
    nome_completo        text,
    usuario              text,
    senha                text,
    contato              text,
    email                text,
    perfil               text,
    criar_equipamento    text,
    criar_sala           text,
    criar_veiculo        text,
    criar_usuario        text,
    reservar_equipamento text,
    reservar_sala        text,
    reservar_veiculo     text,
    status               text,
    criado_em            text DEFAULT current_timestamp,
    alterado_em          text DEFAULT current_timestamp
);

create table if not exists salas
(
    id          integer primary key autoincrement,
    descricao   text,
    capacidade  text,
    status      text,
    criado_em   text DEFAULT current_timestamp,
    alterado_em text DEFAULT current_timestamp
);

create table veiculos
(
    id                  integer
        primary key autoincrement,
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
    criado_em           text DEFAULT current_timestamp,
    alterado_em         text DEFAULT current_timestamp
);

create table if not exists reservas
(
    id             integer primary key autoincrement,
    descricao      text,
    tipo           text,
    usuario_id     text null,
    equipamento_id text null,
    sala_id        text null,
    veiculo_id     text null,
    data           text,
    horario        text,
    observacoes    text,
    status         text,
    criado_em      text DEFAULT current_timestamp,
    alterado_em    text DEFAULT current_timestamp
);

INSERT INTO usuarios (id, nome_completo, usuario, senha, contato, email, perfil, criar_equipamento, criar_sala,
                      criar_veiculo, criar_usuario, reservar_equipamento, reservar_sala, reservar_veiculo, status,
                      criado_em, alterado_em)
VALUES (1, 'Administrador', 'admin', 'admin', '49999999999', 'admin@reservas.com.br', 'administrador',
        'S', 'S', 'S', 'S', 'S', 'S', 'S', 'ativo', current_timestamp, current_timestamp);

