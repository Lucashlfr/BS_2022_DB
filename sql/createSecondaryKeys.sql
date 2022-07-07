ALTER TABLE module_autos
    ADD FOREIGN KEY (uuid_modell) REFERENCES module_modells(uuid_modell),
    ADD FOREIGN KEY (uuid_reifen) REFERENCES module_reifen(uuid_reifen);


ALTER TABLE module_modells ADD FOREIGN KEY (uuid_marken) REFERENCES module_marken(uuid_marken);

ALTER TABLE module_map_auto_mieter
    ADD FOREIGN KEY (uuid_auto) REFERENCES module_autos(uuid_auto),
    ADD FOREIGN KEY (uuid_mieter) REFERENCES module_mieter(uuid_mieter);
