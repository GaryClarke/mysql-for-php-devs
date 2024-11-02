-- Start the transaction
START TRANSACTION;

-- Determine the number of employees managed by manager 18 and store in a variable @manager_count
SELECT COUNT(*) INTO @manager_count FROM employees WHERE manager_id = 18;

-- Update the employee (15) manager only if the new manager is currently managing 3 or fewer employees
UPDATE employees
SET manager_id = 18
WHERE id = 15
	AND @manager_count <= 3;

-- Update the @manager_count variable to reflect this change
SELECT COUNT(*) INTO @manager_count FROM employees WHERE manager_id = 18;

-- Increase manager salary by 10% if managing more than 3 employees
UPDATE employees
SET salary = salary * 1.1
WHERE id = 18
AND @manager_count > 3;

-- Commit the changes
COMMIT;