-- Sort employees by name in ascending order
SELECT name, salary FROM employees ORDER BY salary DESC;

-- Sort employees by salary in ascending order and name in descending order
SELECT name, salary FROM employees ORDER BY salary ASC, name ASC;

-- Sort employees by age in descending order
SELECT name, age FROM employees ORDER BY age DESC;

-- Get the top 5 highest earning employees
SELECT name, salary FROM employees ORDER BY salary DESC LIMIT 5;

-- Retrieve the names and salaries of the 6th to 10th highest earning employees.
SELECT name, salary FROM employees ORDER BY salary DESC LIMIT 5 OFFSET 5;

-- Get the oldest 5 employees
SELECT name, age FROM employees ORDER BY age DESC LIMIT 5;