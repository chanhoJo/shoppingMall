create table buyList (
  buy_no int primary key auto_increment,
  buy_product_name varchar(100) not null,
  buy_price int not null,
  buy_amount int not null,
  buy_size varchar(10) not null,
  buy_date datetime,
  buyer_address varchar(50) not null,
  buyer_phone varchar(20) not null,
  buyer varchar(10) not null,
  memo varchar(100),
  buy_product_img varchar(100) not null
);