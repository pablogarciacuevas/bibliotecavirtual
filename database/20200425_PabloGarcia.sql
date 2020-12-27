/*ID ES REQUERIBLE*/
create table categoria(
id int auto_increment,
nombre varchar(50) not null,
constraint PK_Categoria primary key (id),
constraint UQ_Categoria  unique (nombre)
);

create table empresa(
id int auto_increment,
codigo varchar(30) not null,
nombre varchar(100) not null,
telefono varchar(50) null, 
email varchar(200) null,
direccion varchar(50) null, 
simbolo_moneda varchar(50) not null,
anio int not null,
id_usuario int not null,
constraint PK_Empresa primary key(id),
constraint FK_usuario foreign key (id_usuario) references usuario(id),
constraint UQ_nombre unique (nombre)
);

create table proveedor(
id int auto_increment,
nombre varchar(100) not null,
responsable varchar(100) not null,
telefono varchar(50),
email varchar(50),
direccion varchar(255),
constraint PK_proveedor primary key(id),
constraint UQ_nombre unique(nombre)
);

create table libro(
id int auto_increment,
id_empresa int,
id_categoria int,
id_proveedor int,
precio float,
ejemplares varchar(100),
ubicacion varchar(100),
resumen varchar(255),
url_imagen varchar(255),
url_pdf varchar(255),
descargable bit,
constraint PK_libro primary key(id),
constraint FK_Categoria foreign key(id_categoria) references categoria(id),
constraint FK_empresa foreign key(id_empresa) references empresa(id),
constraint FK_proveedor foreign key(id_proveedor) references proveedor(id)
);

create table info_libro(
id int auto_increment,
id_libro int,
codigo varchar(50),
titulo varchar(100),
autor varchar(100),
pais varchar(50),
anio int,
editorial varchar(100),
edicion varchar(100),
constraint PK_infolibro primary key(id),
constraint FK_libro foreign key (id_libro) references libro(id),
constraint UQ_idlibro unique(id_libro),
constraint UQ_codigo unique(codigo)
)
        

