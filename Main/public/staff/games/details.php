<?php require_once('../../../private/initialize.php'); ?>
<?php 

$title = isset($_GET['title']) ?? 'GAME NOT FOUND';

echo "Game: " . $id;

?>

<?php $page_title = 'Game Details'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
 <div id="content">
 
      <a class="back-link" href="<?php echo url_for(PUBLIC_PATH . '/index.php'); ?>">&laquo; Back to Games</a>
    
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
