<!DOCTYPE html>

<html>


<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>


<body> 

    <main role="main" class="">
        <div class="container">
            <h1 align="center" class="text-white"> Kobe Game Database </h1>
            <div class="table-responsive text-white">
                <div class="table-responsive">
                    <table id="game_database" class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <td>Icon</td>
                                <td>Name</td>
                                <td>Platform</td>
                                <td>Genre</td>
                                <td>Release Date</td>
                                <td>Rating</td>
                                <td>Available</td>
                            </tr>
                        </thead>
                        
                
                <?php $result = mysqli_query($db, "SELECT * FROM GAME;"); ?>
                        
                <?php while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                  <td><?php echo "<img src = '" . $row['THUMB'] . "'height='150' width='125'/>"; ?></td>
                  <td><?php echo $row['TITLE']; ?></td>
                  <td><?php echo $row['PLATFORM']; ?></td>
                  <td><?php echo $row['GENRE']; ?></td>
                  <td><?php echo $row['RELEASEYEAR']; ?></td>
                  <td><?php echo $row['PRICE']; ?></td>
                  <td><?php echo $row['RATING']; ?></td>
                  <td><?php echo showBool($row['AVAILABLE']); ?></td>
            	  </tr>
              <?php } ?>

                        
                    </table>
                </div>
            </div>
</body>

</html>

<script>
    $(document).ready(function () {
        $('#game_database').DataTable();
    });
</script>