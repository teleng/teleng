<?php
   $BlogName = $_POST["blogname"];
   if (!isset($_POST["submit"]))
   {
?>
	<html>
	  <head>
	    <title>Create a blog</title>
	  </head>
	
	  <body>
	    <form method="post" action="<?php echo $PHP_SELF;?>">
	      New blog name: <input type="text" name="blogname" />
	      <input type="submit" value="Submit" name="submit" /><br />
	    </form>
<?
}
else
{
   $newblog_template = "templates/newblog_template.html";
   $blogs_dir = "/home/sonic/teleng/www/public_html/blogs/";

   $ReplsData = array($BlogName);
   $ReplsOrig = array("{BlogName}");

   $fil_contents = file_get_contents($newblog_template);
   $newblog_fil = str_replace($ReplsOrig, $ReplsData, $fil_contents);
   $write_blog_name = $BlogName.".html";
   $f = fopen($blogs_dir.$write_blog_name, "w");
   fwrite($f, $newblog_fil);
   echo $newblog_fil."<br />";
   fclose($f);

   echo "New blog created with name ".$BlogName."<br />";
   echo "<a href='blogs/".$write_blog_name."'>Click</a> to go to new blog.";
}
?>
