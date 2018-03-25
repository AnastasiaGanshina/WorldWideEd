
<link rel = "stylesheet" href = "../../CSSstyle.css">
<meta charset="utf-8">

<?php include "../../Blocks/header.php" ?>
<?php include_once "../../Blocks/logandreg.php" ?> 
<?php include "../../Blocks/left.php" ?>

<?php 
      $data = $_POST;
      if( isset($data['do_login']))
	  {
		  $errors = array();
		  $user = R::findOne('users', 'login = ?', array($data['login']));
		  If( $user)
		  {
			  //Проверяем пароль
			  if( password_verify($data['password'], $user->password))
			  {
				  if( $user->priv == 'admin') //проверка на админа
				  {
					$_SESSION['logged_admin'] = $user;
				    echo '<div style= "color: Black;">Вы Админ!!!<br/></div><hr>';
				    header('Refresh: 1; url=/');  
				  } else
				  {
					  //Всё хорошо, пускаем пользователя
				  $_SESSION['logged_user'] = $user;
				  echo '<div style= "color: Black;">Вы авторизованы!<br/></div><hr>';
				  header('Refresh: 1; url=/');
				  }
					  
				  
			  } else
			  {
				$errors[] = 'Пароль не верен';  
			  }
		  } else
		  {
			 $errors[] = 'Пользователь с таким логином не существует!';
		  }
		  
		if( ! empty($errors))
	{
	   echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	} 
		 
	  }
?>

<div class="Main">
  
<form action="Login.php" method="POST">
 <p> 
	<p><strong>Login</strong>:</p>
	<input type="text" name="login" value="<?php echo @$data['login'];?>">
 </p>
 
 <p>
	<p><strong>Password</strong>:</p>
	<input type="password" name="password" value="<?php echo @$data['password'];?>">
</p>
 
 <p>
	 <button type="submit" name="do_login">Login</button>
</p>

</form>
</div>


<?php include_once "../../Blocks/footer.php" ?>