<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uiutech_final";
    $port = 3306;

    $conn = new mysqli($server, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    echo "<style>
    table { border-collapse: collapse; width: 50%; }
    table, td, th { border: 1px solid black; padding: 8px; text-align: center; }
</style>";

    // Task 3a
    $sql1 = "
                SELECT PerformanceRating, COUNT(EmployeeID) as emp_count
                FROM employee_final
                GROUP BY PerformanceRating;
                ";


    $res = $conn->query($sql1);

    echo ("<p>3a. The total number of employees who received each performance rating (A, B, C, D) across all department:</p>");
    echo ("<table>");
    echo ("<tr>");
    echo ("<th>PerformanceRating</th>");
    echo ("<th>Employee Count</th>");
    echo ("</tr>");
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            echo ("<tr>");
            echo ("<td>$row[PerformanceRating]</td>");
            echo ("<td>$row[emp_count]</td>");
            echo ("</tr>");
        }
    }
    echo ("</table>");

    
    // Task 3b
    $sql2 = "UPDATE employee_final
            SET PerformanceRating = 'C'
            WHERE Salary<40000 && PerformanceRating != 'D';";

    $conn->query($sql2);
    echo ("<p>3b. Success </p>");

    // Task 3c
    $sql3 = "UPDATE employee_final
            SET Salary = Salary + 5000
            WHERE Salary>50000 && Salary+5000 <= 60000;";

    $conn->query($sql3);
    echo ("<p>3c. Success </p>");

    // Task 3d
    $sql4 = "SELECT DepartmentName, COUNT(EmployeeID) as emp_count
            FROM employee_final
            GROUP BY DepartmentName
            ORDER BY emp_count DESC;";

    $res2 = $conn->query($sql4);

    echo ("<p>3d. Display of the department names and the number of employees working
in that department, sorted by the number of employees:</p>");
    echo"
    <table>
        <tr>
            <th>Dept Name</th>
            <th>Employee Count</th>
        </tr>
    ";

    if($res2){
        while($row = $res2->fetch_assoc()){
            echo"
                <tr>
                    <td>$row[DepartmentName]</td>
                    <td>$row[emp_count]</td>
                </tr>
            ";
        }
    }

    echo"</table>";

?>