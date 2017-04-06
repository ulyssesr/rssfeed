<html>
<head>
  <title>RSS Feed</title>
<link href="https://fonts.googleapis.com/css?family=Marcellus" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="page">

   <!-- Display the links -->
   <?php include('feed.html');?>

   <?php
   // include SimplePie
   require_once('php/autoloader.php');

   // Create a new object called $feed
   $feed = new SimplePie();

   // Set the default to my blog's RSS at first run
   if ($_GET[feed] == "") { $_GET[feed]="http://uly5535.com"; }

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