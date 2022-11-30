create table categories
(
	id int auto_increment NOT NULL,
	name varchar(250) null,
	description text null,
	position int null,
	created_at timestamp null,
	updated_at timestamp null,
	user_id int not null,
	primary key (id)
);

create unique index customers_id_uindex
	on customers (id);

ALTER table categories add status ENUM('0', '1') DEFAULT '1' NOT NULL;

create table products
(
	id int auto_increment NOT NULL,
	name varchar(250) null,
	description text null,
	price int null,
	user_id int not NULL,
	image_1 varchar(250) null,
	image_2 varchar(250) null,
	image_3 varchar(250) null,
	category_id int NOT NULL,
	created_at timestamp null,
	updated_at timestamp null,
	primary key (id)
);

create unique index products_id_uindex
	on products (id);

ALTER table products add status ENUM('0', '1') DEFAULT '1' NOT NULL;
ALTER table products add is_featured ENUM('0', '1') DEFAULT '0' NULL;


ALTER table products add alter_price int null;
ALTER table products add short_description text null;
