
<?php	   
    
    function addGame($gameID,$platform,$gameName,$gameValue,$ifDamaged){
    	$sql = "insert into GAME(GAMEID,PLATFORM,TITLE,PRICE)) values (" . $gameID . ",". $platform . "," . $gameName . "," . $value . "," . "false)" ;
    	if ($connection->query($sql) === true) {
  			  return "Success!";
			} 
			else {
   	 		return "Connection error!";
   	 	}


    }
    
    function insertGame($thumb, $title, $platform, $genre, $releaseyear, $price){
        
        global $db;   
        $sql = "INSERT INTO GAME";
        $sql .= "(THUMB,TITLE,PLATFORM,GENRE,RELEASEYEAR,PRICE) ";
        $sql .= "VALUES (";
        $sql .= "'" . $thumb . "',";
        $sql .= "'" . $title . "',";
        $sql .= "'" . $platform . "',";
        $sql .= "'" . $genre . "',";
        $sql .= "'" . $releaseyear . "',";
        $sql .= "'" . $price . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
            
        if($result){
           return true;
        } else {
            echo mysqli_error($db);
            echo "Failure";
            db_disconnect($db);
            exit;
        }

    
    }
    
    function findGameByID($id) {
        global $db;
    
        $sql = "SELECT * FROM GAME ";
        $sql .= "WHERE GAMEID='" . $id . "'";
        $result = mysqli_query($db, $sql);
        $game = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $game; // returns an assoc. array
  }



    
    
    function checkRentable($memberId,$gameId){
    	//Check if banned or not
    	$banQuery = "SELECT BANNED FROM Member WHERE MEMBER =" .  $memberId;
    	$result = mysqli_query($connection,$banQuery);
    	//Check if the game is available
    	$availableQuery = "SELECT * FROM GAME WHERE GAMEID=" . $gameId . "and AVAILABLE=TRUE";  
    	$avail_result = mysqli_query($connection,$availableQuery);
    	if (mysqli_num_rows($result)>=1 || mysqli_num_rows($avail_result)==0){
    		return false;
    	}
    	else{
    		return true;
    	}
		

    }

    function rentAGame($memberId,$gameId){
    	if (checkRentable){
    		$sql = "insert into RENTAL(MEMBERID, GAMEID) values (" . $memberId . "," . $gameId . ")";
    		$getRentalID = "select RENTALID FROM RENTAL WHERE MEMBERID=" . $memberId . "AND GAMEID=" .$gameId . "AND ACTIVE=TRUE"; 
    		$sql_two = "insert into RENTALINFO values (" . $getRentalID . ",CURDATE(), DATE_ADD(CURDATE(),INTERVAL 2 WEEK))" ;
    		if ($connection->query($sql) === true) {
  			  return "Successfully rented!";
			} 
			else {
   	 		return "Connection error!";
   	 	}
    	}
    	else{
    		return "You are unable to rent a game cause you might be banned or the game is not available!";
      }
    }
    
    function returnAGame($memberId,$gameId){
    	if (checkPunishment($memberId,$gameId)){
    		$sql_update = "update MEMBER set BANNED = TRUE WHERE MEMBERID=" . $memberId;
    		$connection->query($updateSQL);
    	}
    	$updateSQL = "UPDATE RENTAL SET ACTIVE = FALSE WHERE GAMEID=" . $gameId . "AND MEMBERID= " . $memberId ;
    	if ($connection->query($updateSQL) === TRUE) {
        		return "Returned Successfully";
    		}
    		else {
        		return "Error when updating record, this might be the connection error";
    		}
    }
    
	
	function checkPunishment($memberId,$gameId){
		$SQLcheckExpired = "SELECT DATEDIFF(day,DUEDATE,STARTDATE) FROM RENTAL INNER JOIN RENTALINFO ON RENTAL.RENTALID = RENTALINFO.INFOID
    	  where MEMBERID=" . $memberId . "and GAMEID=" . $gameId ;
    	$expiredData = mysqli_query($connection,$SQLcheckExpired);
      $row = mysqli_fetch_assoc($SQLcheckExpired);
      $time = $row["DateDiff"];
      $timeInt=(int)$time;
      if ($timeINt<3){
      	return TRUE;
      }
      else{
      	return FALSE;
      }
	}	
	

    function extendRent($memberId, $gameId){
    	if (isExtendable($memberId, $gameId)){
    		$updateSQL = "UPDATE RENTAL SET due = "
    		. "DATEADD(week,1, (SELECT DUEDATE FROM RENTAL INNER JOIN RENTALINFO ON RENTAL.RENTALID=RENTALINFO.INFOID"
    		. "WHERE MEMBERID=" . $memberId . " and GAMEID=" . $gameId . ")" . ")";
    		if ($connection->query($updateSQL) === TRUE) {
        		return "Extended Successfully";
    		}
    		else {
        		return "Error when updating record, this might be the connection error";
    		}
    	}
    	else{
    		return "You are not able to extend the game rental period";
    	}
    }

    function isExtendable($memberId, $gameId){
    	//Check if the game expired the limit
    	$SQLcheckExpired = "SELECT DATEDIFF(day,DUEDATE,STARTDATE) FROM RENTAL INNER JOIN RENTALINFO ON RENTAL.RENTALID = RENTALINFO.INFOID
    	  where MEMBERID=" . $memberId . "and GAMEID=" . $gameId . "AND ACTIVE = TRUE";
    	$expiredData = mysqli_query($connection,$SQLcheckExpired); //The result of the query
		
		//NEED MODIFICATION DUE TO CHANGE IN DATABASE 
    	$SQLCheckTimeExtended = "SELECT * FROM EXTENTION INNER JOIN RENTAL ON RENTAL.RENTALID = EXTENTION.EXTID 
    	  WHERE MEMBERID =" . $memberId . "and GAMEID =" . $gameId . "AND ACTIVE = TRUE";
    	$extendedData = mysqli_query($connection,$SQLCheckTimeExtended); //The result of the query

    	if (mysqli_num_rows($expiredData > 0)){
            $row = mysqli_fetch_assoc($SQLcheckExpired);
            $time = $row["DateDiff"];
            $timeInt=(int)$time;
        }
    	if (mysqli_num_rows($extendedData)<2 && $timeInt>=0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }


    function retriveRentalRecords(){
    	$sqlQuery = "SELECT * FROM RENTAL";
    	$data = mysql_query($connection, $sqlQuery);
    	$resultArray = Array();
    	 while($row = mysqli_fetch_assoc($data)){
    	 	array_push($resultArray,$row);
    	 }
    	 return $resultArray; //RETURN AN ARRAY OF ASSOCIATE ARRAY

    }

    function retriveMemberRecords(){
    	$sql = "SELECT MEMBERID, EMAIL, BANNED, BALANCE FROM MEMBER";
    	$data = mysql_query($connection, $sql);
    	$resultArray = Array();
    	 while($row = mysqli_fetch_assoc($data)){
    	 	array_push($resultArray,$row);
    	 }
    	 return $resultArray; //RETURN AN ARRAY OF ASSOCIATE ARRAY
    }


    function get_details_for_game($gameID){
    	$sql = "SELECT * from GAME where MEMBERID=" . $gameID;
    	$result = mysql_query($connection, $sql);
    	$resultArray = Array();
    	while($row = mysqli_fetch_assoc($result)){
    	 	array_push($resultArray,array($row["gameid"],$row["title"],$row["platform"],$row["genre"],$row["releaseyear"],$row["value"],$row["thumb"]));
    	}
    	return $resultArray;

    }    
		    

    function get_all_violation(){
		global $db;
    	$sql = "SELECT MEMBERID, GAMEID, VIOLATIONDATE FROM VIOLATION INNER JOIN RENTAL 
    	ON VIOLATION.VIOID = RENTAL.RENTALID";    	
    	return mysqli_query($db, $sql);;

    }

	function get_member($id) {
		global $db;
		$sql = "SELECT * FROM MEMBER " . "WHERE MEMBERID='" . $id . "'";    
    	$result = mysqli_query($db, $sql);
    	return mysqli_fetch_array($result);
	}

	function insert_new_member($record) {
		global $db;		
        $sql = "INSERT INTO MEMBER ";
        $sql .= "(MEMBERID, NAME, EMAIL, BANNED, BALANCE) ";
        $sql .= "VALUES (NULL,";
        $sql .= "'" . $record['name'] . "',";
        $sql .= "'" . $record['email'] . "',";        
        $sql .= "0, '0')";                		
		mysqli_query($db, $sql);		
	}

	function update_member($record) {
		global $db;
		$sql = "UPDATE MEMBER SET ";        		
		$sql .= "NAME='" . $record['name'] . "', ";
        $sql .= "EMAIL='" . $record['email'] . "', ";
        $sql .= "BANNED=" . $record['banned'] . ", ";
        $sql .= "BALANCE=" . $record['balance'];
		$sql .= " WHERE MEMBERID=" . $record['id'];  		
        mysqli_query($db, $sql); 

	}


	function delete_member($id) {
		global $db;
		$sql = "DELETE FROM MEMBER ";
		$sql .= "WHERE MEMBERID='" . $id . "' ";                		
        mysqli_query($db, $sql);        
	}
	
	function ban_member($id) {
		global $db;

		//create a violation record		
		$viosql = "INSERT INTO VIOLATION (VIOID, VIOLATIONDATE) VALUES (";
		$viosql .= "'" . $id . "',";
		$viosql .= "now())";		

		mysqli_query($db, $viosql);   	
		
		//find member to ban
		$result = mysqli_query($db, "SELECT MEMBERID FROM RENTAL WHERE RENTALID = " . $id );		
		$row = mysqli_fetch_array($result);
		$memberid = $row['MEMBERID'];	
		
		//ban member
		$memsql = "UPDATE MEMBER SET ";        		
		$memsql .= "BANNED=1 ";
		$memsql .= "WHERE MEMBERID='" . $memberid . "' "; 		
		
		mysqli_query($db, $memsql);   							     

	}

	function insert_new_rental($record) {
		global $db;		

		//insert into rental table
        $sql = "INSERT INTO RENTAL ";
        $sql .= "(RENTALID, MEMBERID, GAMEID, ACTIVE) ";
        $sql .= "VALUES (NULL,";
        $sql .= "'" . $record['memberid'] . "',";
        $sql .= "'" . $record['gameid'] . "',";        
        $sql .= "'1')";                		
		mysqli_query($db, $sql);
		

		//insert into rental info		
		$row = get_recent_rental_id();		
		$id = $row['RENTALID'];				

		$rentalInfoSql = "INSERT INTO RENTALINFO "; 
		$rentalInfoSql .= "(INFOID, STARTDATE, DUEDATE) ";
		$rentalInfoSql .= "VALUES (" . $id . ",";
		$rentalInfoSql .= "now()" . ",";
		$rentalInfoSql .= "DATE_ADD(now(),INTERVAL 2 WEEK)" . ")";        	
			   		
		mysqli_query($db, $rentalInfoSql);
	}

	//get the most recently created rental id
	function get_recent_rental_id() {
		global $db;
		$sql = "SELECT RENTALID FROM RENTAL ORDER BY RENTALID DESC LIMIT 1";    
    	$result = mysqli_query($db, $sql);
    	return mysqli_fetch_array($result);
	}

	function extend_rental($id) {
		global $db;
		$sql = "UPDATE RENTALINFO SET DUEDATE = DATE_ADD(DUEDATE, INTERVAL 2 WEEK)";        		        
		$sql .= "WHERE INFOID='" . $id . "' "; 		       
		mysqli_query($db, $sql); 
		
		//create an extention record
		$extentionsql = "INSERT INTO EXTENTION (EXTID) VALUES (" . $id . ")"; 
		mysqli_query($db, $extentionsql);		
	}		
    
?>
