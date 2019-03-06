<!DOCTYPE html>

<html>
<?php require_once('../../../private/initialize.php'); ?>
 
<?php include(SHARED_PATH . '/header.php'); ?>

<?php 
    $id = $_GET['id'];          
       
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {               
        ban_member($id);                
        redirect_to(url_for('/staff/members/member_records.php'));
    }    
    
    

?>


<body>
    <?php include(SHARED_PATH . '/dashboard.php'); ?>    
    <br>
    <br>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">                                  
        <div align ="center" class="ban-record text-white">
            <h1>Ban Member</h1>
            <p>Are you sure you want to ban this member?</p>            

            <form action="<?php echo url_for('/staff/rentals/ban.php?id=' . h(u($id))); ?>" method="post">                                        
                    <input type="submit" value="Submit">
            </form> 
        </div>        
    </main>

    
</body>
</html>
