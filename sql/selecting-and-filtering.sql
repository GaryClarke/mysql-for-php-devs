-- Insert dummy data into the employees table
INSERT INTO employees (name, age, department, salary) VALUES
    ('John Doe', 28, 'Sales', 50000),
    ('Jane Smith', 34, 'HR', 65000),
    ('Alice Johnson', 29, 'Marketing', 48000),
    ('Chris Lee', 36, 'IT', 75000),
    ('Debra Scott', 24, 'Sales', 54000),
    ('Tom Hanks', 41, 'Marketing', 67000),
    ('Emma Watson', 30, 'HR', 62000),
    ('Robert Brown', 27, 'IT', 50000),
    ('Lucy Adams', 31, 'IT', 58000),
    ('Oscar Wilde', 39, 'Sales', 49000);

-- Select all data from the employees table
SELECT * FROM employees;

-- Select only the name and department columns from the employees table
SELECT name, department FROM employees;

-- Select employees who are in the IT department
SELECT * FROM employees WHERE department = 'IT';

-- Select employees who are either in the Sales department or older than 30
SELECT * FROM employees WHERE department = 'Sales' OR age > 30;

-- Select employees who are not in the HR department and make more than 50,000
SELECT * FROM employees WHERE department != 'HR' AND salary > 50000;

-- Find employees whose name starts with 'A'
SELECT * FROM employees WHERE name LIKE 'A%';

-- Select employees whose age is between 25 and 35
SELECT * FROM employees WHERE age BETWEEN 25 AND 35;
