CREATE TABLE employee_final(
    EmployeeID INT PRIMARY KEY,
    EmployeeName VARCHAR(60),
    DepartmentID INT,
    DepartmentName VARCHAR(60),
    Salary INT,
    PerformanceRating VARCHAR(1)
);

INSERT INTO employee_final VALUES
(1, 'Arif Rahman', 201, 'Software Dev', 45000, 'B'),
(2, 'Marium Khan', 201, 'Software Dev', 52000, 'A'),
(3, 'Sabbir Hossain', 202, 'QA', 38000, 'C'),
(4, 'Samira Begum', 203, 'UI/UX', 42000, 'B');

