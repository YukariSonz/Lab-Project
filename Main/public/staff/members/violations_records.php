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
                            <td>Game ID </td>                                               
                            <td>Violation Date </td>                                                                              
                        </tr>                        
                    </thead> 
                    <?php
                        $result = get_all_violation();
                        while($row =  mysqli_fetch_array($result) ){
                                echo "<tr>";							
                                echo "<td>" . $row['MEMBERID'] . "</td>";                                
                                echo "<td>" . $row['GAMEID'] . "</td>";                                
                                echo "<td>" . $row['VIOLATIONDATE'] . "</td>";                                
                                echo "</tr>";
                        }
                    ?>
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