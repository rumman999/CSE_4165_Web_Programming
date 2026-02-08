<?php
    function order($a, $b, $c){
        $needed = $a * $b;
        $pizza = ceil($needed / $c);

        $leftover = ($pizza*$c) - $needed;

        $slidePrice = 1050/$c;
        $moneyWaste = $slidePrice*$leftover;

        echo"Total Pizzas: $pizza <br>";
        echo"Leftover Slices: $leftover<br>";
        echo"Wasted Money: $moneyWaste<br>";
    }

    echo"Case-1: <br>";
    order(10, 3, 8);    


    echo"<br><br>Case-2: <br>";
    order(7, 2, 6);    

    echo"<br><br>Case-3: <br>";
    order(12, 2, 4);    
?>