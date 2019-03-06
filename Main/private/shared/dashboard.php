<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                   <li class="nav-item">
                        <a class="nav-link" href="<?php echo url_for('staff/games/game_records.php'); ?>">                            
                            Game Records
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url_for('staff/members/member_records.php'); ?>">                        
                            Member Records
                        </a>
                    </li>                    

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url_for('staff/members/violations_records.php'); ?>">                            
                            Violations Records
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url_for('staff/rentals/rental_records.php'); ?>">                            
                            Rental Records
                        </a>
                    </li>
               
            </div>
        </nav>

    </div>
</div>