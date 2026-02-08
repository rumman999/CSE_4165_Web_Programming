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

    $sql = "SELECT s.ProductName, s.CatagoryName, s.Revenue, (SELECT AVG(Revenue)
                                       	FROM sales_data p
                                      	WHERE p.CatagoryName = S.CatagoryName
                                      	) as avg
            FROM sales_data s;";
    $res = $conn->query($sql);
    echo"<table><tr><td>ProductName</td><td>CategoryName</td><td>Label</td></tr>";
    while($row = $res->fetch_assoc()){
        echo"<tr><td>$row[ProductName]</td>";
        echo"<td>$row[CatagoryName]</td>";

        if($row['Revenue'] < $row['avg']){
            echo"<td>Regular Seller</td>";
        } else{
            echo"<td>Top Seller</td>";
        }

        echo"</tr>";
    }
    echo"</table>";
?>