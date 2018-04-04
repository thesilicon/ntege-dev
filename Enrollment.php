 <?php
    $searchname=$_POST['Reg_No'];
    $searchcourse=$_POST['Course'];     

include "DBconnect.php";         
 
if (isset($_POST['GetDetails'])) {

      
            $sql="SELECT * from candidate where RegNo LIKE '%$searchname%'";
 
        $result = mysql_query ($sql) or die (mysql_error ());
        
         while ($_POST = mysql_fetch_array ($result)){ 
           
         $FullNames = $_POST[1]." ".$_POST[2];
           }
          $sql="SELECT * from course where CourseCode LIKE '%$searchcourse%'";
 
        $result = mysql_query ($sql) or die (mysql_error ());
        
         while ($_POST = mysql_fetch_array ($result)){ 
           
         $Description = $_POST[1];
           }
    }

           ?>
 <body bgcolor="#daf7a6">
<form action="Enrollment.php" method="post">    
               <h2 style="color: maroon;">Record Scores</h2> 
    <hr style="color: fuchsia;">
               <table width="50%" cellpadding="6" cellspacing="5" border="0">
  <tr> 
 <td>Registration Number:</td>
   <td> 
   <INPUT TYPE = Text NAME = txtRegistrationNo SIZE = 40 value =<?PHP echo $searchname; ?>>                                                                              
   </td>  
</tr>
 <tr>
  <td>Full Names:</td>
  <td> 
  <INPUT TYPE = Text NAME = txtFirstName SIZE = 40 value =<?PHP echo "$FullNames"; ?>></td>
 </tr>
 <tr>
  <td>Course Code:</td> 
  <td><INPUT TYPE = Text NAME = txtCourseCode SIZE = 40 value =<?PHP echo $searchcourse; ?>></td> 
 </tr>
 <tr>
  <td>Description:</td>
  <td> <INPUT TYPE = Text NAME = txtDesription SIZE = 40 value =<?PHP echo $Description; ?>></td> 
 </tr>
    <tr>
  <td>Semester:</td>
  <td> <INPUT TYPE = Text NAME = txtSemester SIZE = 40 value =""></td> 
  </tr>
   <tr>
  <td>Score:</td>
  <td> <INPUT TYPE = Text NAME = txtScore SIZE = 40 value ="" style="border-color: blue;"></td> 
  </tr>
 </table>

 <hr style="color: fuchsia;">      
     <INPUT TYPE = Submit Name = "SaveScore" VALUE = "Save Score">    
 </body>  


 
 <?php

 // evaluating the checked radio button   
if (isset($_POST['SaveScore'])) {
    
     $searchscore=$_POST['txtScore'];
     $RegNo = $_POST['txtRegistrationNo'];
    $CourseCode = $_POST['txtCourseCode'];
    $Semester = $_POST['txtSemester'];
    $Score= $_POST['txtScore']; 
   
include "DBconnect.php";         
 
if (isset($_POST['SaveScore'])) {
      
$sql="SELECT * from grading where LowerBound >= $searchscore AND UpperBound <=$searchscore";

        $result = mysql_query ($sql) or die (mysql_error ());     
        
         while ($_POST = mysql_fetch_array ($result)){ 
            
           
         $grade = $_POST[0];
           }
           if ($Grade==""){
                 
          $sql="SELECT * from grading where UpperBound >=$searchscore";

        $result = mysql_query ($sql) or die (mysql_error ());     
        
         while ($_POST = mysql_fetch_array ($result)){ 
            
           
         $Grade = $_POST[0];  
         }   
                 
             }
           if ($Grade==""){
                 
          $sql="SELECT * from grading where LowerBound >=$searchscore";

        $result = mysql_query ($sql) or die (mysql_error ());     
        
         while ($_POST = mysql_fetch_array ($result)){ 
            
           
         $Grade = $_POST[0];  
         }   
                 
             }   
//**** YOUR TASK:
//put code here to gwet grade if mark is below 40 ie fail
// hint copy and paste from line 93 to 106 and modify accordingly
//***** SOME MARKS FOR THIS****
     
//Inserting record details into databse table  
$SQL = "INSERT INTO enrollment (RegNo,CourseCode,Semester,Score,Grade) VALUES ('$RegNo','$CourseCode','$Semester',$Score,'$Grade')";

$result = mysql_query($SQL);

 mysql_close($link);

}                                                                                                                                                        
}    
?>

</form>  