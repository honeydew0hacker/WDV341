<?php
	require_once '../includes/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".delete-link").forEach(link => {
            	link.addEventListener("click", function(e) {
                	e.preventDefault();

                	if(confirm("Are you sure?")) {
                    	   window.location.href = this.href;
                	
                       }
                });
            });
               
        });
    </script>
    <style>
	body {
		font-family: 'Trebuchet MS', sans-serif;
	}
	
	.back {
		background-color: #6495ED;
		color: white;
		padding: 10px 20px;
		text-align: center;
		display: block;
		margin: 50px auto;
		width: 150px;
	}
	
    	table, th, td {
    		border: 1px solid black;
    		border-collapse: collapse;
    		margin: 0 auto;
    	}
    	
    	.rowHeight {
        	height: 30px;
    	}
    	
    	 h1 {
        	font-size: 75px;
        	text-align: center;
        }
        
        h3 {
        	font-weight: lighter;
        	text-align: center;
        }
        .logout {
        	background-color: #6495ED;
		color: white;
		padding: 10px 20px;
		text-align: center;
		display: block;
		float: right;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_GET["message"])) {
            echo "<h3>" . htmlspecialchars($_GET["message"]) . "</h3>";
        }
    ?>
    <a href="logout.php" class="logout">Log Out</a>
    <h1>Green Spirits High School</h1>
    <h3>Welcome to our Green Spirits High School events page. Here, staff can add events happening in the school year-round! We look forward to <br>
communicating about student events and other updates, and we'll be able to update students, parents, and staff through this website!</h3>

    <table border = "1">
        <tr>
            <th>ID</th>
            <th>Event Name</th>
            <th>Event Description</th>
            <th>Event Presenter</th>
            <th>Event Date</th>
            <th>Event Time</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php
            $stmt = $pdo->query("Select * FROM wdv341_events");
            
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr class='rowHeight'>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["event_name"] . "</td>
                        <td>" . $row["event_description"] . "</td>
                        <td>" . $row["event_presenter"] . "</td>
                        <td>" . $row["event_date"] . "</td>
                        <td>" . $row["event_time"] . "</td>
                        <td><a class='delete-link' href='deleteEvent.php?id=" . $row["id"] . "'>Delete</a></td>
            		<td><a href='deliverEventObject.php?id=" . $row["id"] . "'>View Event</a></td>
            		<td><a class='update-link' href='updateEvent.php?id=" . $row["id"] . "'>Update Event</a></td>
            	      </tr>";

            }
        ?>

    </table>
    <a href="selectEvents.php" class="back">Add Event</a> 
    </body>
</html>