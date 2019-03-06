<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['GAMEID'])){
    
    redirect_to(url_for('/staff/games/game_records.php'));
    
}

$gameid = $_GET['GAMEID'];
$game = findGameById($gameid);


if(isset($_POST['submit'])) {
    
    $sql = "DELETE FROM GAME ";
    $sql .= "WHERE GAMEID='" . $gameid . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result){
        redirect_to(url_for('/staff/games/game_records.php'));
    } else {
        db_disconnect($db);
        exit;
    }


} else {
  
}

?>

<?php $page_title = 'Delete Game'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/games/game_records.php'); ?>">&laquo; Back to List</a>

<br>
<br>

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">                            
    <div align = "center" class="page delete text-white" >
      <h1>Delete Page</h1>
      <p>Are you sure you want to delete this game?</p>
      <p class="main"><?php echo $game['TITLE']; ?></p>
      
      <form action="<?php echo url_for('/staff/games/delete.php?GAMEID=' . $game['GAMEID']); ?>" method="post">
        <div id="operations">
          <input type="submit" name="submit" value="submit" />
        </div>
      </form>
    </div>
  </main>                            

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
