DROP TABLE products;

/**
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP:
Automatically records when the product was added to the database, useful for tracking.

updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP:
Automatically updates the timestamp whenever the record is modified. This is especially handy for auditing changes or syncing with external systems.
*/
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    manufacture_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert a record into products
INSERT INTO products (name, price, manufacture_date)
VALUES ('Laptop', 1000, '2024-09-30');

-- Update a record in the products table
-- Update Laptop to 1100
UPDATE products
SET price = 1100
WHERE name = 'Laptop';

