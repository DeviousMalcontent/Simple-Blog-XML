function ReadPost(PostNumber)
{
	if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
	else {xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	xmlhttp.open("GET","blog/"+PostNumber+".xml",false);
	xmlhttp.send();
	xmlDoc=xmlhttp.responseXML;
	document.getElementById("title").innerHTML=getNodeText(xmlDoc.getElementsByTagName("title").item(0));
	document.getElementById("date").innerHTML=getNodeText(xmlDoc.getElementsByTagName("date").item(0));
	document.getElementById("contents").innerHTML=MarkToMarkDown(getNodeText(xmlDoc.getElementsByTagName("contents").item(0)));
}

function MarkToMarkDown(input)
{
input=input.replace(/\]/gi,'>');
input=input.replace(/\[/gi,'<');

input=input.replaceAll('%26%2391%3B','&#91;');
input=input.replaceAll("%26%2393%3B","&#93;");

return input;
}

function getNodeText(xmlNode)
{
	if(!xmlNode) return '';
	if(typeof(xmlNode.textContent) != "undefined") return xmlNode.textContent;
	return xmlNode.firstChild.nodeValue;
}

function NextPost()
{
	if(CurrentPost==MaxPosts)
	{
		CurrentPost=0;
		ReadPost(CurrentPost);
	}
	else
	{
		CurrentPost=CurrentPost+1;
		ReadPost(CurrentPost);
	}
}
function PerviousPost()
{
	if(CurrentPost==0)
	{
		CurrentPost=MaxPosts;
		ReadPost(CurrentPost);
	}
	else
	{	
		CurrentPost=CurrentPost-1;
		ReadPost(CurrentPost);
	}
}
function Permalink()
{
	window.location="permalink.php?ReadPost="+CurrentPost;
}
function PerNextPost()
{
	if(CurrentPost==MaxPosts)
	{
		CurrentPost=0;
		window.location="permalink.php?ReadPost="+CurrentPost;
	}
	else
	{
		CurrentPost=CurrentPost+1;
		window.location="permalink.php?ReadPost="+CurrentPost;
	}
}
function PerPerviousPost()
{
	if(CurrentPost==0)
	{
		CurrentPost=MaxPosts;
		window.location="permalink.php?ReadPost="+CurrentPost;
	}
	else
	{	
		CurrentPost=CurrentPost-1;
		window.location="permalink.php?ReadPost="+CurrentPost;
	}
}