<?php
	require_once '../includes/db_connect.php';

	$id = $_GET['id'];
	$event_name = $_POST['event_name'];
	$event_description = $_POST['event_description'];
	$event_date = $_POST['event_date'];
	$event_time = $_POST['event_time'];

	$sql = "UPDATE wdv341_events
            	SET event_name = :event_name, event_description = :event_description, event_date = :event_date, event_time = :event_time
            	WHERE id = :id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->bindParam(':event_name', $event_name);
	$stmt->bindParam(':event_description', $event_description);
	$stmt->bindParam(':event_date', $event_date);
	$stmt->bindParam(':event_time', $event_time);
	
	$stmt->execute();

	header("Location:selectEvents.php");
	exit;
?>