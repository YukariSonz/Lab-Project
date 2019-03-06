<!DOCTYPE html>

<html>
<?php require_once('../../../private/initialize.php'); ?>
 
<?php include(SHARED_PATH . '/header.php'); ?>

<?php 
    $doneString = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $record = [];
        $record['name'] = $_POST['name'] ?? '';
        $record['email'] = $_POST['email'] ?? '';                      
        insert_new_member($record);        
        $doneString = "Done!";
    }

?>


<body>  
    <br> 
    <br>
    
    <h1 align="center" class="text-white"> Sign Up! </h1>
    
    <form align = "center" class = "text-white" action="<?php echo url_for('staff/members/new.php'); ?>" method = "post">
            Name: <br> <input type="text" name="name"> <br>
            Email: <br> <input type="text" name="email"> <br>                                                                                
            <br>
            <input type="submit" value="Submit">
    </form> 

    <h1 align="center" class="text-white"> <?php echo $doneString ?> </h1>

    
</body>
</html>
