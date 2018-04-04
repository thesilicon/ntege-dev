<html>
<head><title>Register Grades</title></head>  
<body bgcolor="#33B196">
<form action="Grades.php"method="post">
<table width="50%" cellpadding="6" cellspacing="5" border="1">
<tr><thead align="center" style="color:red;"><h2>GRADES</h2>
</thead> </tr>
<tr> <td>Grade Code:</td>
<td><INPUT TYPE =Text NAME = txtGradeCode SIZE = 40 value =<?PHP $GradeCode;?>></td>
</tr>
<tr><td>Grade:</td> <td> <INPUT TYPE = =Text NAME = txtGrade SIZE = 40 value =<?PHP $Grade;?>></td>
</tr>
 <tr><td>Lower Bound:</td> <td> <INPUT TYPE =Text NAME = txtLowerBound SIZE = 40 value =<?PHP $LowerBound;?>></td>
 </tr>
 <tr><td>Upper Bound:</td>
 <td><INPUT TYPE= Text NAME = txtUpperBound SIZE = 40 value =<?PHP $UpperBound;?>></td>
 </tr>
</table>
<P>
<INPUT TYPE = Submit Name = SaveGrades VALUE = "Save Grades">
</P>
</form>
</body>




<?php
   include "DBconnect.php";                                                                                     
  if($db_found){
       //mapping inputs to variables 
      $GradeCode = $_POST['txtGradeCode'];
      $Grade = $_POST['txtGrade'];
      $LowerBound=$_POST['txtLowerBound'];
      $UpperBound=$_POST['txtUpperBound'];
    //inserting record details into database table
      $SQL = "INSERT INTO grading(GradeCode,Grade,LowerBound,UpperBound)VALUES('$GradeCode','$Grade','$LowerBound', '$UpperBound')";
      $result = mysql_query($SQL);
      mysql_close($link);
  }
  else{
      print "Database NOT Found";
      mysql_close($link);
  }
?>
</html> 