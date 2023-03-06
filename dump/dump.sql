CREATE TABLE users
(
    login varchar(255) not null,
    password varchar(255) not null
);
INSERT INTO users (login, password)
VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3');

CREATE TABLE sku_settings
(
    prefix varchar(255) not null,
    sku_index int not null,
    suffix varchar(255)
);
INSERT INTO sku_settings (prefix, sku_index, suffix)
VALUES ('PRO', '1000001', '-D');

CREATE TABLE products
(
    id INT NOT NULL AUTO_INCREMENT,
    name varchar(255) unique NOT NULL,
    sku varchar(255) unique NOT NULL,
    PRIMARY KEY (id)
);
INSERT INTO products (name, sku)
VALUES ('Televizor', 'PRO1000001-D'),
       ('Telefon', 'PRO1000002-D'),
       ('Smart box', 'PRO1000003-D');
