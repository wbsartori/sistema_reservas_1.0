-- BANCO DE DADOS
CREATE DATABASE IF NOT EXISTS reservas;
USE reservas;

-- TABELA: equipamentos
CREATE TABLE IF NOT EXISTS equipamentos (
                                            id INT AUTO_INCREMENT PRIMARY KEY,
                                            data_aquisicao            VARCHAR(255),
    nota_compra               VARCHAR(255),
    numero_patrimonio         VARCHAR(255),
    descricao                 VARCHAR(255),
    equipamento_tipo          VARCHAR(255),
    equipamento_marca         VARCHAR(255),
    modelo                    VARCHAR(255),
    prazo_garantia_fabricante VARCHAR(255),
    prazo_garantia_loja       VARCHAR(255),
    numero_serie              VARCHAR(255),
    status                    VARCHAR(255),
    observacoes               VARCHAR(255),
    criado_em                 TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    alterado_em               TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

-- TABELA: reservas
CREATE TABLE IF NOT EXISTS reservas (
                                        id INT AUTO_INCREMENT PRIMARY KEY,
                                        descricao      VARCHAR(255),
    tipo           VARCHAR(255),
    usuario_id     INT,
    equipamento_id INT,
    sala_id        INT,
    veiculo_id     INT,
    data           VARCHAR(255),
    horario        VARCHAR(255),
    observacoes    VARCHAR(255),
    status         VARCHAR(255),
    criado_em      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    alterado_em    TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

-- TABELA: salas
CREATE TABLE IF NOT EXISTS salas (
                                     id INT AUTO_INCREMENT PRIMARY KEY,
                                     descricao   VARCHAR(255),
    capacidade  VARCHAR(255),
    status      VARCHAR(255),
    criado_em   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    alterado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

-- TABELA: usuarios
CREATE TABLE IF NOT EXISTS usuarios (
                                        id                   INT AUTO_INCREMENT PRIMARY KEY,
                                        nome_completo        VARCHAR(255),
    usuario              VARCHAR(255),
    senha                VARCHAR(255),
    contato              VARCHAR(255),
    email                VARCHAR(255),
    perfil               VARCHAR(255),
    criar_equipamento    VARCHAR(1),
    criar_sala           VARCHAR(1),
    criar_veiculo        VARCHAR(1),
    criar_usuario        VARCHAR(1),
    reservar_equipamento VARCHAR(1),
    reservar_sala        VARCHAR(1),
    reservar_veiculo     VARCHAR(1),
    status               VARCHAR(255),
    criado_em            TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    alterado_em          TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

-- TABELA: veiculos
CREATE TABLE IF NOT EXISTS veiculos (
                                        id INT AUTO_INCREMENT PRIMARY KEY,
                                        descricao           VARCHAR(255),
    placa               VARCHAR(255),
    ano_modelo          VARCHAR(255),
    renavam             VARCHAR(255),
    ano_fabricacao      VARCHAR(255),
    quilometragem_atual VARCHAR(255),
    chassi              VARCHAR(255),
    numero_motor        VARCHAR(255),
    observacoes         VARCHAR(255),
    veiculo_tipo        VARCHAR(255),
    veiculo_combustivel VARCHAR(255),
    veiculo_cor         VARCHAR(255),
    veiculo_marca       VARCHAR(255),
    veiculo_modelo      VARCHAR(255),
    status              VARCHAR(255),
    criado_em           TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    alterado_em         TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

-- DADOS INICIAIS

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
      ('Sala de Reunião 1', '10', 'ativo'),
      ('Sala de Treinamento', '30', 'ativo'),
      ('Auditório Principal', '100', 'inativo'),
      ('Sala de Entrevistas', '5', 'ativo'),
      ('Laboratório de Informática', '25', 'inativo'),
      ('Sala de Conferência 2', '15', 'ativo'),
      ('Sala Multiuso', '20', 'inativo'),
      ('Sala de Reunião 2', '8', 'ativo'),
      ('Estúdio de Gravação', '3', 'inativo'),
      ('Sala Técnica', '6', 'ativo');

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
      ('Veículo de apoio 3', 'GHI3J45', '2018', '32345678903', '2017', '89000', '9BWZZZ377VT004253', 'MTR34567', 'Necessita alinhamento', 'utilitário', 'diesel', 'prata', 'Toyota', 'Hilux', 'inativo'),
      ('Veículo executivo', 'JKL4M56', '2022', '42345678904', '2022', '12000', '9BWZZZ377VT004254', 'MTR45678', 'Reservado para diretoria', 'passeio', 'flex', 'azul', 'Honda', 'Civic', 'ativo'),
      ('Van escolar', 'MNO5P67', '2019', '52345678905', '2019', '65000', '9BWZZZ377VT004255', 'MTR56789', 'Uso escolar', 'van', 'diesel', 'amarelo', 'Renault', 'Master', 'ativo'),
      ('Caminhão leve', 'PQR6S78', '2017', '62345678906', '2016', '97000', '9BWZZZ377VT004256', 'MTR67890', 'Troca de pneus recente', 'caminhão', 'diesel', 'branco', 'Mercedes-Benz', 'Accelo', 'ativo'),
      ('Veículo reserva', 'STU7V89', '2020', '72345678907', '2019', '30000', '9BWZZZ377VT004257', 'MTR78901', 'Pouco uso', 'passeio', 'gasolina', 'cinza', 'Chevrolet', 'Onix', 'reserva'),
      ('Carro de ronda', 'VWX8Y90', '2021', '82345678908', '2020', '41000', '9BWZZZ377VT004258', 'MTR89012', 'Uso da segurança', 'passeio', 'flex', 'preto', 'Ford', 'Ka', 'ativo'),
      ('Ambulância', 'YZA9B01', '2019', '92345678909', '2018', '78000', '9BWZZZ377VT004259', 'MTR90123', 'Equipamento completo', 'ambulância', 'diesel', 'branca', 'Fiat', 'Ducato', 'ativo'),
      ('Veículo desativado', 'BCD0E12', '2015', '02345678910', '2014', '150000', '9BWZZZ377VT004260', 'MTR01234', 'Aguardando baixa', 'passeio', 'flex', 'vermelho', 'Peugeot', '206', 'inativo');


INSERT INTO usuarios (
    nome_completo,
    usuario,
    senha,
    contato,
    email,
    perfil,
    criar_equipamento,
    criar_sala,
    criar_veiculo,
    criar_usuario,
    reservar_equipamento,
    reservar_sala,
    reservar_veiculo,
    status
) VALUES
('Administrador', 'admin', 'admin123', '11999999999', 'admin@empresa.com', 'administrador', 'S', 'S', 'S', 'S', 'S', 'S', 'S', 'ativo'),
('Maria Oliveira', 'maria.o', 'senha123', '11988887777', 'maria@empresa.com', 'usuario', 'N', 'N', 'N', 'N', 'S', 'S', 'N', 'ativo'),
('Carlos Souza', 'carlos.s', 'senha123', '11977776666', 'carlos@empresa.com', 'usuario', 'N', 'N', 'N', 'N', 'S', 'N', 'S', 'ativo'),
('Ana Lima', 'ana.l', 'senha123', '11966665555', 'ana@empresa.com', 'usuario', 'N', 'N', 'N', 'N', 'S', 'S', 'S', 'ativo'),
('Pedro Martins', 'pedro.m', 'senha123', '11955554444', 'pedro@empresa.com', 'usuario', 'N', 'N', 'N', 'N', 'N', 'N', 'S', 'inativo');
