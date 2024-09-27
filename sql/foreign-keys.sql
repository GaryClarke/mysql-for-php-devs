-- create a department table
CREATE TABLE department (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL
);

-- Remove the department column from the employees table
ALTER TABLE employees
DROP COLUMN department;

-- Add department_id column and foreign key constraint
ALTER TABLE employees
ADD COLUMN department_id INT,
ADD CONSTRAINT fk_department FOREIGN KEY (department_id) REFERENCES department(id);

-- Drop the existing foreign key constraint
ALTER TABLE employees
DROP FOREIGN KEY fk_department;

-- Modify the foreign key to prevent orphan records by using ON DELETE RESTRICT
/**ON DELETE RESTRICT: Prevents deletion of a department if there are employees linked to it. This ensures that no "orphaned" employee records exist without a valid department.
ON UPDATE CASCADE: Ensures that if the department's id changes, all related employees will be updated accordingly.
 **/
ALTER TABLE employees
    ADD CONSTRAINT fk_department FOREIGN KEY (department_id) REFERENCES department(id)
    ON DELETE RESTRICT ON UPDATE CASCADE;


-- Create a projects table and reference it from the employees table
-- fields are ...
-- id INT AUTO_INCREMENT PRIMARY KEY,
-- project_name VARCHAR(255)
-- start_date DATE,
-- end_date DATE,
-- manager_id INT,
CREATE TABLE projects (
    project_id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255),
    start_date DATE,
    end_date DATE,
    manager_id INT,
    CONSTRAINT fk_manager FOREIGN KEY (manager_id) REFERENCES employees(id)
);
