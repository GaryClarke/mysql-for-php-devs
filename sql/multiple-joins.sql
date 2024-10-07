-- Retrieve names of all employees who are assigned to a department,
-- their department names, and any projects (name) managed by them
SELECT employees.name AS employee, department.name AS department, projects.project_name
FROM employees
INNER JOIN department ON employees.department_id = department.id
LEFT JOIN projects ON employees.id = projects.manager_id;

-- Write a comprehensive query that lists all departments, their employees,
-- and any projects they manage
SELECT department.name AS department, employees.name AS employee, projects.project_name
FROM department
LEFT JOIN employees ON department.id = employees.department_id
LEFT JOIN projects ON employees.id = projects.manager_id;