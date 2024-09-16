-- Create the employees table
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    department VARCHAR(100),
    salary INT  -- salary as an integer
);

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

-- Retrieve all employees' names and departments
SELECT name, department FROM employees;

-- Find all employees older than 25
SELECT * FROM employees WHERE age > 25;

-- List all departments without duplicates
SELECT DISTINCT department FROM employees;

-- Get the highest and lowest salary from the employees table
SELECT MAX(salary) AS HighestSalary, MIN(salary) AS LowestSalary FROM employees;

-- Count the number of employees in each department
SELECT department, COUNT(*) AS NumberOfEmployees FROM employees GROUP BY department;

-- List employees and their ages sorted by age in descending order
SELECT name, age FROM employees ORDER BY age DESC;

-- Find employees who work in 'IT' department and earn more than 55,000
SELECT * FROM employees WHERE department = 'IT' AND salary > 55000;

-- Calculate the average salary of all employees
SELECT AVG(salary) AS AverageSalary FROM employees;

-- Find the number of employees younger than 30
SELECT COUNT(*) AS YoungEmployees FROM employees WHERE age < 30;

-- List all employees by department in alphabetical order
SELECT name, department FROM employees ORDER BY department ASC;
