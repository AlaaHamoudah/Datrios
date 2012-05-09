<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# datrios: http://ogp.me/ns/fb/datrios#">
  <meta property="fb:app_id"      content="128609033918715" /> 
  <meta property="og:type"        content="datrios:match" /> 
  <meta property="og:url"         content="http://www.datrios.com/matches/<?php echo $match->id ?>" /> 
  <meta property="og:title"       content="<?php echo $team1->name ?> vs <?php echo $team2->name ?>" /> 
  <meta property="og:description" content="<?php echo $team1->name ?> vs <?php echo $team2->name ?> match" /> 
  <meta property="og:image"       content="http://mybetinfo.net/content/attachments/1352d1323529962-el-clasico.jpg" /> 
  <meta property="datrios:team"   content="http://www.datrios.com/teams/<?php echo $team1->id ?>" /> 
  <meta property="datrios:team"   content="http://www.datrios.com/teams/<?php echo $team2->id ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $team1->name.' vs. '.$team2->name ?></title>
<base href="<?php echo base_url() ?>" />
<link rel="stylesheet" href="css/pred.css" />
</head>

<body>
	<div class="logo">
</div>
<div class="blockShadow" id="predict">
	<div class="predictTi"><span class="topTitle">Recent predictions</span></div>
    <div class="team team1">
		<div class="fb-like" data-layout="box_count"  data-href="http://www.datrios.com/teams/<?php echo $team1->id ?>" data-send="false" data-width="50" data-show-faces="false"></div>
	    <img src="<?php echo $team1->picture ?>" width="60" height="60" />
        <span class="name"><?php echo $team1->name ?></span>
        <div class="Counter">
            <input type="text" id="firstCount" value="0" max="99" min="0" />
        </div>
    </div>
    <span class="spSpan">:</span>
    <div class="team team2">
		<div class="fb-like" data-layout="box_count"  data-href="http://www.datrios.com/teams/<?php echo $team2->id ?>" data-send="false" data-width="50" data-show-faces="false"></div>
		<img src="<?php echo $team2->picture ?>" width="60" height="60" />
			<span class="name"><?php echo $team2->name ?></span>
		<div class="Counter" >
				<input type="text" id="secondCount" value="0" max="99" min="0" />
        </div>
    </div>
    <a class="button" id="btn_predict" href="#">Predict</a>
</div><!--predict-->
<div class="blockShadow" id="prediction" >
	<div class="predPart" align="center">
        <div class="winsTT">
        	<img src="<?php echo $team1->picture ?>" width="29" height="29" />
            <span><?php echo $team1->name ?> wins</span>
        </div>
        <div class="Users">
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        </div>
    </div><!--predPart-->
	<div class="predPart equal" align="center">
    	<span class="title">Recent predictions</span>
    	<span class="sayth">Equalizer</span>
        <div class="Users">
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        </div>
    </div><!--predPart-->
	<div class="predPart last" align="center">
        <div class="winsTT">
        	<img src="<?php echo $team2->picture ?>" width="29" height="29" />
            <span><?php echo $team2->name?> wins</span>
        </div>
        <div class="Users">
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        	<img src="https://graph.facebook.com/moh97/picture" width="30" height="30" />
        </div>
    </div><!--predPart-->
<div class="fb-comments" data-href="http://www.datrios.com/matches/<?php echo $match->id ?>" data-num-posts="5" data-width="600"></div>
</div><!--prediction-->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/counter-jquery.js"></script>
<script language="javascript">
	$(".Counter input").counter();
	var baseuri="localhost/index.php/"
	$("#btn_predict").click(function(){
		firstCount = $("#firstCount").val();
		secondCount = $("#secondCount").val();
		$.ajax({url:baseuri+"predictions/addPredict/matchId/userId/"+firstCount+"/"+secondCount,type:"get"});
	});
	
</script>
<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=128609033918715";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>