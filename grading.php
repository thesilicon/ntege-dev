<?php
   include "DBconnect.php";
  if($db_found){
      $SQL = "INSERT INTO grading(GradeCode,Grade,LowerBound,UpperBound)VALUES('92','A','91.5','92.5')";
      $result = mysql_query($SQL);
      mysql_close($link);
  }
  else{
      print "Database NOT Found";
      mysql_close($link);
  }
?>
