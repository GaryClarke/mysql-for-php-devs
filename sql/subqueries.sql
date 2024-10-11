/*
A subquery is a query nested inside another SQL query.

It can be used to calculate values used in the outer query,
allowing for dynamic data retrieval.

Types of Subqueries:
Scalar Subqueries: Return a single value (one row, one column).
Row Subqueries: Return a single row (multiple columns).
Column Subqueries: Return a single column (multiple rows).
Table Subqueries: Return a table (multiple rows and columns).
*/

-- Find employees who earn more than the average salary
SELECT AVG(salary) FROM employees;

SELECT name, salary
FROM employees
WHERE salary > (SELECT AVG(salary) FROM employees);

-- Find the departments with the highest number of employees
SELECT department_id, COUNT(*) AS Num_Employees
FROM employees
GROUP BY department_id
HAVING Num_Employees = (
SELECT MAX(Count)
FROM (SELECT COUNT(*) AS Count FROM employees GROUP BY department_id) AS MaxCount);
