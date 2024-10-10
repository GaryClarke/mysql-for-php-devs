SELECT column_name, AGGREGATE_FUNCTION(column_name)
FROM table_name
GROUP BY column_name
HAVING condition;

-- Find departments with more than 2 employees
SELECT department_id, COUNT(*) AS Num_Employees
FROM employees
GROUP BY department_id
HAVING COUNT(*) > 2;

-- Show department name and average salary where average salary > 50000
SELECT department.name AS DepartmentName, AVG(employees.salary) AS Average_Salary
FROM employees
JOIN department ON employees.department_id = department.id
GROUP BY DepartmentName
HAVING AVG(salary) > 50000;

