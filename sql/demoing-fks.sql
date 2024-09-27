-- Insert departments into the department table
INSERT INTO department (name) VALUES
    ('Sales'),
    ('HR'),
    ('IT'),
    ('Marketing');

-- Update employees with their corresponding department IDs
UPDATE employees SET department_id = (SELECT department_id FROM department WHERE name = 'Sales')
    WHERE name = 'John Doe';
UPDATE employees SET department_id = (SELECT department_id FROM department WHERE name = 'HR')
    WHERE name = 'Jane Smith';
UPDATE employees SET department_id = (SELECT department_id FROM department WHERE name = 'Marketing')
    WHERE name = 'Alice Johnson';
UPDATE employees SET department_id = (SELECT department_id FROM department WHERE name = 'IT')
    WHERE name = 'Chris Lee';
UPDATE employees SET department_id = (SELECT department_id FROM department WHERE name = 'Sales')
    WHERE name = 'Debra Scott';

-- Try to delete the 'Sales' department (which has employees assigned)
DELETE FROM department WHERE name = 'Sales';

-- Try to assign an employee to a non-existent department
UPDATE employees SET department_id = 999 WHERE name = 'Tom Hanks';


