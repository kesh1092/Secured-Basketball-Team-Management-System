<?php 
if(isset($_GET['badID'])) 
   echo 'LoginID used already. Use a new ID'; 
?>


<html>
<head>
   <title>Add New Manager</title>
</head>

<body>


   <h2>Add New Manager</h2>
   <form action="index.php" method="get">
      <input type="submit" value="Home"/>
      <!-- <input type="text" name="test 1" value="testVA"/> -->
   </form>


   <form action="add_manager_functions.php" method="get">
      <fieldset>

         <p>
            <label>LoginID</label>
            <input type="text" name="LoginID" value="" maxlength="16" required/>
            <i>(4-16 characters)</i>
         </p>

         <p>
            <label>Password</label>
            <input type="password" name="Password" value="" maxlength="8" required/>
            <i>(4-8 characters)</i>
         </p>

         <p>
            <label>Name</label>
            <input type="text" name="Name" value="" maxlength="64" required/>
            <i>(4-64 characters)</i>
         </p>

         <p>
            <label>Birthday</label>
            <input type="date" name="Birthday" value="" required/>
            <i>(enter date in YYYY-MM-DD form if typing manually)</i>
         </p>

         <p>
            <label>Address</label>
            <input type="text" name="Address" value="" maxlength="128" required/>
            <i>(4-128 characters)</i>
         </p>

         <p>
            <label>Email</label>
            <input type="text" name="Email" value="" maxlength="32" required/>
            <i>(4-32 characters)</i>
         </p>

         <p>
            <label>Phone Number</label>
            <input type="text" name="PhoneNumber" value="" minlength="10" maxlength="10" required/>
            <i>(10 characters)</i>
         </p>
         
         <p> 
            <input type="submit" value="Add Manager" />
         </p>
      </fieldset>

   </form>


</body>
</html>