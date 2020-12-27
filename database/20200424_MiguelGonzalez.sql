create database bibliotecavirtual;
SET SQL_SAFE_UPDATES = 0;
use bibliotecavirtual;
create table PRIVILEGIO_USUARIO(
id int auto_increment,
v_Descripcion varchar(300),
constraint PK_PRIVILEGIO_USUARIO primary key(id),
constraint UQ_PRIVILEGIO_USUARIO_DESCRIPCION unique(v_Descripcion)
);
insert into PRIVILEGIO_USUARIO values (null,'Control total del sistema'),(null,'Permiso para registro y actualización'),(null,'Permiso para registro');
create table USUARIO(
id int auto_increment,
v_TipoUsuario varchar(20) not null,
v_NumeroDocumento varchar(20) not null,
v_Nombres varchar(100) not null,
v_Apellidos varchar(100) not null,
v_Ocupacion varchar(50) not null,
c_Sexo char(1) not null,
v_Telefono varchar(40),
v_Email varchar(255) not null,
v_Direccion varchar(255),
v_Username varchar(30) not null,
v_Password varchar(30) not null,
i_IdPrivilegio int not null,
constraint PK_USUARIO primary key(id),
constraint UQ_NumeroDocumento unique key(v_numeroDocumento),
constraint UQ_Email unique key(v_Email),
constraint UQ_Username unique key(v_Username),
constraint FK_USUARIO_PRIVILEGIO_USUARIO foreign key(i_IdPrivilegio) references PRIVILEGIO_USUARIO(idPrivilegio)
);
alter table usuario add b_Estado bit default 1;
ALTER TABLE `bibliotecavirtual`.`usuario` 
CHANGE COLUMN `v_Ocupacion` `v_Ocupacion` VARCHAR(50) NULL ;
alter table `bibliotecavirtual`.`usuario`
CHANGE COLUMN `v_Password` `v_Password` varchar(200) NOT NULL;