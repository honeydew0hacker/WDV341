<?php

    require_once '../includes/db_connect.php'; 

    header("Content-Type: application/json");

    try {
        $sql = "SELECT id, event_name, event_description, event_presenter, event_date, event_time
                FROM wdv341_events
                WHERE id = :id
                LIMIT 1";
        
        $stmt = $pdo->prepare($sql);

        $eventID = $_GET['id'] ?? 1;
        $stmt->bindParam(':id', $eventID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$row) {
            echo json_encode(["error" => "Event not found"]);
            exit;
        }
    } catch (PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }

        class Event {
            public $id;
            public $event_name;
            public $event_description;
            public $event_presenter;
            public $event_date;
            public $event_time;

            function __construct($id, $event_name, $event_description, $event_presenter, $event_date, $event_time) {
                $this->id = $id;
                $this->event_name = $event_name;
                $this->event_description = $event_description;
                $this->event_presenter = $event_presenter;
                $this->event_date = $event_date;
                $this->event_time = $event_time;
            }
        }

        $eventObj = new Event (
            $row['id'],
            $row['event_name'],
            $row['event_description'],
            $row['event_presenter'],
            $row['event_date'],
            $row['event_time']
        );

        echo json_encode($eventObj);
    ?>