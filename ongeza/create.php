<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    require("crud.php");

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $town_name = $_POST['town_name'];
    $gender_id = $_POST['gender_id'];

    $object = new CRUD();

    $object->Create($first_name, $last_name, $town_name,$gender_id);
}
?>