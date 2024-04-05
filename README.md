# Simple-Blog-XML
Web based blog system that uses XML files containing markdown for entries and generated blog index\navigation.

# Setup

## Windows
You'll need to set up some sort of HTTP server that runs PHP, I use XAMPP, copy all the files in the projects repository and place them in the root directory of your server, (usually htdocs folder), from here you can add any customizations as required, or start creating posts by editing the blog dot xml files (1.xml, 2.xml, 3.xml etc.) found in the blog directory.

## File structure
/blog - XML files go here.

/js - JavaScript files go here, blog.js is the only file.

/css - Cascading Style Sheets, style.css is the only file.

/images - Icon files used by SBX go here, generatored from the following repo: https://github.com/DeviousMalcontent/icons.


## FAQ

### Do you have an example of this product being used in a production environment?
Yes, right here: https://deviousmalcon-t.users.sourceforge.net/home/permalink.php?ReadPost=26

### Why use this over something like Wordpress?
When I started this project back in 2009, I first tried out an open-source PHP based framework, and it was too complicated, I also didn't find a page like: https://codex.wordpress.org/Integrating_WordPress_with_Your_Website, which I probably would have used had I found that page in a search result.
So, my answer is that you're welcome to use whatever framework you like, the primary reason for open sourcing the kludgy implementation that I made for my own personal website was the result of joining the IT society at my local university that required us to contribute to an open-source project.

### Have you heard of Hugo?
Yes, it was released back in 2013 and I started this project in 2009.

### What is blog.xml used for? 
It's a generated RSS feed file from the blogindex.php file, RSS feeds were a way of tracking website changes or receiving a notification when a new post was added to a site, they went out of style but should be making a return as the Internet becomes more and more awful.

### What JavaScript framework did you use?
None, it's completely vanilla.

### How do you use this product?
I write my posts in a word or text document, then when it's time to publish, I'll head to my blog folder and check the largest number, for example if the number is 83, the next post will be 84, so, I'll then make a file called 84.XML, then I'll copy the contents out of my post into that file.

If I have a post that's a little bit more elaborate I'll use a HTML template, I'll format the content correctly, and make sure that it is to my liking, before copying it over to the XML file, I then use notepad or notepad++, with a series of finding and replace commands, to escape the special characters, convert the content to markdown language, which involves replacing the less than and greater than signs with square brackets, so that it can be parsed as HTML when it is loaded on the server.

I'll Happily admit there are better ways to do this, but this process works for me.

### Do I need to use PHP? can I just use plain HTML?
In theory yes, you could host a website that uses this product on GitHub, rather than have the code run server side, you would need to write some sort of shell script, to update the MaxPosts value in the home page file (index.php), every time a post is added, you would still need to use JavaScript to traverse entries, but it should also be possible to create a variant of this product that does not require JavaScript at all.

## RoadMap / What features do you want to add?
- Tools to convert HTML files over to the XML format.
- Tools to Export the XML files out to PDF, TXT (Gopher) and plain HTML.
- Perhaps a website-based C.R.U.D system with simple IDE that allows a user to generate posts on the server, this would also require and authentication framework.


*These features will be plugins or add-ons, the goal is to keep this project really simple.
