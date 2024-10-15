ALTER TABLE employees
ADD COLUMN manager_id INT NULL;

-- Find employees and their managers from the same table
SELECT e.name AS Employee, m.name AS Manager
FROM employees e
LEFT JOIN employees m ON e.manager_id = m.id;

-- Identify employees who earn more than their managers
-- Show employee name and salary, manager name and salary
SELECT e.name AS Employee, e.salary AS Employee_Salary, m.name AS Manager, m.salary AS Manager_Salary
FROM employees e
LEFT JOIN employees m ON e.manager_id = m.id
WHERE e.salary > m.salary;


