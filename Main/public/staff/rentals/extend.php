<!DOCTYPE html>

<html>
<?php require_once('../../../private/initialize.php'); ?>
 
<?php include(SHARED_PATH . '/header.php'); ?>

<?php 
    $id = $_GET['id'];          
       
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {               
        extend_rental($id);                                
        redirect_to(url_for('/staff/rentals/rental_records.php'));
    }    
    
    

?>


<body>
    <?php include(SHARED_PATH . '/dashboard.php'); ?>    
    <br>
    <br>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">                                  
        <div align ="center" class="extend-rental text-white">
            <h1>Extend Game For Member?</h1>
            

            <form action="<?php echo url_for('/staff/rentals/extend.php?id=' . h(u($id))); ?>" method="post">                                        
                    <input type="submit" value="Submit">
            </form> 
        </div>        
    </main>

    
</body>
</html>
