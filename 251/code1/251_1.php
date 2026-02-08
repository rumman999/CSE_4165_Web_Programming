<?php
    function checkStrength($pass){
        $points = 0;
        $length = strlen($pass);

        if($length+1>=6){
            $points += floor($length+1-6/2) * 10;
        }

        $upper = false;
        $lower = false;
        $numbers = false;
        $special = false;

        for($i=0; $i<$length;$i++){
            if($pass[$i]>='a' && $pass[$i]<='z'){
                $lower = true;
        
            }
            else if($pass[$i]>='A' && $pass[$i]<='Z'){
                $upper = true;
            }
            else if($pass[$i]>='0' && $pass[$i]<='9'){
                $numbers = true;
            }
            else if($pass[$i]=='!' ||
                    $pass[$i]=='@' ||
                    $pass[$i]=='#' ||
                    $pass[$i]=='$' ||
                    $pass[$i]=='%' ||
                    $pass[$i]=='^' ||
                    $pass[$i]=='&' ||
                    $pass[$i]=='*'
                    ){
                        $special = true;
            }
        }

        if($upper){
            $points += 15;
        }

        if($lower){
            $points += 15;
        }

        if($numbers){
            $points += 20;
        }

        if($special){
            $points += 25;
        }


        if($points <= 30){
            echo "Very Weak";
        }
        else if($points<=50){
            echo"Weak";
        }
        else if($points<=70){
            echo"Medium";
        }
        else if($points<=90){
            echo"Strong";
        }
        else if($points<=100){
            echo"Strong";
           
        }
        else{
            echo"Very Strong";
           
        }

        if($count>8){
            echo"<br> Need Practice!";
        }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 1</title>
</head>
<body>
    <form method="post" action="">
        <label>Password:</label>
        <input type="text" name="pass">
        <input type="submit" value="Check Strength">
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $pass = $_POST['pass'];

            checkStrength($pass);
        }
    ?>
</body>
</html>