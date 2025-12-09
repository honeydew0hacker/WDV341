<?php 
function write_log($log, $location = 'debug.log') {
    error_log(print_r($log, true)."\n\r", 3, $location);
}

function v_array($needle, $haystack) {
    if(is_array($haystack) && array_key_exists($needle, $haystack)) {
        return $haystack[$needle];
    }

    return 0;
}

function set_connection_exception_handler($con, $e) {
    write_log($e->getMessage(), 'debug.log');
    write_log($con, 'debug.log');

    header('Location: 505_error_response_page_1.php');
}


function set_statement_exception_handler($stmt, $e) {
    write_log($e->getMessage(), 'debug.log');
    write_log($stmt->errno, 'debug.log');
    write_log($stmt->error, 'debug.log');

    header('Location: 505_error_response_page_2.php');
}

function log_in($username, $password, $pdo = null) {

    $sql = "SELECT username, password
                FROM customers
                WHERE username = :username and password = :password";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch();

        if($result) {
            $_SESSION['is_logged_in'] = true;
            return true;
        } else {
           $_SESSION['is_logged_in'] = false;     
            return false;
        }
    }

?>