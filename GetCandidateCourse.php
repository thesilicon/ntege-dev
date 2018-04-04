  <body bgcolor="#96897f">
  <form action="Enrollment.php"method="post">
  <table width="50%"cellpadding="6"cellspacing="5"border="1">
  <tr><thead align="center"style="color:red;"><h2>Enroll Candidate in a Course.</h2>
  </thead>
  </tr>
  <tr>
<td>Registration Number:</td>
<td>

<?php

    $searchname=$_POST['Reg_No'];
    include"Dbconnect.php";
    if($db_found){
        $SQL="SELECT DISTINCT RegNo FROM candidate";
        $result=mysql_query($SQL);
        print"<select name='Reg_No'id='cbo_RegNo'>";
        while($Get_Reg_No = mysql_fetch_array($result)){
        print"<option value='".$Get_Reg_No['RegNo']."'>".$Get_Reg_No['RegNo']."</option>";
        }
  print"<select>";
    }
   mysql_close($link);
   
?>

</td>
</tr>
<tr>
<td>CourseCode:</td>
<td>

<?php

$searchcourse=$_POST['CourseCode'];
include"Dbconnect.php";
if($db_found){
  $SQL="SELECT DISTINCT CourseCode FROM course";
$result = mysql_query($SQL);
 print"<select name='Course' id = 'cbo_Course'>";
while ($Get_CourseID = mysql_fetch_array($result)) { 
    print "<option value='" . $Get_CourseID['CourseCode'] . "'>" . $Get_CourseID['CourseCode'] ."</option>";   
}
print "<select>";   
}
mysql_close($link);

                          
?>
  
  </td>
  </tr>
  <tr>
  <td colspan="2" align="center"><input type="submit" name= "GetDetails" value="Get Candidate and Course"></td>  
  </tr>
  </table>
  </form>
  </body>



