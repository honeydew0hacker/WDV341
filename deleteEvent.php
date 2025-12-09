<?php
	require_once '../includes/db_connect.php';

	$id = $_GET["id"];

	$sql = "DELETE	
            FROM wdv341_events
            WHERE id = :id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	header("Location:index.php?message=Deleted Successfully");
?>