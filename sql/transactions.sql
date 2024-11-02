-- Start a transaction, perform operations, and commit the transaction
START TRANSACTION;

INSERT INTO accounts (account_id, amount) VALUES (101, 200);

UPDATE accounts SET amount = amount + 100 WHERE account_id = 101;

UPDATE accounts SET amount = amount - 100 WHERE account_id = 201;

COMMIT;





