<?php
/******************************************
************** Link Database **************
******************************************/
  session_start();

  //$con = mysql_connect('localhost','root','root');
  $servername = "localhost";
  $dbname = 'CS571';
  $username = "root";
  $password = "root";

  /*if ($con) {

    // connecting to database
    $db = mysql_select_db('CS571',$con);

    // check database if it is connected
    if ($db) {

      //$sql = "SELECT * FROM Product";
      //$result = mysql_query($sql);
      //echo 'Well!';

    } else {

      // $db falied
      die('Could not connet...');
    }

  } else {

    // $con failed
    die('Could not connet...');
  }*/

  try {
      $con = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully"; 
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

?>