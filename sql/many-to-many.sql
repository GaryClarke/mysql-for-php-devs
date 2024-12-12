CREATE TABLE project_assignments (
    project_id INT,
    employee_id INT,
    PRIMARY KEY (project_id, employee_id),
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
    FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE CASCADE
);

-- Attach employees to projects
INSERT INTO project_assignments (project_id, employee_id) VALUES
    (1, 13), (1, 14), (1, 15), (1, 16),
    (2, 14), (2, 17), (2, 18), (2, 19),
    (3, 15), (3, 20), (3, 21), (3, 22),
    (4, 16), (4, 21), (4, 22), (4, 13),
    (1, 17), (1, 18), (1, 19),
    (2, 20), (2, 21), (2, 22),
    (3, 13), (3, 14), (3, 16),
    (4, 15), (4, 17), (4, 18);

-- Find all employees working on Project 1
SELECT e.name
FROM employees e
JOIN project_assignments pa ON e.id = pa.employee_id
WHERE pa.project_id = 1;  -- Assuming 123 is the project ID

-- Challenge - Find all projects an employee (e.g. 15) is involved in
SELECT p.name
FROM projects p
JOIN project_assignments pa ON p.id = pa.project_id
WHERE pa.employee_id = 15;  -- Assuming 456 is the employee ID

