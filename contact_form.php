<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        body {
            text-align: center;
             font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        #contact {
            text-align: center;
            margin-top: 10%;
        }

        #button {
            background-color: lightblue;
            border-radius: 15%;
        }

    </style>
</head>
<body>

    <h1>Pamela Salas</h1>
    <br>
    <p>Thank you for choosing to contact me. Please enter your name, email and reason for contecting me.</p>

    <form id="contact" name="contact" method="post" action="formHandler_contact.php">
        <label for="name">Name:</label>
        <input type="text" name="name">
        <br><br>
        <label for="email" name="email">Email:</label>
        <input type="text" name="email">
        <br><br>

       <label for="reason" value="reason">Reason for contacting:</label> <br>
       <select name="reason" value="reason">
            <option value="info" name="info">Need more information</option>
            <option value="update" name="update">Update personal information</option>
            <option value="support" name="support">Technical Support</option>
            <option value="other" name="other">Other</option>
       </select>

       <p>
            <button name="button" id="button" value="Submit">Submit</button>
       </p>

    </form>
</body>
</html>