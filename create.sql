create table user_t (
    userid     int         primary key auto_increment,
    username    varchar(50) not null unique,
    password    varchar(50) not null
);
