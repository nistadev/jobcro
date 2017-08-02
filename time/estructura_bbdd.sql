create schema time_db;

create table work_done (
    id int auto_increment,
    data date,
    hora_inicial time,
    hora_final time,
    temps_total decimal,
    -- tipus_feina int,
    client varchar(35),
    concepte varchar(25),
    descripcio varchar(250),
    -- nuvol int,
    primary key (id)
);