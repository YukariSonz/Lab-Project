<?php

echo "Working";

require_once('../../../private/initialize.php');

if(isset($_POST['submit'])){
    
    $thumb = $_POST['thumb'] ?? '';
    $title = $_POST['title'] ?? '';
    $platform = $_POST['platform'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $releaseyear = $_POST['releaseyear'] ?? '';
    $price = $_POST['price'] ?? '';
    
    $result = insertGame($thumb, $title, $platform, $genre, $releaseyear, $price);
    $newid = mysqli_insert_id($db);
    redirect_to(url_for('/staff/games/game_records.php'));

} else {
    
    redirect_to(url_for('staff/games/new.php'));  
    
}

?>

