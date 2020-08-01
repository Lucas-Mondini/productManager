CREATE DATABASE desafio_softexpert;


CREATE TABLE products (
  id SERIAL PRIMARY KEY,
  name varchar(255) NOT NULL,
  type varchar(255) NOT NULL,
  price float NOT NULL,
  amount int NOT NULL,
  tax float NOT NULL
);