drop table if exists _33_reservations_log;
drop table if exists _33_orders;
drop table if exists _33_shop_car;
drop table if exists _33_reservations;
drop table if exists _33_book;
drop table if exists _33_location;
drop table if exists _33_partners;


create table if not exists _33_location(
    location_id int auto_increment primary key not null,
    module varchar(20) not null,
    _position varchar(20),
    shelf varchar(20)
);


create table if not exists _33_book (
    book_id int auto_increment primary key not null,
    isbn varchar(20)  not null,
    title varchar(50) not null,
    author varchar(50)not null,
    editorial varchar(50)not null,
    location_id int not null,
    publication_date date,
    inserted_on datetime,
    book_status int(1),
    imageName varchar(200),
    precio int not null
);



create table if not exists _33_partners(
    user_id  int primary key auto_increment not null,
    dni varchar(9) ,
    first_name varchar(30) not null,
    surname varchar(30)not null,
    addres varchar(30),
    email varchar(50) not null,
    passwd varchar(30) not null,
    birthdate date,
    member_type varchar(10),
    phone_number varchar(9),
    joined_on datetime,
    partners_status int(1) not null,
    picture varchar(200)
);

create table if not exists _33_reservations(
    reservation_id int auto_increment primary key not NULL,
    partner_id int not null,
    book_id int not null,
    inital_date date not null,
    return_date date not null,
    real_return_date DATE,
    reserved_on datetime
);


create table if not exists _33_reservations_log(
    reservation_log_id  int primary key auto_increment not null,
    book_id int not null,
    customer_id int,
    initial_date date,
    with_pentalty int
);

create table if not exists _33_orders(
    order_id int primary key,
    user_id int,
    total int
);

create table if not exists _33_shop_car(
    book_id int,
    user_id int,
    member_type varchar(10),
    cantidad int
);

/*FOREIGN KEYS */

/*alter table _33_shop_car add Constraint fk_shopCar_Book foreign key(book_id) references _33_book(book_id)
on update cascade on delete cascade;*/

alter table _33_reservations_log add 
Constraint fk_reservationLog_books Foreign key(book_id) references _33_book(book_id)
on update cascade on delete cascade;

alter table _33_reservations_log add
Constraint fk_reservationLog_partners Foreign key(customer_id) references _33_partners(user_id)
on update cascade on delete cascade;


Alter table _33_reservations add Constraint fk_reservation_books Foreign key(book_id) references _33_book(book_id)
on update cascade on delete cascade;
Alter table _33_reservations add Constraint fk_reservation_partners Foreign key(partner_id) references _33_partners(user_id)
on update cascade on delete cascade;


Alter table _33_book add Constraint fk_books_location Foreign key(location_id) references _33_location(location_id)
on update cascade on delete cascade;

/*Insert location*/
insert into _33_location(module,_position,shelf)VALUES(1,'vertical','3');

/*books*/
insert into _33_book(isbn,title,author,editorial,location_id,inserted_on,book_status,imageName,precio) VALUES
('8401022878','Las Tinieblas y el Alba','Ken Follet','Plaza & Janes',1,now(),1,'',10),
('B01MRXGBQK','El dia se perdio La cordura','Javier Castillo','SUMA',1,now(),1,'',10),
('8408223550','La ciudad Blanca vol1','Eva Gracia Saenz de Urturi','Planeta',1,now(),1,'',10),
('8408223551','La ciudad Blanca vol2','Eva Gracia Saenz de Urturi','Planeta',1,now(),1,'',10),
('8408223552','La ciudad Blanca vol3','Eva Gracia Saenz de Urturi','Planeta',1,now(),1,'',10),
('B087QS9GXJ','El enigma de la habitacion 622','Joel Dicker','ALFAGUARA ',1,now(),1,'',10),
('8491293817','Redencion (Tinta Negra)','Fernando Gamboa','SUMA ',1,now(),1,'',10),
('8491293817','Redencion (Tinta Negra)','Fernando Gamboa','SUMA ',1,now(),1,'',10);

