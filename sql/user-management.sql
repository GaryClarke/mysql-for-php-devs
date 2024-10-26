-- To list all users in a MySQL database, you can query the mysql.user table,
-- which stores user account information.
SELECT user, host FROM mysql.user;

/*
CREATE USER: This is the command used to create a new MySQL user account.
'web': This is the username being created. In this case, the user is called web.

'localhost': This specifies that the user web is allowed to connect only from the localhost, which means the MySQL server running on the same machine (local connections only). The user would not be able to connect from external IP addresses.
*/
CREATE USER 'web'@'localhost';

-- Grant the user all privileges on all databases (*) and all tables (*) within those databases on the MySQL server, but only when connecting from localhost
GRANT ALL PRIVILEGES ON *.* TO 'web'@'localhost';

-- Revoke any global privileges the user may have on all databases
REVOKE ALL PRIVILEGES ON *.* FROM 'web'@'localhost';

-- Grant specific privileges on the course_demo database only
GRANT SELECT, INSERT, UPDATE, DELETE ON course_demo.* TO 'web'@'localhost';

-- Apply the changes
FLUSH PRIVILEGES;

-- give user a password
ALTER USER 'web'@'localhost' IDENTIFIED BY 'password';

