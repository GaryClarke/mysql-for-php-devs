-- Start a transaction, perform operations, and commit the transaction
START TRANSACTION;

INSERT INTO accounts (account_id, amount) VALUES (101, 200);

UPDATE accounts SET amount = amount + 100 WHERE account_id = 101;

UPDATE accounts SET amount = amount - 100 WHERE account_id = 201;

COMMIT;

-- Start a transaction with error handling
START TRANSACTION;

INSERT INTO orders (order_id, order_date, customer_id) VALUES (5001, NOW(), 1);

UPDATE inventory SET quantity = quantity - 1 WHERE product_id = 400;
-- Assume a condition checks for negative inventory
IF (SELECT quantity FROM inventory WHERE product_id = 400) < 0 THEN
    ROLLBACK;
ELSE
    COMMIT;
END IF;

-- Start the transaction
START TRANSACTION;

-- Start the transaction
START TRANSACTION;

-- Determine the number of employees managed by manager 18 and store in a variable @manager_count
SELECT COUNT(*) INTO @manager_count FROM employees WHERE manager_id = 18;

-- Update the employee (15) manager only if the new manager is currently managing 3 or fewer employees
UPDATE employees
SET manager_id = 18
WHERE id = 15
  AND @manager_count <= 3;

-- Update the @manager_count variable to reflect this change
SELECT COUNT(*) INTO @manager_count FROM employees WHERE manager_id = 18;

-- Increase manager salary by 10% if managing more than 3 employees
UPDATE employees
SET salary = salary * 1.1
WHERE id = 18
  AND @manager_count > 3;

-- Commit the changes
COMMIT;


