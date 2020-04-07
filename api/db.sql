-- The ER model

CREATE DATABASE IF NOT EXISTS `my_neighborhood`;

USE `my_neighborhood`;

CREATE TABLE IF NOT EXISTS `provider` (
    -- GeoJson Structure
    `id_provider` int(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -- Features
    `feat_type` varchar(255) DEFAULT NULL,
    -- Geometry
    `geo_type` varchar(255) DEFAULT NULL,
    -- Latitude
    `geo_coords_lat` float(10,6) DEFAULT NULL,
    -- Longitude
    `geo_coords_lng` float(10,6) DEFAULT NULL,
    -- Properties
    `prop_address` varchar(255) DEFAULT NULL,
    `prop_city` varchar(255) DEFAULT NULL,
    `prop_country` varchar(255) DEFAULT NULL,
    `prop_neighborhood` varchar(255) DEFAULT NULL,
    `prop_number` varchar(255) DEFAULT NULL,
    `prop_postcode` varchar(255) DEFAULT NULL,
    `prop_state` varchar(255) DEFAULT NULL,
    `prop_street` varchar(255) DEFAULT NULL,
    `prop_available` varchar(255) DEFAULT NULL,
    `prop_category` varchar(255) DEFAULT NULL,
    `prop_name` varchar(255) DEFAULT NULL,
    `prop_cell_phone` varchar(20) DEFAULT NULL,
    `prop_cpf` varchar(255) DEFAULT NULL,
    `prop_email` varchar(255) DEFAULT NULL,
    `added_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updation_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `provider` (
    `id_provider`,
    `feat_type`,
    `geo_type`,
    `geo_coords_lat`,
    `geo_coords_lng`,
    `prop_address`,
    `prop_city`,
    `prop_country`,
    `prop_neighborhood`,
    `prop_number`,
    `prop_postcode`,
    `prop_state`,
    `prop_street`,
    `prop_available`,
    `prop_category`,
    `prop_name`,
    `prop_cell_phone`,
    `prop_cpf`,
    `prop_email`
) VALUES (
    NULL,
    'Feature',
    'Point',
    '-19.8876938',
    '-43.9549304',
    'Rua dos Guajajaras, 1707, Barro Preto, Belo Horizonte, MG, Brasil, 30180099',
    'Belo Horizonte',
    'Brazil',
    'Barro Preto',
    '1707',
    '30180099',
    'MG',
    'Rua dos Guajajaras',
    'Ter-Sex (9:00- 13:00 - 14:00-18:00)',
    'Barbeiro',
    'Fabio Dias',
    '31984248321',
    '34568699088',
    'fredsrocha1985@gmail.com'
);

CREATE TABLE IF NOT EXISTS `locale` (
    `id_locale` int(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -- Latitude
    `lat` float(10,6) DEFAULT NULL,
    -- Longitude
    `lng` float(10,6) DEFAULT NULL,
    `country` varchar(255) DEFAULT NULL,
    `state` varchar(255) DEFAULT NULL,
    `city` varchar(255) DEFAULT NULL,
    `neighborhood` varchar(255) DEFAULT NULL,
    `added_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updation_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `locale` (
    `id_locale`,
    `lat`,
    `lng`,
    `country`,
    `state`,
    `city`,
    `neighborhood`
) VALUES (
    NULL,
    '-19.8876938',
    '-43.9549304',
    'Brasil',
    'Minas Gerais',
    'Belo Horizonte',
    'Milionários'
);