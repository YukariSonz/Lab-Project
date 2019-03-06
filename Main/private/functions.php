<?php

//retrieves url for a path eg: access css file from header.php
function url_for($script_path)
{
    // add the leading '/' if not present
    if ($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}


function u($string = "")
{
    return urlencode($string);
}

function h($string = "")
{
    return htmlspecialchars($string);
}



function showBool($myBool)
{
    return ($myBool) ? 'Yes' : 'No';
}



function userCanRent($memberId)
{
    return (!isBanned($memberId) && !rentedMaxGames($memberId));
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

?>
