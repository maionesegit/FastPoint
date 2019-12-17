create database FastPoint;
use FastPoint;

create table empresa (
	/* mudar pra escola */
	codEtec	smallint primary key	auto_increment				not null,
	nome	varchar(80)											not null,
	senha	varchar(50)											not null
);

create table cliente (
	rm		smallint	primary key auto_increment				not null,
	nome	varchar(80)											not null,
	email	varchar(60)											not null,
	senha	varchar(20)											not null,
	cred	decimal(10,2)										default 0.00,
	codEtec	smallint											default null,
		constraint fk_cliente_empresa foreign key (codEtec) references empresa(codEtec)
);

create table pedido (
	id		integer primary key	auto_increment					not null,
	obs		varchar(255)												,
	rmCli	smallint											not null,
		constraint	fk_pedido_cliente foreign key (rmCli)	references cliente(rm),
	entrega	char(1)											 default 'N'
);

create table produto (
	id		integer primary key	auto_increment					not null,
	descr	varchar(255)										not null,
	tipo	varchar(50)											not null,
	estoque	integer												default 0,
	codEtec	smallint											not null,
		constraint	fk_produto_empresa	foreign key	(codEtec)	references	empresa(codEtec),
	prVen	decimal(9,2)												,
	dtaInativo	timestamp										null
);

create table itemPed (
	id		integer primary key	auto_increment					not null,
	idPed	integer												not null,
		constraint	fk_itemPed_ped foreign key (idPed)	references pedido(id),
	idProd	integer												not null,
		constraint	fk_itemPed_produto foreign key (idProd)	references produto(id),
	qtdProd	integer												not null
);

insert into empresa
	values(94, 'Pedro Badran', '123');
	
insert into cliente
	values(1, 'Leo', 'leo@gmail.com', 123, 10.00, 94);
	values(2, 'Pedro', 'pedro@gmail.com', 123, 0.00, 94);
	values(3, 'Matheus', 'matheus@gmail.com', 123, 8.75, 94);
	
insert into produto
	values(null, 'Coxinha', 'salgado', null, 94, 1.80, null),
		  (null, 'Quibe', 'salgado', null, 94, 2.0, null),
		  (null, 'Coca-cola', 'bebida', null, 94, 3.50, null),
		  (null, 'Fanta uva', 'bebida', null, 94, 2.00, null),
		  (null, 'Salgadinho', 'outros', null, 94, 1.00, null);
		  (null, 'Bolo', 'outros', null, 94, 1.00, null);

insert into pedido
	values(null, null, 1, 0),
		  (null, null, 2, 0),
		  (null, null, 3, 0);
		  
insert into itemped
	values(null, 1, 1, 2),
		  (null, 1, 3, 1)
		  (null, 2, 1, 1),
		  (null, 2, 2, 1),
		  (null, 2, 4, 1),
		  (null, 2, 6, 1),
		  (null, 3, 5, 3),
		  (null, 3, 3, 1);
		  