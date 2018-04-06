
<head>
<!-- Using cascading style sheet (css) to format tables. You will see a CLASS attribute in the table tag -->
<style type="text/css">
.myTable { background-color:#c1dbfc;border-collapse :collapse;color:#000;font-size:18px; }
.myTable th { background-color:#0090ec;color:white;width:30%; }
.myTable td, .myOtherTable th { padding:2px;border:0; }
.myTable td { border-bottom:1px dotted #7B68EE; }
</style>
  </head>
<!-- End Styles -->
 <body bgcolor="003974">

<form action="Transcript.php" method="post">    
<table align="right" bgcolor="#A2FB5A" cellpadding="5" cellspacing="5">
    <tr>  
    <td> <label>Enter candidate Registration number to search:</label>
    </td>
    <td>
       <input name="txtsearch" type="text" size="25" maxlength="200" align="right"/>    
    </td>
<td><input name="SearchCandidate" type="submit" value="Search" />  
       </td>            
    </tr>

</table> 
<br>
<br>
<br>
<br>
  </form>
   </body>
 <?php 
include "DBconnect.php";         
 
$searchname=$_POST['txtsearch']; 
            if($searchname =='')
            {
                
            return false;
            }             
            $sql="SELECT * from candidate where RegNo = '$searchname'";
 
        $result = mysql_query ($sql) or die (mysql_error ());
        
         while ($_POST = mysql_fetch_array ($result)){ 
           
         $RegNo = $_POST[0];
         $FirstName = $_POST[1];
         $OtherNames = $_POST[2];
          $FullNames = $FirstName." ".$OtherNames;
          
  print' <table class="myTable" align=center width=100%>'; 

print"<th colspan=4><h2>ACADEMIC TRANSCRIPT</h2></th>";   
print '<tr align=center>';
print '<td>'.'Registration Number:'.'</td>';
print '<td align=left>'.$RegNo.'</td>';  
print '<td align=left>'.'Full Names:'.'</td>';  
print '<td align=left>'.$FullNames.'</td>';  
 
 
print '</tr>';  
print '</table>';    
  print'<hr style="color: orange;">';               
         }        
$SQL = "SELECT `Enrollment`.`RegNo`, `Candidate`.`FirstName`, `Enrollment`.`CourseCode`, `Course`.`Description`,`Enrollment`.`Grade`, `Enrollment`.`Semester`
FROM Course INNER JOIN (Candidate INNER JOIN Enrollment ON `Candidate`.`RegNo` = `Enrollment`.`RegNo`) ON `Course`.`CourseCode` = `Enrollment`.`CourseCode` WHERE `Enrollment`.`RegNo`='$RegNo' ";   

   $result = mysql_query($SQL);
print' <table class="myTable" align=center>'; 

print"<th>Course Code</th><th align=left> Description</th><th> Grade</th>";   

while ( $db_field = mysql_fetch_assoc($result) ) {

print '<tr align=center>';
print '<td>'.$db_field['CourseCode'].'</td>';
print '<td align=left>'.$db_field['Description'].'</td>';  
 print '<td align=center>'.$db_field['Grade'].'</td>';  
print '</tr>'; 
}   
print '</table>';    
         ?>
          
           
           
           