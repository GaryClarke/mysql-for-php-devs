SELECT employees.name AS employee, department.name AS department
FROM employees
INNER JOIN department ON employees.department_id = department.id;

-- Retrieve all employees and their department names, including those without a department.
SELECT employees.name AS employee, department.name AS department
FROM employees
LEFT JOIN department ON employees.department_id = department.id;

/*
Can you modify the query to list all employee names, salaries,
and department names...if available
but also order them based on their salary in descending order?
*/
SELECT employees.name AS employee, employees.salary AS salary, department.name AS department
FROM employees
LEFT JOIN department ON employees.department_id = department.id
ORDER BY employees.salary DESC;




