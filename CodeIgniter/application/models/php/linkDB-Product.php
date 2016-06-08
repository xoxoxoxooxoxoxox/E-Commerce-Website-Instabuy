<?php
/******************************************
************** Link Database **************
******************************************/
  session_start();

  $con = mysql_connect('cs-server.usc.edu:1904','root','root');

  if ($con) {

    // connecting to database
    $db = mysql_select_db('CS571',$con);

    // check database if it is connected
    if ($db) {

      $sql = "SELECT * FROM Product";
      $result = mysql_query($sql);
      //echo 'Well!';

    } else {

      // $db falied
      die('Could not connet...');
    }

  } else {

    // $con failed
    die('Could not connet...');
  }
?>