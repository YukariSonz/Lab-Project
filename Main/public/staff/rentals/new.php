<!DOCTYPE html>

<html>
<?php require_once('../../../private/initialize.php'); ?>
 
<?php include(SHARED_PATH . '/header.php'); ?>

<?php     

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $record = [];
        $record['memberid'] = $_POST['memberid'] ?? '';
        $record['gameid'] = $_POST['gameid'] ?? '';                      
        insert_new_rental($record);                
        redirect_to(url_for('/staff/rentals/rental_records.php'));
        
    }

?>


<body>  
    <br> 
    <br>
    
    <h1 align="center" class="text-white"> Enter A New Rental Record </h1>
    
    <form align = "center" class = "text-white" action="<?php echo url_for('staff/rentals/new.php'); ?>" method = "post">
            Member ID: <br> <input type="text" name="memberid"> <br>
            Game ID: <br> <input type="text" name="gameid"> <br>                                                                                
            <br>
            <input type="submit" value="Submit">
    </form>     
    
</body>
</html>
