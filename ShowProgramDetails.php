 <body bgcolor="#daf7a6">
<form action="ShowProgramDetails.php" method="post">    
<table align="right" bgcolor="#A2FB5A" cellpadding="5" cellspacing="5">
    <tr>  
    <td> <label>Enter program code  to search:</label>
    </td>
    <td>
       <input name="txtsearch" type="text" size="25" maxlength="200" align="right"/>    
    </td>
<td><input name="SearchProgram" type="submit" value="Search" />  
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
      $ProgramCode = $_POST['txtProgramCode'];
      $Description = $_POST['txtDescription'];
      $Depertment = $_POST['txtDepertment']; 
      $Prefix=$_POST['txtPrefix'];
    
$sql = "UPDATE program Set Description = '$Description',Depertment = '$Depertment',Prefix = '$Prefix' WHERE ProgramCode = '$ProgramCode'";
$dbresult=mysql_query($sql);  
echo'Record Successfully Edited';
return false;
    
 }           
            if($searchname =='')
            {
                
            return false;
            }

              
            $sql="SELECT * from program where ProgramCode LIKE '%$searchname%'";
 
        $result = mysql_query ($sql) or die (mysql_error ());
        
         while ($_POST = mysql_fetch_array ($result)){ 
           
         $ProgramCode = $_POST[0];
         $Description = $_POST[1];
         $Depertment = $_POST[2];
         $Prefix = $_POST[3];
        
  
         }
          
           ?>
           <form action="ShowProgramDetails.php" method="post">
                           
         <table width="50%" cellpadding="6" cellspacing="5" border="1">
  <tr ><thead align="center" style="color: Brown;"><h2>EDIT PROGRAM</h2> </thead>
  </tr>
  
  <tr> 
 <td>Program Code:</td>
<td><INPUT TYPE = Text NAME  = txtProgramCode SIZE = 40   value =<?PHP echo $ProgramCode; ?>></td>
</tr>
 <tr>
  <td>Description:</td>
  <td> <INPUT TYPE = Text NAME = txtDescription SIZE = 40 value =<?PHP echo $Description; ?>></td>
 </tr>
 <tr>
  <td>Depertment:</td>
  <td> <INPUT TYPE = Text NAME = txtDepertment SIZE = 40 value =<?PHP echo $Depertment; ?>></td>
 </tr>
  <tr> 
 <td>Prefix:</td>
<td><INPUT TYPE = Text NAME  = txtPrefix SIZE = 40   value =<?PHP echo $Prefix; ?>></td>
</tr>
 <tr>
    <td colspan="2" align="center"><input type="submit" name= "EditRecord" value="Update"></td>
 </tr>
 
 
</table>

 </form> 
 
           

