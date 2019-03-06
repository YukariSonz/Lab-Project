


<head>
  <title>KobeGames</title>
  
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo url_for('/stylesheets/KobeGames.css'); ?>">

  <!-- Custom styles for this template -->
  
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>  
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>  
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>                   
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />  
</head>

      
<header>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">      
      <a class="navbar-brand bg-dark col-sm-3 col-md-2 mr-0" href="<?php echo url_for('index.php'); ?>">Kobe Games</a>                  
      
      <!-- Strut that fills in empty space -->
      <a class="w-100">

      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link text-white" href="<?php echo url_for('staff/members/new.php'); ?>">Sign Up</a>
        </li>
      </ul>

      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link text-white" href="<?php echo url_for('staff/members/member_records.php'); ?>">Staff Login</a>
        </li>
      </ul>

  </nav>  
</header>




