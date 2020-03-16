<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require 'crud.php';

    $id = $_POST['hidden_user_id'];
    $first_name = $_POST['u_first_name'];
    $last_name = $_POST['u_last_name'];
    $town_name = $_POST['u_town_name'];
    $gender_id = $_POST['u_gender_id'];

    $object = new CRUD();

    $object->Update($first_name, $last_name, $town_name,$gender_id, $id);
}