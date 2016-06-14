DROP DATABASE IF EXISTS uas;
CREATE DATABASE uas;
USE uas;
CREATE TABLE Admin (
  id TINYINT PRIMARY KEY AUTO_INCREMENT,
  image TEXT,
  username TEXT,
  password TEXT,
  fullname TEXT,
  email TEXT
);

INSERT INTO Admin (image, username, password, fullname, email)
VALUES ('admin.jpg', 'root', 'root', 'John Doe', 'Johndoe@email.com');
CREATE TABLE pesan (
  id TINYINT PRIMARY KEY AUTO_INCREMENT,
  subjek TEXT,
  pesan TEXT
);
