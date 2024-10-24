ALTER TABLE products
ADD COLUMN manufacturer_id INT NULL;

INSERT INTO products (name, price, manufacture_date, manufacturer_id) VALUES
    ('Product 1', 100, '2022-01-01', 1),
    ('Product 2', 150, '2022-01-02', 2),
    ('Product 3', 200, '2022-01-03', 3),
    ('Product 4', 250, '2022-01-04', 1),
    ('Product 5', 300, '2022-01-05', 2),
    ('Product 6', 350, '2022-01-06', 3),
    ('Product 7', 400, '2022-01-07', 1),
    ('Product 8', 450, '2022-01-08', 2),
    ('Product 9', 500, '2022-01-09', 3),
    ('Product 10', 550, '2022-01-10', 1),
    ('Product 11', 600, '2022-01-11', 2),
    ('Product 12', 650, '2022-01-12', 3),
    ('Product 13', 700, '2022-01-13', 1),
    ('Product 14', 750, '2022-01-14', 2),
    ('Product 15', 800, '2022-01-15', 3),
    ('Product 16', 850, '2022-01-16', 1),
    ('Product 17', 900, '2022-01-17', 2),
    ('Product 18', 950, '2022-01-18', 3),
    ('Product 19', 1000, '2022-01-19', 1),
    ('Product 20', 1050, '2022-01-20', 2);

CREATE INDEX idx_manufacturer_id ON products(manufacturer_id);
