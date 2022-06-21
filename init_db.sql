create table customer(id int(11) primary key auto_increment, fname varchar(30) not null, mname varchar(30) not null, lname varchar(30) not null, phone varchar(10) not null, email varchar(30) not null, city varchar(30) not null, pincode varchar(10) not null);
create table product(id int(11) primary key auto_increment, barcode varchar(100) not null, price double not null, name varchar(100) not null);
create table purchase(id varchar(200) primary key, 
                      purchase_date timestamp default CURRENT_TIMESTAMP,
                      customer_id int(11) not null,
                      foreign key(customer_id) references customer(id) on delete cascade);
                      
create table purchase_product(id varchar(200) primary key, 
                             product_id int(11) not null,
                             purchase_id varchar(200) not null,
                             foreign key(product_id) references product(id) on delete cascade,
                             foreign key(purchar_id) references purchase(id) on delete cascade);
