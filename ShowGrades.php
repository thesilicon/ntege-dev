<body bgcolor="#daf7a6">
  <form action="showgrades.php" method="post">    
    <table align="right" bgcolor="#A2FB5A" cellpadding="5" cellspacing="5">
      <tr>  
        <td> <label>Enter grade code to search:</label>   </td>
        <td>  <input name="txtsearch" type="text" size="25" maxlength="200" align="right"/> </td>
        <td><input name="SearchGrade" type="submit" value="Search" />   </td>            
      </tr>
    </table> 
  </form>
</body>
<?php 
include "DBconnect.php";         

$searchname=$_POST['txtsearch'];
if (isset($_POST['EditRecord'])) {


  //mapping inputs to variables
  $GradeCode = $_POST['txtGradeCode'];
  $Grade = $_POST['txtGrade'];
  $LowerBound = $_POST['txtLowerBound'];
  $UpperBound = $_POST['txtUpperBound'];


  $sql = "UPDATE grading Set GradeCode = '$GradeCode',Grade = '$Grade',LowerBound = '$LowerBound',UpperBound = '$UpperBound' where GradeCode = '$GradeCode'";
  $dbresult=mysql_query($sql);  
  echo'Record Successfully Edited';
  return false;

}           
if($searchname =='')
{
  return false;
}

$sql="SELECT * from grading where GradeCode LIKE '%$searchname%'";
$result = mysql_query ($sql) or die (mysql_error ());
while ($_POST = mysql_fetch_array ($result))
{ 

 $GradeCode = $_POST[0];
 $Grade = $_POST[1];
 $LowerBound = $_POST[2];
 $UpperBound = $_POST[3];

}

?>
<form action="showgrades.php" method="post">
 <table width="50%" cellpadding="6" cellspacing="5" border="1">
  <tr ><thead align="center" style="color: Brown;"><h2>EDIT GRADES</h2> </thead></tr>
  <tr><td>Grade Code:</td><td><INPUT TYPE = Text NAME  = txtGradeCode SIZE = 40   value =<?PHP echo $GradeCode; ?>></td></tr>
  <tr><td>Grade:</td><td> <INPUT TYPE = Text NAME = txtGrade SIZE = 40 value =<?PHP echo $Grade; ?>></td></tr>
  <tr><td>Lower Bound:</td><td> <INPUT TYPE = Text NAME = txtLowerBound SIZE = 40 value =<?PHP echo $LowerBound; ?>></td></tr>
  <tr><td>Upper Bound:</td><td> <INPUT TYPE = Text NAME = txtUpperBound SIZE = 40 value =<?PHP echo $UpperBound; ?>></td></tr>
  <tr><td colspan="2" align="center"><input type="submit" name= "EditRecord" value="Update"></td></tr>
</table>
</form> 




