<?php
$link = mysqli_connect("localhost", "root", "", "Footprints");

// Check connection
if (!$link) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
echo "Connected successfully!";
?>