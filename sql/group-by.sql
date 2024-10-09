SELECT column_name, AGGREGATE_FUNCTION(column_name)
FROM table_name
GROUP BY column_name;

-- Count the number of employees in each department
SELECT department_id, COUNT(*) AS Num_Employees
FROM employees
GROUP BY department_id;

-- Calculate the average salary by department
SELECT department_id, AVG(salary) AS Average_Salary
FROM employees
GROUP BY department_id;

-- Challenge: Find average salary for each department, display department name also
SELECT department.name AS Department_Name, AVG(employees.salary) AS Average_Salary
FROM employees
JOIN department ON employees.department_id = department.id
GROUP BY department.name;

-- Challenge: Find the department with the highest average age of employees
SELECT department.name AS Department_Name, AVG(employees.age) AS Average_Age
FROM employees
JOIN department ON employees.department_id = department.id
GROUP BY department.name
ORDER BY Average_Age DESC
LIMIT 1;


