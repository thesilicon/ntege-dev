<html>
<head><title>Register Candidate</title></head>
<body bgcolor="#b2b2b2">
<form action="CandidateDetails.php"method="post">
<table width="50%" cellpadding="6" cellspacing="5" border="1">
<tr><thead align="center" style="color:red;"><h2>CANDIDATE DETAILS</h2>
</thead> </tr>
<tr> <td>Registration Number:</td>
<td><INPUT TYPE =Text NAME = txtRegNo SIZE = 40 value =<?PHP $RegNo;?>></td>
</tr>
<tr><td>First Name:</td> <td> <INPUT TYPE = =Text NAME = txtFirstName SIZE = 40 value =<?PHP $FirstName;?>></td>
</tr>
 <tr><td>Other Names:</td> <td> <INPUT TYPE =Text NAME = txtOtherNames SIZE = 40 value =<?PHP $OtherNames;?>></td>
 </tr>
 <tr><td>Phone Number:</td>
 <td><INPUT TYPE= Text NAME = txtPhoneNo SIZE = 40 value =<?PHP $PhoneNo;?>></td>
 </tr>
 <tr><td>Email:</td>
 <td><INPUT TYPE =Text NAME = txtEmail SIZE = 40 value =<?PHP $Email;?>></td>
 </tr>
 <tr><td>Age:</td>
 <td><INPUT TYPE =Text NAME =txtAge SIZE =40 value =<?PHP $Age;?>></td>
 </tr>
 <tr><td>Gender:</td>
 <td><Input Type= 'Radio' Name ='gender' value= 'M'<?PHP print $male;?>>Male
 <Input Type= 'Radio' Name ='gender' value= 'F'<?PHP print $female;?>>Female
 </td>
 </tr>
</table>
<P>
<INPUT TYPE = Submit Name = SaveCandidate VALUE = "Save Candidate Details">
</P>
</form>
</body>





<?php
  include "DBconnect.php";
  if($db_found){
      
       //evaluating the checked radio button
      If(isset($_POST['SaveCandidate']))
      {
          $male='unchecked';
          $female='uncheked';
          
          If(isset($_POST['SaveCandidate']))
          {     
              $Gender=$_POST['gender'];
              if($Gender='M')
              {
                  $male='checked';
              }
          else if($Gender='F')
          {
              $female='checked';
          }    
      }
      //mapping inputs to variables 
      $RegNo=$_POST['txtRegNo'];
      $FirstName=$_POST['txtFirstName'];
      $OtherNames=$_POST['txtOtherNames'];
      $PhoneNo=$_POST['txtPhoneNo'];
      $Email=$_POST['txtEmail'];
      $Gender=$_POST['gender'];
      $Age=$_POST['txtAge'];
      
      //inserting record details into database table
      
      $SQL = "INSERT INTO candidate(RegNo,FirstName,OtherNames,PhoneNo,Email,Gender,Age)
      VALUES('$RegNo','$FirstName','$OtherNames','$PhoneNo','$Email','$Gender',$Age)";
      $result = mysql_query($SQL);
      mysql_close($link);
  }
 
  }
 

?>
</html>
