<?php 
    session_start();

    require_once '../includes/db_connect.php';
    require_once 'functions.php';

    if(isset($_POST['submit'])) { 
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if(log_in($username, $password, $pdo)) {
            header("Location: index.php?message=Welcome back, " . $username);
            exit;
        } else {
            $error_message = "Invalid Credentials";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>WDV341 PHP Functions</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
    	body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('background.jpg');
        }
        
    	h1 {
        	font-size: 75px;
        	text-align: center;
        	padding-bottom: 50px;
        }
        
        form {
        	display: block;
        	margin: 0 auto;
        	width: 150px;
        }
        
        h2 {
        	text-align: center;
        }
        
        input {
        	border-radius: 5px;
        }
        
        #submit {
        	display: block;
        	margin: 0 auto;
        }
    </style>
</head>

<body>
	<header>
		<h1>Green Spirits High School</h1>
	</header>

    <section>    
		<h2>Admin Events Page Login</h2>
        <form action="login.php" method="post">
            <p>
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" />
            </p>
            <p>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" />
            </p>
            <input type="submit" name="submit" id="submit" />
        </form>
    </section>
</body>
</html>