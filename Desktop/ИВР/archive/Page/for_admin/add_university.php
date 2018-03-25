<!doctype html>
<html>

  <link rel = "stylesheet" href = "../../CSSstyle.css">
  <meta charset="utf-8">

<?php include_once "../../Blocks/header.php" ?>

<?php include_once "../../Blocks/logandreg.php" ?> 

<?php include_once "../../Blocks/left.php" ?> 

<? if( isset($_SESSION['logged_admin']) ) : 
	 ?>
   <? else : header('Refresh: 1; url=../index.php'); ?>
  <? endif; ?>

<?php 
	$data = $_POST;
	if ( isset($data['add_un']) ):
	   $university = R::dispense('universities');
	   $university->name = $data['Names'];
	   $university->krt_sod = $data['krt_sod'];
	   $university->sod = $data['sod'];
	   $university->country = $data['country'];
	   $university->language = $data['language'];
	   R::store($university); 
		echo '<div style="color: white;">Success</div><hr>';
		header('Refresh: 1; url=add_university.php');
	   $result = mysql_query ("INSERT INTO table (Name,sod) VALUES ('Names','krt_sod')");
	 if ($result = 'true'){
      echo '<div style="color: white;">Информация занесена в базу данных</div><hr>';
       }else{
      echo '<div style="color: white;">Информация не занесена в базу данных</div><hr>';
}
	?>
	<? endif; ?>
 

   <script language="javascript" type="text/javascript" src="../../ckeditor/ckeditor.js"> 
	 </script>

<script language="javascript" type="text/javascript" src="../../AjexFileManager/ajex.js">
 </script>
  
<div class= "Main" > 
	  
   
<form name="krt_sod" action="../../for_admin/add_university.php" method="post">
  
   <p><strong>Name</strong></p>
	  <textarea type="text" id="Names" name="Names" cols="50" rows="1"><?php echo @$data['Name']; ?></textarea>
    <p>
    
   <p><strong>Country</strong></p>
	  <textarea type="text" id="country" name="country" cols="50" rows="1"><?php echo @$data['country']; ?></textarea>
    <p>
    
    <p><strong>language</strong></p>
	  <textarea type="text" id="language" name="language" cols="50" rows="1"><?php echo @$data['language']; ?></textarea>
    <p>
     
      <p>
    	<h2><strong>Краткое содержание</strong></h2>
  </p>
   
    <textarea type="text" id="krt_sod" name="krt_sod" cols="100" rows="20"><?php echo @$data['krt_sod']; ?></textarea>
     <script language="javascript" type="text/javascript">
       var krt_sod = CKEDITOR.replace( 'krt_sod' );
        AjexFileManager.init({
          returnTo: 'ckeditor',
          editor: krt_sod
         });
     </script>
     
	</p>
 
  <p>
   <h2><strong>Полное содержание</strong></h2>
  </p>
  
  <p>
   <textarea id="sod" name="sod" cols="100" rows="20"><?php echo $txt['sod'] ?></textarea>
   
    <script language="javascript" type="text/javascript">
     var sod = CKEDITOR.replace( 'sod' );
     AjexFileManager.init({
     returnTo: 'ckeditor',
     editor: sod
      });
     </script>
     
</p>

<p>
  <button type="submit" name="add_un">Добавить содержание</button>
 </p>
 
</form>
	
	
</div>


</html>