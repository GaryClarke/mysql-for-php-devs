-- Delete the employee named 'John Doe'
DELETE FROM employees
WHERE name = 'John Doe';

-- Delete all employees who work in the 'Sales' department
DELETE FROM employees
WHERE department = 'Sales';

-- Delete all employees with a salary less than 50000
DELETE FROM employees
WHERE salary > 50000;
