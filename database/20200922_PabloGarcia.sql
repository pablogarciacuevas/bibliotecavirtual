drop table info_libro;
drop table libro;
create table libro(
 id int auto_increment,
 codigo varchar(50),
 precio float,
 ejemplares varchar(100),
 ubicacion varchar(100),
 resumen varchar(255),
 titulo varchar(100),
 autor varchar(100),
 pais varchar(50),
 anio int,
 editorial varchar(100),
 edicion varchar(100),
 url_imagen varchar(255),
 url_pdf varchar(255),
 descargable bit,
 id_empresa int,
 id_categoria int,
 id_proveedor int, 
 constraint PK_libro primary key(id),
 constraint FK_Categoria foreign key(id_categoria) references categoria(id),
 constraint FK_empresa foreign key(id_empresa) references empresa(id),
 constraint FK_proveedor foreign key(id_proveedor) references proveedor(id),
 constraint UQ_codigo unique(codigo)
 )
 

