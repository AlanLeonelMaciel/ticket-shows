-- Creación de la base de datos
create database ticket_shows character set utf8mb4 collate utf8mb4_unicode_ci;
use ticket_shows;

-- Creación de las tablas
create table users (
	id bigint unsigned not null primary key auto_increment,
    email varchar(100) not null,
    password varchar(255) not null,
    role_id bigint unsigned not null
);

create table roles (
    id bigint unsigned not null primary key auto_increment,
    name varchar(50)
);

-- Creación de las relaciones
alter table users
add constraint role_can_be_assigned_to_many_users
foreign key (role_id)
references roles (id);

-- Inserción de datos
insert into roles (name) values
('admin'),
('customer')