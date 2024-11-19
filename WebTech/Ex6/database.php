<?php
require 'vendor/autoload.php'; // Include MongoDB library

// Connect to MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");
try {
    // Try to execute a basic query
    $client->listDatabases();
    echo "Connected to MongoDB successfully.";
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}


// Select the database and collection
$db = $client->organizer;
$tasksCollection = $db->tasks;

// Fetch all tasks
$tasks = $tasksCollection->find();

// Display tasks in a table
echo "<h1>Task List</h1>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Task Name</th><th>Due Date</th><th>Status</th></tr>";

foreach ($tasks as $task) {
    echo "<tr>";
    echo "<td>" . $task['task_name'] . "</td>";
    echo "<td>" . $task['due_date'] . "</td>";
    echo "<td>" . $task['status'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
