CREATE TABLE contact_details (
    employee_id INT PRIMARY KEY,
    phone_number VARCHAR(15),
    email_address VARCHAR(100),
    home_address VARCHAR(255),
    emergency_contact_name VARCHAR(100),
    emergency_contact_phone VARCHAR(15),
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);
-- Retrieve the employee name and phone number for all
-- employees on project number 4
SELECT e.name AS Employee_Name, cd.phone_number AS Phone_Number
FROM employees e
JOIN project_assignments pa ON e.id = pa.employee_id
JOIN contact_details cd ON e.id = cd.employee_id
WHERE pa.project_id = 4;

