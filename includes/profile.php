<?php
    require_once "db.php";
    $id = $_REQUEST['id'];
	$id = (int)$id;
    $userQuery = "SELECT * FROM users WHERE id = '{$id}'";
    $user = $connect->query($userQuery);
    $userDetails = mysqli_fetch_assoc($user);
    
?>
<div class="container">
    <?=$userDetails['firstname'];?>
</div>