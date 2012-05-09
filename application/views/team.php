<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# datrios: http://ogp.me/ns/fb/datrios#">
  <meta property="fb:app_id"      content="128609033918715" /> 
  <meta property="og:type"        content="datrios:team" /> 
  <meta property="og:url"         content="http://www.datrios.com/teams/<?php echo $team->id ?>" /> 
  <meta property="og:site_name"   content="Datrios"/>
  <meta property="og:title"       content="<?php echo $team->name ?>" /> 
  <meta property="og:description" content="<?php echo $team->description ?>" /> 
  <meta property="og:image"       content="<?php echo $team->picture ?>" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo $team->name ?></title>
</head>
<body>
	<div style="text-align:center">
		<h1><?php echo $team->name ?></h1>
		<img src="<?php echo $team->picture ?>" />
		<p><?php echo $team->description ?></p>
		<div class="fb-like" data-href="http://www.datrios.com/teams/<?php echo $team->id ?>" data-send="true" data-width="450" data-show-faces="true"></div>
<div style="clear:both;"></div>
		<div class="fb-comments" data-href="http://www.datrios.com/teams/<?php echo $team->id ?>" data-num-posts="5" data-width="470"></div>
	</div>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=128609033918715";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
</body>