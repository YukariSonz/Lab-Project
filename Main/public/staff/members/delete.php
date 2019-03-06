<!DOCTYPE html>

<html>
<?php require_once('../../../private/initialize.php'); ?>
 
<?php include(SHARED_PATH . '/header.php'); ?>

<?php 
    $id = $_GET['id'];          
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        delete_member($id);                
        redirect_to(url_for('/staff/members/member_records.php'));
    }        
    

?>


<body>
    <?php include(SHARED_PATH . '/dashboard.php'); ?>    
    <br>
    <br>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">                                  
        <div align ="center" class="delete-record text-white">
            <h1>Delete Record</h1>
            <p>Are you sure you want to delete this record?</p>            

            <form action="<?php echo url_for('/staff/members/delete.php?id=' . h(u($id))); ?>" method="post">                                        
                    <input type="submit" value="Submit">
            </form> 
        </div>        
    </main>

    
</body>
</html>
