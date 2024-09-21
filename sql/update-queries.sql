-- Update the salary of 'John Doe' to 55000
UPDATE employees
SET salary = 55000
WHERE name = 'John Doe';

-- Change the department of 'Jane Smith' to 'Sales'
UPDATE employees
SET department = 'Sales'
WHERE name = 'Jane Smith';

-- Update the age of 'Oscar Wilde' to 40
UPDATE employees
SET age = 40
WHERE name = 'Oscar Wilde';

-- Increase the salary of all employees in the 'IT' department by 5000
UPDATE employees
SET salary = salary + 5000
WHERE department = 'IT';
