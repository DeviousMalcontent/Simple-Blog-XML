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
<!-- <h2><a id="Blog"><img src="images/articles_icon.png" alt="Blog" width="32" height="32">&nbsp;Blog</a>&nbsp;<a href="Blog.xml" target="_blank"><img src="images/rss.png" alt="RSS" width="16" height="16"></a></h2> -->
<h2><a id="Blog"><img src="images/articles_icon.png" alt="Blog" width="32" height="32">&nbsp;</a>&nbsp;<a href="blog.xml" target="_blank"><img src="images/rss.png" alt="RSS" width="16" height="16"></a></h2>
<ul class="margin">
<?php
$rssfh = fopen("blog.xml", 'w') or die("<!-- can't open RSS file -->");
fwrite($rssfh, "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n");
fwrite($rssfh, "<rss version=\"2.0\">\r\n\r\n<channel>\r\n");
//fwrite($rssfh, "  <title>" . $websitename . " : " . $rsspagesubtitle . "</title>\r\n");
fwrite($rssfh, "  <title>Simple-Blog-XML : My Blog</title>\r\n");
fwrite($rssfh, "  <link>blogindex.php</link>\r\n");
fwrite($rssfh, "  <description>Simple-Blog-XML : My Blog</description>\r\n");
//fwrite($rssfh, "  <description>" . $websitename . " : " . $rsspagesubtitle . "</description>\r\n");
if ($handle = opendir('blog/')) {
	while (false !== ($entry = readdir($handle))) {
		$array[] = $entry;
	}
	sort($array, SORT_NUMERIC);
	$reverse = array_reverse($array);
	foreach ($reverse as $entry){
		if ($entry != "." && $entry != "..") {
			$lines = file('blog/' . $entry);
			$lines[2] = str_replace("<title>", '', $lines[2]);
			$lines[2] = str_replace("</title>", '', $lines[2]);
			$lines[2] = str_replace("\r\n", '', $lines[2]);
			$lines[2] = str_replace("	", '', $lines[2]);
			$lines[3] = str_replace("<date>", '', $lines[3]);
			$lines[3] = str_replace("</date>", '', $lines[3]);
			$lines[3] = str_replace("\r\n", '', $lines[3]);
			$lines[3] = str_replace("	", '', $lines[3]);
			$link = str_replace(".xml", '', $entry);
			fwrite($rssfh, "	<item>\r\n	<title>" . $lines[2] . "</title>\r\n	<link>permalink.php?ReadPost=" . $link . "</link>\r\n	<description>" . $lines[3] . "</description>\r\n  </item>\r\n");
			echo '<li class="margin"><a href="permalink.php?ReadPost=' . $link . '">' . $lines[3] . ' : ' . $lines[2] . '</a></li>' . "\r\n			";
		}
	}
	closedir($handle);
}
fwrite($rssfh, "</channel>\r\n\r\n");
fwrite($rssfh, "</rss>");
fclose($rssfh);
?></ul>
<hr>
<p><a href="index.php">Home</a> | <a href="blogindex.php">Blog Index</a> | <a href="blog.xml">RSS</a></p>
</div>
</div>

</body>
</html>
