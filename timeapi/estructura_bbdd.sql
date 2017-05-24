create schema time_db;

create table work_done (
    id int auto_increment,
    data date,
    hora_inicial time,
    hora_final time,
    id_usuari int,
    id_client varchar(15),
    concepte varchar(20),
    descripcio varchar(50),
    nuvol int,
    primary key (id),
    foreign key(id_client) references client(id),
    foreign key(id_usuari) references usuari(id)
);

create table client (
    id int auto_increment;
    adreca varchar(50);
    telfefon varchar(9);
    tipus_moviment char;
    compte varchar(50);
    nif varchar(10);
    preu_hora_r decimal(3,2);
    preu_hora_p decimal(3,2);
);

create table empresa (
    
);