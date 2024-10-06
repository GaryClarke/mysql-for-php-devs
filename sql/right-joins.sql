SELECT department.name AS department, employees.name AS employee, employees.salary
FROM department
RIGHT JOIN employees ON department.id = employees.department_id;

-- Retrieve all departments along with their employees, including departments with no employees.
SELECT department.name AS department, employees.name AS employee, employees.salary
FROM employees
RIGHT JOIN department ON department.id = employees.department_id;

-- Create 4 projects, one without a manager
INSERT INTO projects (project_name, start_date, end_date, manager_id)
VALUES
    ('Website Redesign', '2023-10-01', '2024-01-15', 13),
    ('Product Launch', '2023-11-05', '2024-03-20', 14),
    ('Market Research', '2023-12-01', '2024-05-30', 15),
    ('New Development', '2023-10-15', '2024-04-30', NULL);

-- List all project names and their assigned manager's name,
-- including projects without assigned managers.
SELECT projects.project_name, employees.name AS manager_name
FROM employees
RIGHT JOIN projects ON employees.id = projects.manager_id;