INSERT INTO `_33_book` (`book_id`, `isbn`, `title`, `author`, `editorial`, `location_id`, `publication_date`, `inserted_on`, `book_status`, `imageName`,`precio`) VALUES
(9, '9788420455778', 'Linea de Fuego', 'Aurtor Pérez-Reverte', 'ALFAGUARA', 1, '2020-10-06', '2020-11-06 11:11:45', 1, '','10'),
(10, '978-84-01-02287-6', 'Las tinieblas y el alba(La precuela de Los pilares', 'Follett, Ken', 'Plaza & Janez', 1, '2020-09-15', '2020-11-06 11:31:47', 1, '','10'),
(11, '978-84-204-3965-5', 'La vida contada por un sapiens a un neandertal', 'Millás Juan Jos / Arsuaga, Juan Luis', 'ALFAGUARA', 1, '2020-09-23', '2020-11-06 11:39:07', 1, '','10'),
(12, '978-84-670-6029-4', 'Emocionarte. La doble vida de los cuadros ', 'Amor Carlos del', 'Espasa', 1, '2020-10-20', '2020-11-06 11:47:18', 1, '','10'),
(13, '978-84-17752-92-7', 'Dime qué comes y te diré qué bacterias tienes El i', 'García-Orea Haro, Blanca', 'GRIJALBO ILUSTRADOS', 1, '2020-10-08', '2020-11-06 12:08:23', 1, '','10'),
(14, '978-84-08-23335-0', '¿A qué estás esperando?', 'Maxwell,Megan', 'Esencia', 1, '2020-10-29', '2020-11-06 12:11:19', 1, '','10'),
(15, '978-84-204-3945-7', 'La buena suerte', 'Montero,Rosa', 'ALFAGUARA', 1, '2020-08-27', '2020-11-06 12:16:45', 1, '','10'),
(16, '978-84-270-4785', 'Lucha por lo justo', 'Spiriman Yeah!(Jesús Candel)', 'Martinez Roca', 1, '2020-10-27', '2020-11-06 12:21:14', 1, '','10'),
(17, '978-84-253-5825-8', 'Si nos enseñaran a perder, ganaríamos siempre', 'Espinosa,Albert', 'Grijalbo', 1, '2020-10-08', '2020-11-06 12:23:35', 1, '','10'),
(18, '978-84-17860-79-0', 'El infinito en un junco La invención de los libros', 'Vallejo Irene', 'Siruela', 1, '2020-11-04', '2020-11-06 12:27:13', 1, '','10'),
(19, '978-84-9066-861', 'Como polvo en el viento', 'Padura Leonardo', 'Tusquets Editores', 1, '2020-08-25', '2020-11-06 12:29:00', 1, '','10'),
(20, '978-84-7953-903-0', 'El libro tibetano de la vida y de la muerte', 'Rinpche, sogyal', 'Urano', 1, '2015-01-19', '2020-11-06 12:30:27', 1, '','10'),
(21, '978-84-9895-405-0', 'Adiós al frío', 'Sastre Elvira', 'Visor Libros', 1, '2020-08-01', '2020-11-06 12:31:42', 1, '','10'),
(22, '978-84-696-2967-3', 'El Menhir de Oro', 'Goscinny Rene', 'Editorial Bruño', 1, '2020-10-22', '2020-11-06 12:34:49', 1, '','10'),
(23, '978-84-272-2123-9', 'Diario de Greg 15. Tocado y hundido', 'Kinney Jeff', 'RBA Molino', 1, '2020-10-28', '2020-11-06 12:36:25', 1, '','10'),
(24, '978-84-344-3309-0', 'El dominio mental La geopolítica de la mente', 'Baños Bajo, Pedro', 'Editorial Ariel', 1, '2020-10-29', '2020-11-06 12:38:02', 1, '','10'),
(25, '978-84-306-2339-6', 'Los europeos Tres vidas y el nacimiento de la cult', 'Figes Orlando', 'TAURUS', 1, '2020-06-04', '2020-11-06 12:40:42', 1, '','10'),
(26, '978-84-253-5962-0', 'Optimismo y salud Lo que la ciencia sabe de los be', 'Rojas Marcos, Luis', 'GRIJALBO', 1, '2020-10-22', '2020-11-06 12:41:58', 1, '','10'),
(27, '978-84-9066-731-6', 'Patria', 'Arumburu, Fernando', 'Maxi-Tusquests', 1, '2019-08-27', '2020-11-06 12:43:55', 1, '','10'),
(28, '978-84-270-4749', 'Los Compas y la maldición de Mikecrack', 'Mikecrack, El Trollino y Timba Vk', 'Ediciones Martinez Roca', 1, '2020-10-29', '2020-11-06 12:44:52', 1, '','10');


/*users*/
insert into _33_partners(dni,first_name,surname,addres,email,passwd,birthdate,member_type,phone_number,joined_on,partners_status)VALUES
('41639237Z','Carlos Eduardo','Grageda Flores','Santa Victoria','cgragedaflores@gmail.com','root','1996-06-03','admin','622778479',NOW(),1),
('41639238Z','Daniel Guiri','Guiri','Santa Anita','guiri@gmail.com','root','2000-03-03','partner','622778480',NOW(),0),
('41639239Z','Pablo ','Martinez Jimenez','Villa Carlos','pmartinez@gmail.com','root','1998-05-30','partner','622778979',NOW(),0),
('41639237Z','Enrique ','Martinez Jimenez','Villa Carlos','enrique@gmail.com','enrique','1998-05-30','admin','622778979',NOW(),1);

/*reservations*/

insert into _33_reservations() VALUES
('0','1','9',now(),now(),now(),now()),
('0','1','10',now(),now(),now(),now()),
('0','2','11',now(),now(),now(),now()),
('0','2','15',now(),now(),now(),now()),
('0','3','19',now(),now(),now(),now());
