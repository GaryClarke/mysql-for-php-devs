-- Select all employees who are in either 'Sales' or 'IT' departments
SELECT name, department FROM employees
WHERE department_id IN (SELECT department_id FROM departments WHERE name IN ('Sales', 'IT'));

-- List all employees (just name) from departments with more than three employees
SELECT name
FROM employees
WHERE department_id IN (
    SELECT department_id
    FROM employees
    GROUP BY department_id
    HAVING COUNT(*) > 3
);
