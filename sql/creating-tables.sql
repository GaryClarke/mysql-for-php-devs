DROP TABLE employees;

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    department VARCHAR(100) NOT NULL,
    salary INT
);

-- Create a products table
-- id - auto incrementing integer primary key
-- name varchar 255 chars not null
-- price int not null
-- manufacture_date DATE

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    manufacture_date DATE
);