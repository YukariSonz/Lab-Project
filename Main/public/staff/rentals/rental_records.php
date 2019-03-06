<!DOCTYPE html>

<html>
<?php require_once('../../../private/initialize.php'); ?>
 
<?php include(SHARED_PATH . '/header.php'); ?>

<?php $rentalQuery = "select RENTALID, MEMBERID, GAMEID, STARTDATE, DUEDATE
                      FROM RENTAL inner join RENTALINFO
                      where RENTAL.RENTALID = RENTALINFO.INFOID" ?>

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
                            <td>Game ID</td>                                                        
                            <td>Start Date</td>     
                            <td>Due Date</td> 
                            <td>Extend</td>    
                            <td> Ban </td>
                        </tr>                        
                    </thead>                     
                    <?php $result = mysqli_query($db, $rentalQuery); ?>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                        <td><?php echo $row['MEMBERID']; ?></td>
                        <td><?php echo $row['GAMEID']; ?></td>                                                
                        <td><?php echo $row['STARTDATE']; ?></td>                                                                        
                        <td><?php echo $row['DUEDATE']; ?></td>                                                                        
                        <td><a class="action" href="<?php echo url_for('/staff/rentals/extend.php?id=' . h(u($row['RENTALID']))); ?>">Extend</a></td>
                        <td><a class="action" href="<?php echo url_for('/staff/rentals/ban.php?id=' . h(u($row['RENTALID']))); ?>">Ban Member</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div> 


        <div align = "center" class="actions">            
            <form action="<?php echo url_for('/staff/rentals/new.php'); ?>"> <input type="submit" value="Create New Record" />  </form>
        </div>

    </main>

    
    
</body>
</html>

<script>  
$(document).ready(function(){  
        $('#staff_database').DataTable();  
});  
</script> 