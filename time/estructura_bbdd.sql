create schema time_db;

create table work_done (
    id int auto_increment,
    data date,
    hora_inicial time,
    hora_final time,
    temps_total decimal(10,2),
    -- tipus_feina int,
    client varchar(35),
    concepte varchar(25),
    descripcio varchar(250),
    nuvol tinyint(2),
    primary key (id)
);

create table hores_mes(
    mes int,
    any int,
    hores int,
    primary key(mes, any)
);