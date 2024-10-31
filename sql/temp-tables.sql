CREATE TEMPORARY TABLE temp_dept_salaries AS
SELECT department_id, AVG(salary) AS avg_salary
FROM employees
GROUP BY department_id;

SELECT department_id FROM temp_dept_salaries WHERE avg_salary > 50000;

UPDATE employees
SET salary = salary * 1.10
WHERE department_id IN (SELECT department_id FROM temp_dept_salaries WHERE avg_salary > 50000);

-- Drop the temporary table
DROP TEMPORARY TABLE IF EXISTS temp_dept_salaries;

