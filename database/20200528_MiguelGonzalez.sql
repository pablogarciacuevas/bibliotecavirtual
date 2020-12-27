create table Catalogo(
id int auto_increment,
id_categoria int not null,
id_libro int not null,
constraint PK_CATALOGO primary key(id),
constraint FK_CATALOGO_CATEGORIA foreign key(id_categoria) references categoria(id),
constraint FK_CATALOGO_LIBRO foreign key(id_libro) references libro(id)
)Engine=InnoDB;

desc Catalogo;

ALTER TABLE info_libro RENAME libro_info;