<body bgcolor="#daf7a6">
<form action="ShowCandidateDetails.php" method="post">    
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
  </form>
   </body>
 <?php 
include "DBconnect.php";         
 
$searchname=$_POST['txtsearch'];

if (isset($_POST['EditRecord'])) {

  
    //mapping inputs to variables
    $RegNo = $_POST['txtRegNo'];
    $FirstName = $_POST['txtFirstName'];
    $OtherNames = $_POST['txtOtherName'];
    $PhoneNo = $_POST['txtPhoneNo'];
    $Email = $_POST['txtEmail'];
    $Gender = $_POST['gender'];
    $Age = $_POST['txtAge'];
    
$sql = "UPDATE candidate Set FirstName = '$FirstName',OtherNames = '$OtherNames',PhoneNo = '$PhoneNo',Email = '$Email',Gender = '$Gender',Age = '$Age' where RegNo = '$RegNo'";
$dbresult=mysql_query($sql);  
echo'Record Successfully Edited';
return false;
    
 }           
            if($searchname =='')
            {
                
            return false;
            }

              
            $sql="SELECT * from candidate where RegNo LIKE '%$searchname%'";
 
        $result = mysql_query ($sql) or die (mysql_error ());
        
         while ($_POST = mysql_fetch_array ($result)){ 
           
         $RegNo = $_POST[0];
         $FirstName = $_POST[1];
         $OtherNames = $_POST[2];
         $PhoneNo = $_POST[3];
         $Email = $_POST[4];
         $Gender = $_POST[5];
         $Age = $_POST[6];
  
         }
          
           ?>
           <form action="ShowCandidateDetails.php" method="post">
                           
         <table width="50%" cellpadding="6" cellspacing="5" border="1">
  <tr ><thead align="center" style="color: Brown;"><h2>EDIT CANDIDATE DETAILS</h2> </thead>
  </tr>
  
  <tr> 
 <td>Registration Number:</td>
<td><INPUT TYPE = Text NAME  = txtRegNo SIZE = 40   value =<?PHP echo $RegNo; ?>></td>
</tr>
 <tr>
  <td>First Name:</td>
  <td> <INPUT TYPE = Text NAME = txtFirstName SIZE = 40 value =<?PHP echo $FirstName; ?>></td>
 </tr>
 <tr>
  <td>Other Names:</td>
  <td> <INPUT TYPE = Text NAME = txtOtherName SIZE = 40 value =<?PHP echo $OtherNames; ?>></td>
 </tr>
 <tr>
  <td>Phone Number:</td>
  <td> <INPUT TYPE = Text NAME = txtPhoneNo SIZE = 40 value =<?PHP echo $PhoneNo; ?>></td>
 </tr>
 <tr>
  <td>Email:</td>
  <td> <INPUT TYPE = Text NAME = txtEmail SIZE = 40 value =<?PHP echo $Email; ?>></td>
 </tr>
 <tr>
  <td>Age:</td>
  <td> <INPUT TYPE = Text NAME = txtAge SIZE = 40 value =<?PHP echo $Age; ?>></td>
   </tr>
    <tr>
    <td>Gender:</td> 
    
  <td><input type="text" name= "Password" value= "<?php echo $Gender; ?>" size=40>
  
</td>
 </tr>
 <tr>
    <td colspan="2" align="center"><input type="submit" name= "EditRecord" value="Update"></td>
 </tr>
 
</table>

 </form> 



