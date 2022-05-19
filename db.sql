CREATE DATABASE BioHealth DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE BioHealth;

CREATE TABLE users(
  user_id INT AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL,
  email VARCHAR(50) NOT NULL,
  name VARCHAR(50) NOT NULL,
  role enum('Administrator', 'Customer') NOT NULL,
  address VARCHAR(50),
  city VARCHAR(30),
  state VARCHAR(30),
  zip VARCHAR(10),
  phone VARCHAR(30),
  PRIMARY KEY(user_id)
);

CREATE TABLE creditcard (
  id INT AUTO_INCREMENT,
  user_id INT NOT NULL,
  name VARCHAR(100) NOT NULL,
  number VARCHAR(15) NOT NULL,
  exp_month INT NOT NULL,
  exp_year INT NOT NULL,
  cvv INT NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);


CREATE TABLE category (
  id INT AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  PRIMARY KEY(id)
);


CREATE TABLE product (
  id INT AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  price FLOAT NOT NULL,
  stock INT NOT NULL,
  description VARCHAR(250) NOT NULL,
  image VARCHAR(40) NOT NULL,
  category_id INT,
  PRIMARY KEY(id),
  FOREIGN KEY (category_id) REFERENCES category(id)
);

CREATE TABLE cart (
  id INT AUTO_INCREMENT,
  user_id INT NOT NULL,
  creation_date DATE,
  PRIMARY KEY(id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);


CREATE TABLE cartitem (
  id INT AUTO_INCREMENT,
  cart_id INT NOT NULL,
  product_id INT NOT NULL,
  amount INT NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (cart_id) REFERENCES cart(id),
  FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT,
  customer_id INT NOT NULL,
  order_date DATE,
  completed BOOLEAN NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (customer_id) REFERENCES users(user_id)
);

CREATE TABLE orderitem (
  id INT AUTO_INCREMENT,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  amount INT NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE shippingaddress (
  id INT AUTO_INCREMENT,
  order_id INT NOT NULL,
  address VARCHAR(50),
  city VARCHAR(30),
  state VARCHAR(30),
  zip VARCHAR(10),
  PRIMARY KEY(id),
  FOREIGN KEY (order_id) REFERENCES orders(id)
);
