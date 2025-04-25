-- CRIAÇÃO DO BANCO
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
INSERT INTO usuarios (
    nome_completo, usuario, senha, contato, email, perfil,
    criar_equipamento, criar_sala, criar_veiculo, criar_usuario,
    reservar_equipamento, reservar_sala, reservar_veiculo,
    status, criado_em, alterado_em
)
VALUES (
           'Administrador', 'admin', 'admin', '49999999999', 'admin@reservas.com.br', 'administrador',
           'S', 'S', 'S', 'S', 'S', 'S', 'S',
           'ativo', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP
       );
