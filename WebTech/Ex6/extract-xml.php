<?php
require 'vendor/autoload.php'; // Include MongoDB library

// Connect to MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->organizer;
$tasksCollection = $db->tasks;

// Fetch all tasks
$tasks = $tasksCollection->find();

// Create an XML document
$dom = new DOMDocument('1.0', 'UTF-8');
$dom->formatOutput = true;

// Root element
$root = $dom->createElement('tasks');
$dom->appendChild($root);

// Add tasks to the XML
foreach ($tasks as $task) {
    $taskElement = $dom->createElement('task');

    $nameElement = $dom->createElement('task_name', $task['task_name']);
    $dueDateElement = $dom->createElement('due_date', $task['due_date']);
    $statusElement = $dom->createElement('status', $task['status']);

    $taskElement->appendChild($nameElement);
    $taskElement->appendChild($dueDateElement);
    $taskElement->appendChild($statusElement);

    $root->appendChild($taskElement);
}

// Output XML
header('Content-Type: application/xml');
echo $dom->saveXML();
?>
