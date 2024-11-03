-- Determine the number of employees managed by manager 21 and store in a variable @manager_count
SELECT COUNT(*) INTO @manager_count FROM employees WHERE manager_id = 21;

SELECT @manager_count;

-- Update the employee's manager only if the new manager is currently managing 3 or fewer employees
UPDATE employees
SET manager_id = 21
WHERE id = 13
  AND @manager_count <= 3;