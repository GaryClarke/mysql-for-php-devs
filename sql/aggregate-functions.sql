/*
Definition: Aggregate functions perform a calculation on a set of values and return a single value.
They are used extensively in data analysis to summarize complex data into meaningful statistics.
*/

-- COUNT and SUM

-- Count the total number of employees
SELECT COUNT(id) AS total_employees FROM employees;

-- Sum the total salaries paid to employees
SELECT SUM(salary) FROM employees;

-- AVG, MIN, MAX
-- Calculate the average salary of employees
SELECT AVG(salary) FROM employees;

-- Challenge: Find the minimum and maximum age of employees
SELECT MIN(age) AS Youngest, MAX(age) AS Oldest FROM employees;
