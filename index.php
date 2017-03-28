<html>
<head>
  <title>RSS Feed</title>
<link href="https://fonts.googleapis.com/css?family=Marcellus" rel="stylesheet">
<style>
body { font-family: 'Marcellus', serif;}
#page { width: 60%; margin: 30px auto; padding: 20px; background-color: #e3e3e3; }
#feed a, a:active, a:hover, a:visited { color: #095695; }
#feed { margin-bottom: 15px;}
a, a:active { color: #095695;}
a:visited { color: #677c52;}
img { max-width: 400px; height: auto; margin-bottom: 10px; }
.header { margin: 40px 10px;}
.item { margin: 60px 10px; }
.item li { list-style-type: none;}
.rssform { margin: 5px 0;}
</style>
</head>
<body>
<div id="page">

   <!-- Display the links -->
   <div id="feed">
      <a href="rssfeed.php?feed=http://feeds.arstechnica.com/arstechnica/index">ARS Technica</a> | 
      <a href="rssfeed.php?feed=http://www.anandtech.com/rss/">Anand Tech</a> | 
      <a href="rssfeed.php?feed=http://www.cio.com/index.rss">CIO</a> | 
      <a href="rssfeed.php?feed=https://www.cnet.com/rss/all/">CNet</a> | 
      <a href="rssfeed.php?feed=http://www.computerworld.com/index.rss">Computer World</a> | 
      <a href="rssfeed.php?feed=http://www.digitaltrends.com/feed/">Digital Trends</a> | 
      <a href="rssfeed.php?feed=https://www.engadget.com/rss.xml">Engadget</a> | 
      <a href="rssfeed.php?feed=https://gigaom.com/feed/">GigaOm</a> | 
      <a href="rssfeed.php?feed=http://www.gizmodo.com/index.xml">Gizmodo</a> | 
      <a href="rssfeed.php?feed=http://www.huffingtonpost.com/feeds/verticals/technology/index.xml">Huffington Tech</a> | 
      <a href="rssfeed.php?feed=http://news.ycombinator.com/rss">Hacker News</a> | 
      <a href="rssfeed.php?feed=https://www.howtoforge.com/feed.rss">HowtoForge</a> | 
      <a href="rssfeed.php?feed=http://feeds.ign.com/ign/all">IGN</a> | 
      <a href="rssfeed.php?feed=http://www.informationweek.com/rss_simple.asp">Information Week</a> | 
      <a href="rssfeed.php?feed=http://feeds.feedburner.com/AmazonWebServicesBlog">Jeff Bar</a> | 
      <a href="rssfeed.php?feed=http://feeds.gawker.com/lifehacker/full">Lifehacker</a> | 
      <a href="rssfeed.php?feed=http://www.linuxtoday.com/biglt.rss">Linux Today</a> | 
      <a href="rssfeed.php?feed=https://www.technologyreview.com/stories.rss">MIT Tech Review</a> | 
      <a href="rssfeed.php?feed=http://www.pcgamer.com/rss/">PC Gamer</a> | 
      <a href="rssfeed.php?feed=http://pcworld.com/index.rss">PC World</a> | 
      <a href="rssfeed.php?feed=http://feeds.pcmag.com/Rss.aspx/SectionArticles?sectionId=1489">PC Mag</a> | 
      <a href="rssfeed.php?feed=http://sethgodin.typepad.com/seths_blog/atom.xml">Seth Godin</a> | 
      <a href="rssfeed.php?feed=https://www.slashgear.com/feed/">Slashgear</a> | 
      <a href="rssfeed.php?feed=http://rss.slashdot.org/Slashdot/slashdot">Slashdot</a> | 
      <a href="rssfeed.php?feed=http://feeds.feedburner.com/TechCrunch/">Tech Crunch</a> | 
      <a href="rssfeed.php?feed=https://www.techdirt.com/techdirt_rss.xml">Tech Dirt</a> | 
      <a href="rssfeed.php?feed=http://www.techrepublic.com/rssfeeds/articles/latest/">Tech Republic</a> | 
      <a href="rssfeed.php?feed=http://www.tecmint.com/feed/">Tech Mint</a> | 
      <a href="rssfeed.php?feed=http://blog.ted.com/feed/">Ted Blog</a> | 
      <a href="rssfeed.php?feed=https://thenextweb.com/feed/">TheNextWeb</a> | 
      <a href="rssfeed.php?feed=http://rss.escapistmagazine.com/news/0.xml">The Escapist</a> | 
      <a href="rssfeed.php?feed=http://www.theverge.com/rss/index.xml">The Verge</a> | 
      <a href="rssfeed.php?feed=http://feeds.feedburner.com/timeblogs/nerd_world">Time - Tech</a> | 
      <a href="rssfeed.php?feed=http://www.tomshardware.com/feeds/rss2/all.xml">Tom's Hardware</a> | 
      <a href="rssfeed.php?feed=https://www.wired.com/feed/">Wired</a> | 
      <a href="rssfeed.php?feed=http://www.wsj.com/xml/rss/3_7455.xml">WSJ Tech</a> | 
      <a href="rssfeed.php?feed=http://www.zdnet.com/news/rss.xml">ZDNet</a> | 
   </div>

   <?php

   // include SimplePie
   require_once('php/autoloader.php');

   // Create a new object called $feed
   $feed = new SimplePie();

   // Set the default to my blog's RSS at first run
   if ($_GET[feed] == "") { $_GET[feed]="http://uly.me/feed/"; }

   $feed->set_feed_url($_GET[feed]);

   // Run SimplePie.
   $feed->init();

   // Send the result to show up on the browser
   $feed->handle_content_type();
   ?>

   <form class="rssform">
     <input type="text" name="feed" size="40" placeholder="Enter RSS feed">
   </form>

   <!-- Display the header -->
   <div class="header">
     <h1><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title(); ?></a></h1>
     <p><?php echo $feed->get_description(); ?></p>
   </div>

   <?php foreach ($feed->get_items() as $item): // Display the feed inside a loop ?>
   <div class="item">
      <li><h4><a href="<?php echo $item->get_permalink(); ?>" target="_blank"><?php echo $item->get_title(); ?></a></h4></li>
      <p><?php echo $item->get_description(); ?></p>
      <p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
   </div>
   <?php endforeach; ?>
   
</div>
</body>
</html>