
    <?php
        session_start();
        
            if(!isset($_SESSION['value'])){
                $_SESSION['value'] = rand(500,5000);
            }
    

       
            if(!isset($_SESSION['gg'])){
                $_SESSION['gg'] = 0;
            }

            $_SESSION['hehe'] = '';
            

            echo"Correct value: $_SESSION[value]<br>";
            echo"Count: $_SESSION[gg]<br>";
            // echo" $_SESSION[hehe]";
        

        function matchGuess($x){
            if($x < $_SESSION['value']){
                $_SESSION['hehe'] = 'low';
            }
            else if($x > $_SESSION['value']){
                $_SESSION['hehe'] = 'high';
            } else{
                $_SESSION['hehe'] = 'correct';
                $_SESSION['gg'] = -1;
                $_SESSION['value'] = rand(500,5000);
            }
            $_SESSION['gg']++;
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $x = $_POST['guess'];

            matchGuess($x);
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
        <input type="text" name="guess">
        <input type="submit" value="Guess">

    <?php
        if($_SESSION['hehe'] == 'low'){
            echo"Too low";
        }
        else if($_SESSION['hehe'] == 'high'){
            echo"too high";
        } else if ($_SESSION['hehe'] == 'correct'){
            echo"correct";
            $_SESSION['hehe'] = '';
        }

        if($_SESSION['gg']+1>5){
             echo "<br><p>Out of guesses!</p><br>";
             $_SESSION['gg'] = 0;
        }

        echo"</form>";
    ?>
</body>
</html>