<!DOCTYPE html>
<!-- 
Legal Notice
This Websites design code and contents, Copyright(c) 2008-2010 Mark Albanese - All rights reserved.

Reproduction of any material on this site without permission is prohibited and may result in legal ramification. 
Please contact the webmaster by E-mail at deviousmalcon-t@users.sourceforge.net for more information and permission.

This Websites design code and contents, Copyright (c) 2008-2010 Mark Albanese - All rights reserved. 
-->
<html>
<head>
<link rel="icon" type="image/png" href="images/etc_icon.png" />
<title>Simple-Blog-XML</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div style="text-align: center;">
<h1>My Blog</h1>
</div>
<div class="content">
<h2><a id="Blog"><img src="images/articles_icon.png" alt="Blog" width="32" height="32">&nbsp;Blog</a>&nbsp;<a href="Blog.xml" target="_blank"><img src="images/rss.png" alt="RSS" width="16" height="16"></a></h2>
<div id="BlogPost">
<h3><span id="title">&nbsp;</span></h3>
<h4><span id="date">&nbsp;</span></h4>
<span id="contents"></span>
</div>
<script type="text/javascript" src="js/blog.js"></script>
<script>
<?php 
	$i = -1; 
	$dir = 'blog/';
	if ($handle = opendir($dir)) {
		while (($file = readdir($handle)) !== false){
			if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
				$i++;
		}
	}
	echo "var MaxPosts = '$i';\r\n";
?>
var CurrentPost = <?php echo $_GET["ReadPost"]; ?>;
ReadPost(CurrentPost);
</script>
<hr>
<p><a href="#" onclick="Permalink()">Permalink</a> | <a href="blogindex.php">Blog Index</a> | <a href="blog.xml">RSS</a></p>
<p><button type="button" onclick="NextPost()">Next</button><button type="button" onclick="PerviousPost()">Pervious</button></p>
</div>
</div>

</body>
</html>
