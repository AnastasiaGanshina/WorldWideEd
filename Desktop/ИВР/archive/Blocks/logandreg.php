
<div class="log">
  <?php require_once "db.php"; ?>
  <? if( isset($_SESSION['logged_admin']) ) : ?>
	  <pih>YOU ADMIN</pih>, <?php echo $_SESSION['logged_admin']->login; ?>!
	<hr>
	<a href="/Page/for_admin/logoutadm.php"><pih><h3>Logout</h3></pih></a>
    <a href="/Page/for_admin/admin_panel.php"><pih3><h3>Admin panel</h3></pih3></a>
   <? else : ?>
  <? if( isset($_SESSION['logged_user']) ) : ?>
	  <pih>Hello</pih>, <?php echo $_SESSION['logged_user']->login; ?>!
	<hr>
	<a href="../Page/Login/logout.php"><pih><h3>Logout</h3></pih></a>
  <? else : ?>
	<a href="/../Page/Login/Login.php"><h2><pih>Login</pih></h2></a>
	<a href="/../Page/Login/Registration.php"><h2><pih>Registration</pih></h2></a>
  <? endif; ?>
  <? endif; ?>
</div>





