<!DOCTYPE html>

<html>
<?php require_once('../../../private/initialize.php'); ?>
 
<?php include(SHARED_PATH . '/header.php'); ?>

<?php 
    $id = $_GET['id'];            
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $record = [];
        $record['id'] = $id;
        $record['name'] = $_POST['name'] ?? '';
        $record['email'] = $_POST['email'] ?? '';                             
        $record['banned'] = $_POST['banned'] ?? '';                             
        $record['balance'] = $_POST['balance'] ?? '';                             
        update_member($record);    
        redirect_to(url_for('/staff/members/member_records.php')); 
    } 

    $row = get_member($id);    

?>


<body>
    <?php include(SHARED_PATH . '/dashboard.php'); ?>    
    
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">                                  
        <div class ="container">
            <br>
            <br>            
            
            <h1 align="center" class="text-white"> Edit Record </h1>

            <form class="text-white" action="<?php echo url_for('/staff/members/edit.php?id=' . h(u($id))); ?>" method="post">
                    Name: <br> <input type="text" name="name" value = " <?php echo $row['NAME']; ?> "> <br>
                    Email: <br> <input type="text" name="email" value = " <?php echo $row['EMAIL']; ?> "> <br>                                                                                                   
                    Banned: <br> <input type="text" name="banned" value = " <?php echo $row['BANNED']; ?> "> <br>                                                                                                   
                    Balance: <br> <input type="text" name="balance" value = " <?php echo $row['BALANCE']; ?> "> <br>                                                                                                                     
                    <br>
                    <input type="submit" value="Submit">
            </form> 
        </div>         
    </main>

    
</body>
</html>


