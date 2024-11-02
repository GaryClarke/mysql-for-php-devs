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




