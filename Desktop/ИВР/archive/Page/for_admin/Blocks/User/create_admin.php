
  <link rel = "stylesheet" href = "../../../../CSSstyle.css">
  <meta charset="utf-8">

<?php include_once "../../../../Blocks/header.php" ?>

<?php include_once "../../../../Blocks/logandreg.php" ?> 

<?php include_once "../../../../Blocks/left.php" ?> 

<div class= "Main" >

<?php 
      $data = $_POST;
      if( isset($data['add_admin']))
	  {
		  $user = R::findOne('users', 'login = ?', array($data['Login']));
		  If( $user)
		  {
				  if( $user->priv == 'admin') 
				  {
					$user->priv = 'user';  
					  R::store($user); 
				  } else
				  {
					$user->priv = 'admin';
					  R::store($user); 
				  }
		  }
	  } else
	  {}

?>
  
  <form action="create_admin.php" method="post">
   <p><strong>Login</strong></p>
	  <input type="text" name="Login" value="<?php echo @$data['Login'];?>">
	</p> 
	<p> <button type="submit" name="add_admin">Добавить админа</button> </p>
  </form>
  
</div>
