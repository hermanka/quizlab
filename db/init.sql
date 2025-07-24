CREATE DATABASE IF NOT EXISTS quiz;
USE quiz;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('guest', 'guest123');

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT
);

INSERT INTO products (name, description) VALUES
('Roti Melon', 'Roti melon, atau melonpan (メロンパン), adalah roti manis khas Jepang yang dikenal dengan kulit luarnya yang renyah dan menyerupai kulit buah melon. Meskipun namanya mengandung kata "melon", roti ini tidak memiliki rasa buah melon.'),
('Dorayaki', 'Dorayaki (どら焼き) adalah kue tradisional Jepang yang berbentuk bundar dan pipih, terdiri dari dua lembar pancake yang direkatkan dengan isian, biasanya pasta kacang merah (anko)');

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    username VARCHAR(50),
    comment TEXT
);
