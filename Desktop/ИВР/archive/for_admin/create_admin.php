
  <link rel = "stylesheet" href = "../CSSstyle.css">
  <meta charset="utf-8">

<?php include_once "../Blocks/header.php" ?>

<?php include_once "../Blocks/logandreg.php" ?> 

<?php include_once "../Blocks/left.php" ?> 

<div class= "Main" >
  
  <form action="create_admin.php" method="post">
   <p><strong>Login</strong></p>
	  <input type="text" name="Login" value="<?php echo @$data['Login'];?>">
	</p> 
  </form>
  
</div>