<?php
    require_once '../includes/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Page</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        #submit {
            background-color: lightblue;
            border-radius: 10px;
            display: block;
            margin: 0 auto;
            padding
        }
        
        #school {
        	font-size: 75px;
        	text-align: center;
        }
        
        img {
        	display: block;
        	margin: 0 auto;
        	width: 800px;
        	height: 400px;
        	border: 3px solid black;
        }
        
        h3 {
        	text-align: center;
        	font-weight: lighter;
        	padding: 30px;
        }
        
        h2 {
        	text-align: center;
        }
        
        form {
        	border: 1px black solid;
        	padding: 10px;
        	width: 500px;
        	margin: 0 auto;
        	margin-bottom: 40px;
        }
        
        
    </style>
</head>
<body>
    <h1 id="school">Green Spirits High School</h1>
    <img src="school.jpg" alt="school">
    <h3>Welcome to our Green Spirits High School events page. Here, staff can add events happening in the school year-round! We look forward to <br>communicating about student events and other updates, and we'll be able to update students, parents, and staff through this website!</h3>
    <h2>Add a New School Event</h2> 
    <form action="processAddEvent.php" method="post"> 
        <label>Event Name:</label> 
        <input type="text" name="event_name" required><br><br> 

        <label>Event Description:</label> <br>
        <textarea name="eventDescription"></textarea><br>

        <label>Event Presenter:</label>
        <input type="text" name="eventPresenter" required><br><br>

        <label>Event Date:</label>
        <input type="date" name="eventDate" required><br><br>

        <label>Event Time:</label>
        <input type="time" name="eventTime" required><br><br> 

        <input type="submit" value="Add Event" id="submit"> 
    </form> 
    
</body>
</html>