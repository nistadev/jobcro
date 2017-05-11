create schema time_db;

create table work_done (
    id int auto_increment,
    hora_inicial time,
    hora_final time,
    client varchar(15),
    descripcio varchar(50),
    data date,
    concepte varchar(20), 
    primary key (id)
);