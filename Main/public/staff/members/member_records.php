<!DOCTYPE html>

<html>
<?php require_once('../../../private/initialize.php'); ?>
 
<?php include(SHARED_PATH . '/header.php'); ?>

<body>
    <?php include(SHARED_PATH . '/dashboard.php'); ?>    
    
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">                                  
        <div class ="container">
            <h1 align="center" class="text-white"> Member Records </h1>
            <div class ="table-responsive text-white">
                <table id="staff_database" class ="table table-hover table-dark">
                    <thead>
                        <tr>
                            <td>Member ID</td>                     
                            <td>Name</td>                                                        
                            <td>Email</td>                                                        
                            <td>Banned</td>     
                            <td>Balance</td>                                                                           
                            <td> Edit </td>                            
                            <td> Delete </td>
                        </tr>                        
                    </thead> 

                    <?php $result = mysqli_query($db, "SELECT * FROM MEMBER"); ?>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                        <td><?php echo $row['MEMBERID']; ?></td>
                        <td><?php echo $row['NAME']; ?></td>                                                
                        <td><?php echo $row['EMAIL']; ?></td>                                                
                        <td><?php echo showBool($row['BANNED']); ?></td>                                                
                        <td><?php echo $row['BALANCE']; ?></td>                                                
                        <td><a class="action" href="<?php echo url_for('/staff/members/edit.php?id=' . h(u($row['MEMBERID']))); ?>">Edit</a></td>                        
                        <td><a class="action" href="<?php echo url_for('/staff/members/delete.php?id=' . h(u($row['MEMBERID']))); ?>">Delete</a></td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div> 
        
    </main>

    
</body>
</html>

<script>  
$(document).ready(function(){  
        $('#staff_database').DataTable();  
});  
</script> 