<?php
    require_once '../includes/db_connect.php';

    $eventName = $_POST['event_name'];
    $eventDescription = $_POST['eventDescription'];
    $eventPresenter = $_POST['eventPresenter'];
    $eventDate = $_POST['eventDate'];
    $eventTime = $_POST['eventTime'];
    $success = true;

    try {
        $sql = "INSERT INTO wdv341_events (event_name, event_description, event_presenter, event_date, event_time)
            VALUES (:event_name, :event_description, :event_presenter, :event_date, :event_time)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':event_name' => $eventName,
            ':event_description' => $eventDescription,
            ':event_presenter' => $eventPresenter,
            ':event_date' => $eventDate,
            ':event_time' => $eventTime
        ]);
        } catch (PDOException $e) {
    $error_message = $e->getMessage();
    $success = false;
}

if ($success) {
    header("Location: index.php?result=success");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Error Adding Event</h2>
    <p><?php echo "Error: " . htmlspecialchars($error_message); ?></p>
    <p><a href="index.php">Return to Events List</a></p>
  <?php
   // if ($success){
   // $result = ($success) ? "Event Added Succesfully" : "Error: $error_message"; 
   // header("Location: index.php?result");
   // } else {
   //     echo "<p>Error: $error_message</p>";

    ?>
</body>
</html>