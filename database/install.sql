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


INSERT INTO equipamentos (
    data_aquisicao,
    nota_compra,
    numero_patrimonio,
    descricao,
    equipamento_tipo,
    equipamento_marca,
    modelo,
    prazo_garantia_fabricante,
    prazo_garantia_loja,
    numero_serie,
    status,
    observacoes
) VALUES
      ('2024-01-10', 'NC12345', 'PATR-0001', 'Notebook Dell Latitude', 'Informática', 'Dell', 'Latitude 5420', '12 meses', '6 meses', 'SN1234567890', 'ativo', 'Equipamento em uso'),
      ('2024-02-15', 'NC12346', 'PATR-0002', 'Impressora HP LaserJet', 'Periférico', 'HP', 'LaserJet Pro M404n', '24 meses', '12 meses', 'SN2234567890', 'ativo', 'Em uso no setor de TI'),
      ('2023-11-20', 'NC12347', 'PATR-0003', 'Monitor LG 24"', 'Monitor', 'LG', '24MK430H', '12 meses', '3 meses', 'SN3234567890', 'ativo', 'Designado à sala de reunião'),
      ('2023-12-05', 'NC12348', 'PATR-0004', 'Projetor Epson', 'Audiovisual', 'Epson', 'PowerLite X39', '36 meses', '12 meses', 'SN4234567890', 'ativo', 'Uso compartilhado'),
      ('2024-03-01', 'NC12349', 'PATR-0005', 'Switch Cisco 24 portas', 'Rede', 'Cisco', 'SG350-28', '24 meses', '6 meses', 'SN5234567890', 'ativo', 'Rack da TI'),
      ('2024-03-10', 'NC12350', 'PATR-0006', 'Servidor HP ProLiant', 'Servidor', 'HP', 'DL380 Gen10', '36 meses', '12 meses', 'SN6234567890', 'ativo', 'Servidor principal'),
      ('2023-10-15', 'NC12351', 'PATR-0007', 'Tablet Samsung Galaxy', 'Mobilidade', 'Samsung', 'Galaxy Tab A7', '12 meses', '3 meses', 'SN7234567890', 'ativo', 'Uso em campo'),
      ('2024-01-25', 'NC12352', 'PATR-0008', 'Scanner Epson', 'Periférico', 'Epson', 'DS-410', '24 meses', '6 meses', 'SN8234567890', 'ativo', 'Digitalização de documentos'),
      ('2023-09-30', 'NC12353', 'PATR-0009', 'Nobreak SMS', 'Energia', 'SMS', 'Station II', '12 meses', '3 meses', 'SN9234567890', 'ativo', 'Proteção elétrica da TI'),
      ('2023-11-01', 'NC12354', 'PATR-0010', 'Telefone IP Intelbras', 'Telefonia', 'Intelbras', 'TIP 125i', '12 meses', '3 meses', 'SN1034567890', 'ativo', 'Setor administrativo');

INSERT INTO salas (
    descricao,
    capacidade,
    status
) VALUES
      ('Sala de Reunião 1', '10', 'disponível'),
      ('Sala de Treinamento', '30', 'disponível'),
      ('Auditório Principal', '100', 'ocupada'),
      ('Sala de Entrevistas', '5', 'disponível'),
      ('Laboratório de Informática', '25', 'manutenção'),
      ('Sala de Conferência 2', '15', 'disponível'),
      ('Sala Multiuso', '20', 'ocupada'),
      ('Sala de Reunião 2', '8', 'disponível'),
      ('Estúdio de Gravação', '3', 'reservada'),
      ('Sala Técnica', '6', 'disponível');

INSERT INTO veiculos (
    descricao,
    placa,
    ano_modelo,
    renavam,
    ano_fabricacao,
    quilometragem_atual,
    chassi,
    numero_motor,
    observacoes,
    veiculo_tipo,
    veiculo_combustivel,
    veiculo_cor,
    veiculo_marca,
    veiculo_modelo,
    status
) VALUES
      ('Veículo de serviço 1', 'ABC1D23', '2020', '12345678901', '2019', '45000', '9BWZZZ377VT004251', 'MTR12345', 'Em bom estado', 'utilitário', 'flex', 'branco', 'Fiat', 'Strada', 'ativo'),
      ('Veículo de transporte 2', 'DEF2G34', '2021', '22345678902', '2020', '52000', '9BWZZZ377VT004252', 'MTR23456', 'Última revisão em jan/2024', 'passeio', 'gasolina', 'preto', 'Volkswagen', 'Gol', 'ativo'),
      ('Veículo de apoio 3', 'GHI3J45', '2018', '32345678903', '2017', '89000', '9BWZZZ377VT004253', 'MTR34567', 'Necessita alinhamento', 'utilitário', 'diesel', 'prata', 'Toyota', 'Hilux', 'manutenção'),
      ('Veículo executivo', 'JKL4M56', '2022', '42345678904', '2022', '12000', '9BWZZZ377VT004254', 'MTR45678', 'Reservado para diretoria', 'passeio', 'flex', 'azul', 'Honda', 'Civic', 'ativo'),
      ('Van escolar', 'MNO5P67', '2019', '52345678905', '2019', '65000', '9BWZZZ377VT004255', 'MTR56789', 'Uso escolar', 'van', 'diesel', 'amarelo', 'Renault', 'Master', 'ativo'),
      ('Caminhão leve', 'PQR6S78', '2017', '62345678906', '2016', '97000', '9BWZZZ377VT004256', 'MTR67890', 'Troca de pneus recente', 'caminhão', 'diesel', 'branco', 'Mercedes-Benz', 'Accelo', 'ativo'),
      ('Veículo reserva', 'STU7V89', '2020', '72345678907', '2019', '30000', '9BWZZZ377VT004257', 'MTR78901', 'Pouco uso', 'passeio', 'gasolina', 'cinza', 'Chevrolet', 'Onix', 'reserva'),
      ('Carro de ronda', 'VWX8Y90', '2021', '82345678908', '2020', '41000', '9BWZZZ377VT004258', 'MTR89012', 'Uso da segurança', 'passeio', 'flex', 'preto', 'Ford', 'Ka', 'ativo'),
      ('Ambulância', 'YZA9B01', '2019', '92345678909', '2018', '78000', '9BWZZZ377VT004259', 'MTR90123', 'Equipamento completo', 'ambulância', 'diesel', 'branca', 'Fiat', 'Ducato', 'ativo'),
      ('Veículo desativado', 'BCD0E12', '2015', '02345678910', '2014', '150000', '9BWZZZ377VT004260', 'MTR01234', 'Aguardando baixa', 'passeio', 'flex', 'vermelho', 'Peugeot', '206', 'inativo');
