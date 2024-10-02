-- Sort employees by name in ascending order and salary in descending order
SELECT name, department, salary FROM employees ORDER BY name ASC, salary DESC;

-- Sort employees by age in descending order
SELECT name, age FROM employees ORDER BY age DESC;

-- Get the top 5 highest earning employees
SELECT name, salary FROM employees ORDER BY salary DESC LIMIT 5;

-- Get the next 5 employees after skipping the first 10
SELECT name, salary FROM employees ORDER BY salary DESC LIMIT 5 OFFSET 10;
