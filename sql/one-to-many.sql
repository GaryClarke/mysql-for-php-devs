-- This SQL statement retrieves the name of each employee along with their department's name,
-- illustrating the one-to-many relationship.

-- MANY TO ONE
SELECT department.name AS department, employees.name AS employee
FROM department
JOIN employees ON department.id = employees.department_id;

-- MEANS THE SAME THING
-- AS MANY TO MANY
SELECT employees.name AS employee, department.name AS department
FROM employees
JOIN department ON employees.department_id = department.id;
