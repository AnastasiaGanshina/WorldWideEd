<!doctype html>
<html>

<head>
<link rel = "stylesheet" href = "../../CSSstyle.css">
<meta charset="utf-8">
</head>

<?php include_once "../../Blocks/header.php" ?>
<?php include_once "../../Blocks/logandreg.php" ?> 
<?php include_once "../../Blocks/left.php" ?>

<?php 
	$data = $_POST;
	if ( isset($data['do_registration']) )
	{
		//Здесь регистрируем
	  $errors = array();
	if( trim($data['login'])=='')
	  {
		 $errors[]='Login'; 
	  }
		
	if( trim($data['email'])=='')
	  {
		 $errors[]='Email address'; 
	  }
	if( $data['password']=='')
	  {
		 $errors[]='Password'; 
	  }  
	if( $data['password_2']!=$data['password'])
	  {
		 $errors[]='Password is incorrect'; 
	  }
	if( R::count('users', "login = ?", array($data['login'])) > 0 )
	  {
		 $errors[]='Choose another login'; 
	  }
	if( R::count('users', "email = ?", array($data['email'])) > 0 )
	  {
		 $errors[]='Email is not available'; 
	  }
		
	if( empty($errors))
	{
	   $user = R::dispense('users');
	   $user->login = $data['login'];
	   $user->email = $data['email'];
	   $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
	   $user->join_date = $rdate = date("d-m-Y в H:i");
	   $user->priv = 'user';
	   R::store($user); 
		echo '<div style="color: white;">Success</div><hr>';
		header('Refresh: 1; url=Login.php');
	} else
	{
		echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	}
	}
	
	
	?>

<div class="Main">
    <form action="Registration.php" method="post">
     <p>
	  <p><strong>Login</strong></p>
	  <input type="text" name="login" value="<?php echo @$data['login'];?>">
	</p> 
    <p>
	  <p><strong>Email address</strong></p>
	  <input type="email" name="email" value="<?php echo @$data['email'];?>">
	</p> 
    <p>
	  <p><strong>Password</strong></p>
	  <input type="password" name="password" value="<?php echo @$data['password'];?>">
	</p> 
    <p>
	  <p><strong>Password</strong></p>
	  <input type="password" name="password_2" value="<?php echo @$data['password_2'];?>">
	</p> 
	<p>
		<button type="submit" name="do_registration">Create an account</button>
	</p>
	
	</form> 
	
<?php include_once "../../Blocks/footer.php"?> 
</div>




</html>