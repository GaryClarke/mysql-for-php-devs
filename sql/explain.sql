-- Write a comprehensive query that lists all departments, their employees,
-- and any projects they manage
EXPLAIN
SELECT department.name AS department, employees.name AS employee, projects.project_name
FROM department
LEFT JOIN employees ON department.id = employees.department_id
LEFT JOIN projects ON employees.id = projects.manager_id;