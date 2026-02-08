

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 2</title>
</head>
<body>
    <form method="post" action="">
        <label>Attendees:</label>
        <input type="text" name="attendees">

        <label>Cost Per Person:</label>
        <input type="text" name="costPerPerson">

        <label>Venue Capacity:</label>
        <input type="text" name="capacity">

        <input type="submit" value="Submit">
    </form>

    <?php

    function calculateBudget($noOfAttendees, $costPerPerson, $maxVenueCapacity){
        
        $venueNeeded = ceil($noOfAttendees/$maxVenueCapacity);
        $emptySeats = ($maxVenueCapacity*$venueNeeded) - $noOfAttendees;
        $wastedMoney = $emptySeats * $costPerPerson;

        echo"Total Venues: $venueNeeded <br>";
        echo"Empty Seats: $emptySeats <br>";
        echo"Wasted Money (BDT): $wastedMoney <br>";
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $att = $_POST['attendees'];
        $cpp = $_POST['costPerPerson'];
        $cap = $_POST['capacity'];

        calculateBudget($att, $cpp, $cap);
    }
?>
</body>
</html>

