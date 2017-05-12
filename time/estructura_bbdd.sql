create schema time_db;

create table work_done (
    id int auto_increment,
    data date,
    hora_inicial time,
    hora_final time,
    client varchar(15),
    concepte varchar(20),
    descripcio varchar(50),
    nuvol int,
    primary key (id)
);