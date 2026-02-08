<?php 
    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "sundarban";
    $port = 3306;

    echo"<style>
            table{border-collapse: collapse; width: 50%;}
            table, th, td{ border: 1px solid black};
        </style>";

    $conn = new mysqli($server, $username, $pass, $db, $port);

    $sql1 = "SELECT CatagoryName, AVG(Revenue) as avg
            FROM sales_data
            GROUP BY CatagoryName;";

    $result1 = $conn->query($sql1);

    $arr = [];

    while($row = $result1->fetch_assoc()){
        $arr[$row['CatagoryName']] = $row['avg'] ;
    }

    

    $sql2 = "SELECT ProductName, CatagoryName, Revenue
            FROM sales_data;";

    $result2 = $conn->query($sql2);

    echo"<table>";
    echo"<tr><th>ProductName</th><th>Category</th><th>Label</th></tr>";

    while($row2 = $result2->fetch_assoc()){
        $cat = $row2['CatagoryName'];

        echo"<tr>
                <td>$row2[ProductName]</td>
                <td>$cat</td>
        ";
       
        if($row2['Revenue'] > $arr[$cat]){
            echo"<td>Top Seller</td>";
        } else{
            echo"<td>Regular Seller</td>";
        }

        echo"</tr>";
    }

    echo"</table>"
    
?>