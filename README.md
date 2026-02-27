# task_management_system
Codes for task management system
This is a taskmanagement platform , you need to habe xammo, php 
The first step is to create your databse so everything can connect (database name task_management_db;). The front end can connect with the backend
then you will see a first login which means insert into the database 
create a username and password

INSERT INTO users (full_name, username, password, role)
VALUES (
    'Admin User',
    'admin',
    '$2y$10$PUT_Faith23',
    'admin'
);
INSERT INTO users (full_name, username, password, role)
VALUES (
    'Faith User',
    'faith',
    '$2y$10$IE7Jms2C6WzY87i/A.nVJ.1RAvluAjgfBgq3Di5tvdXvo1WFVc6SG',
    'admin'
);