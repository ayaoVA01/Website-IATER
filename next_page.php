<?php include('dbconnect/server.php') ?>

<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$num_per_page = 3;
$start_from = ($page - 1) * 3;

$query = "select * from blogs limit $start_from,$num_per_page";

?>

