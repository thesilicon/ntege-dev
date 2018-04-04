<?php
  include "Dbconnect.php";
  if($db_found){
      $SQL = "INSERT INTO candidate(RegNo,FirstName,OtherNames,PhoneNo,Email,Gender,Age)VALUES('121','Jirany','Murimi','0712907533','jirany@gmail.com','M',30)";
      $result = mysql_query($SQL);
      mysql_close($link);
  }
  else{
      print "Database NOT Found";
      mysql_close($link);
  }
?>
 