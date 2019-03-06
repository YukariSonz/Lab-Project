<!DOCTYPE html>

<html>

<?php require_once('../../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<html>

<body>

    <br>
    <br>

    <h1 align="center" class="text-white"> Enter A New Game </h1>
    
    <form align = "center" class = "text-white" action="create.php" method = "post">    
        Thumb: <br> <input type="text" name="thumb"><br>
        Name: <br> <input type="text" name="title"><br>
        Platform: <br> <input type="text" name="platform"><br>
        Genre: <br> <input type="text" name="genre"><br>
        Release Year: <br> <input type="text" name="releaseyear"><br>
        Price: <br> <input type="text" name="price"><br>
        <input type="submit" name="submit" value="submit">
    </form>
    

</body>


</html> 

