CREATE TABLE IF NOT EXISTS module_autos (
    uuid_auto VARCHAR(255) NOT NULL,
    uuid_modell VARCHAR(255) NOT NULL,
    kennzeichen VARCHAR(255),
    uuid_reifen VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS module_mieter (
    uuid_mieter VARCHAR(255) NOT NULL,
    name VARCHAR(255),
    vorname VARCHAR(255),
    adresse VARCHAR(255),
    gebdatum VARCHAR(255),
    führerschein_klassen VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS module_modells (
    uuid_modell VARCHAR(255) NOT NULL,
    uuid_marken VARCHAR(255) NOT NULL,
    ausstattung VARCHAR(255),
    farbe VARCHAR(255),
    bezeichnung VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS module_marken(
    uuid_marken VARCHAR(255) NOT NULL,
    name VARCHAR(255),
    abkürzung VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS module_map_auto_mieter(
    uuid_mietvorgang VARCHAR(255) NOT NULL,
    uuid_auto VARCHAR(255) NOT NULL,
    uuid_mieter VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS module_reifen(
    uuid_reifen VARCHAR(255) NOT NULL,
    bezeichnung VARCHAR(255),
    typ VARCHAR(255),
    hersteller VARCHAR(255)
);

