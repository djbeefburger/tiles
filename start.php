<?php
		session_start();	//print_r(scandir('img',1));
			require_once('src/php/config.inc.php');
	require_once('src/php/tiles.php');
	
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


<?php
	//die();
	
	$fns=scandir('img',1);
	foreach($fns as $fn){
		$small_base=substr($fn, 0,strpos($fn,'_200x200.png'));
		$med_base=substr($fn, 0,strpos($fn,'_400x400.png'));
		$large_base=substr($fn, 0,strpos($fn,'_800x800.png'));
		if(!empty($small_base))$img_list[$small_base]['small']=$fn;
		if(!empty($med_base))$img_list[$med_base]['med']=$fn;
		if(!empty($large_base))$img_list[$large_base]['large']=$fn;
	}
	//echo"<pre>".print_r($img_list,true)."</pre>";
	$filename_bases=array_keys($img_list);
	$options="";
	foreach($filename_bases as $fnb)$options.= '<option '. (($_POST['image']==$fnb)?"selected ":"").'value="'.$fnb.'">'.$fnb."</option>\n";
	echo"
<form action=\"start.php\" method=\"post\">
  ID (leave blank unless editing an existing record):<br>
  <input type=\"text\" name=\"id\" value=\"\"><br>
  Title:<br>
  <input type=\"text\" name=\"title\" value=\"{$_POST['title']}\"><br>
  URL:<br>
  <input type=\"text\" name=\"url\" value=\"\"><br>
  Target(use _blank for external urls):<br>
  <input type=\"text\" name=\"target\" value=\"{$_POST['target']}\"><br>
  Tags(csv, no spaces):<br>
  <input type=\"text\" name=\"tags\" value=\"{$_POST['tags']}\"><br>
  Image:<br>
  <select name=\"image\">
	<option>null</option>
	{$options}
  </select><br>
	Message to the Server:<br>
	<input type=\"text\" name=\"message\" value=\"{$_POST['message']}\"><br>
	<br><input type=\"submit\" value=\"Submit\"></form>";
	//id
	//Title___
	//Image <>
	//Url
	//Target
	echo"<pre>".print_r($_POST,true)."</pre>";
	//die();

  $config['tiles']['token']=$_POST['message'];
  $tile_arr=$_POST;
  unset($tile_arr['message']);
  if(!empty($tile_arr['image'])){
	$tile_arr['image']=(array)$img_list[$tile_arr['image']];
  }
  if(empty($tile_arr['id']))unset($tile_arr['id']);
  $t=new Tiles($config['tiles']);
  if(!empty($tile_arr))  $t->writeTile($tile_arr);
  $tiles=$t->getTiles();
  foreach($tiles as $i=>$tile)$tiles[$i]['image']=(array)$tile['image'];
  echo"<pre>".print_r($tiles,true)."</pre>";
  $config['tile_size']='med';
  $config['tile_image_dir']='img';
  echo"<h1>Tiles</h1>";
  foreach($tiles as $tile){
	$tile['image']=(array)$tile['image'];
	echo $tile['id'];
	echo"
	
	<div class=\"tile\" id=\"{$tile['id']}\">
		<a href=\"{$tile['url']}\" target=\"{$tile['target']}\">
			<img src=\"{$config['tile_image_dir']}/{$tile['image'][$config['tile_size']]}\" alt=\"{$tile['title']}\">
		</a>
	</div>";
  }
  
  //echo"<pre>".print_r($tiles,true)."</pre>";
  
  


	
	
?>

    <h1>Hello, world!</h1>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
