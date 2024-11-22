DELIMITER //

CREATE PROCEDURE GetEmployeeProjects(
    IN empID INT
)
BEGIN
SELECT p.name AS project_name
FROM projects p
         JOIN project_assignments pa ON p.id = pa.project_id
WHERE pa.employee_id = empID;
END //

DELIMITER ;