<?php

include "includes/config.php";

$id = $_GET['id'];

$eliminar = $conn->query("DELETE FROM tareas WHERE id = '$id'");

header("Location: index.php");

?>