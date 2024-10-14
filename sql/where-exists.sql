-- Select 'anything' for each employee that belongs to a department
SELECT 1
FROM employees, department
WHERE employees.department_id = department.id;

-- Select names of all departments that have employees
SELECT name FROM department
WHERE EXISTS (SELECT 1 FROM employees WHERE department_id = department.id);

-- Select employee name and department_id of those who do not have any assigned projects
SELECT e.name, e.department_id
FROM employees e
WHERE NOT EXISTS (SELECT 1 FROM projects p WHERE p.manager_id = e.id);

