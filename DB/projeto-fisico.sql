create database etec_diet_v2;
use etec_diet_v2;

create table paciente(
	id int auto_increment not null,
    nome varchar(100) not null,
    data_nascimento date not null,
    peso double not null,
    altura double not null,
    sexo varchar(1),
    primary key(id)
);

create table categoria_alimento(
	id int auto_increment not null,
    descricao varchar(100) not null,
    primary key(id)
);

create table alimento(
	id int auto_increment not null,
    nome varchar(100) not null,
    porcao double not null,
    caloria double not null,
    id_categoria_alimento int not null,
    primary key(id),
    foreign key(id_categoria_alimento) references categoria_alimento(id)
);

create table dieta(
	id int auto_increment not null,
    descricao varchar(100) not null,
    data_inicio date not null,
    data_fim date not null,
    id_paciente int not null,
    primary key(id),
    foreign key(id_paciente) references paciente(id)
);

create table refeicao(
	id int auto_increment not null,
    descricao varchar(100) not null,
    horario varchar(100) not null,
    id_dieta int not null,
    primary key(id),
    foreign key(id_dieta) references dieta(id)
);

create table nutriente(
	id int auto_increment not null,
    carboidrato double not null,
    proteina double not null,
    lipideo double not null,
    fibra double not null,
    id_alimento int not null,
    primary key(id),
    foreign key(id_alimento) references alimento(id)
);

create table refeicao_alimento_assoc(
	id_alimento int not null,
    id_refeicao int not null,
    quantidade double not null,
    primary key(id_alimento, id_refeicao),
    foreign key(id_alimento) references alimento(id),
    foreign key(id_refeicao) references refeicao(id)
);