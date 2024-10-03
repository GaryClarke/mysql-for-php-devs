-- Join employees with their respective departments
SELECT employees.name, employees.age, department.name AS department_name
FROM employees
INNER JOIN department ON employees.department_id = department.id;

-- Find employees in a specific department, e.g., 'Sales'
SELECT employees.name, employees.age, department.name
FROM employees
INNER JOIN department ON employees.department_id = department.id
WHERE department.name = 'Sales';

-- Join employees with their respective departments.
-- Select name, salary, department name
-- Only want records where the salary > 50000
SELECT employees.name, employees.salary, department.name AS department_name
FROM employees
INNER JOIN department ON employees.department_id = department.id
WHERE employees.salary > 50000;

