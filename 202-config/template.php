<?  function template_top($title = 'Prosper202 Self Hosted Apps') { global $navigation; global $version;  ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>

<title><? echo $title; ?></title>
<meta name="description" content="description" />
<meta name="keywords" content="keywords"/>
<meta name="copyright" content="Prosper202, Inc" />
<meta name="author" content="Prosper202, Inc" />
<meta name="MSSmartTagsPreventParsing" content="TRUE"/>

<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="imagetoolbar" content="no"/>
  
<link rel="shortcut icon" href="/202-img/favicon.gif" type="image/ico"/> 
<link href="/202-css/account.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="/tracking202/js/prototype.js"></script>
		
<? switch ($navigation[1]) { 
	
	case "tracking202": 
	case "stats202":
	case "alerts202": 
	case "offers202":
		?><link href="/202-css/tracking202.css" rel="stylesheet" type="text/css"/>
		<link href="/202-css/reporting.css" rel="stylesheet" type="text/css"/>
		<link href="/202-css/scal.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="/tracking202/js/tracking202scripts.js"></script>  
		<script type="text/javascript" src="/tracking202/js/call_prefs.js"></script>  
		<script type="text/javascript" src="/tracking202/js/scriptaculous/scriptaculous.js"></script>
		<script type="text/javascript" src="/tracking202/js/scal.js"></script>
		<script type="text/javascript" src="/stats202/js/stats202.js"></script>
		<link href="/202-css/offers202.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="/offers202/js/offers202.js"></script>
		<link href="/202-css/offers202.css" rel="stylesheet" type="text/css"/><?
		break;
case "202-account":
	?><script type="text/javascript" src="/202-js/account.js"></script><?php 
	break;
} 
//include(TRACKING202_ADS_URL.'/adserver/init.php'); ?>



</head>
<body>


<div class="body">


	<div class="body-content">
	
	<table class="header" cellspacing="0" cellpadding="0">
		<tr>
			<td class="shrink-width">
				<!-- this is the prosper202 top-left logo/banner placement -->
				<script type="text/javascript" charset="utf-8">
					var is_ssl = ("https:" == document.location.protocol);
					var asset_url = is_ssl ? "https://ads.tracking202.com/prosper202-topleft/" : "<?php echo TRACKING202_ADS_URL; ?>/prosper202-topleft/";
					//document.write(unescape("%3Ciframe%20class%3D%22advertise-top-left%22%20src%3D%22"+asset_url+"%22%20scrolling%3D%22no%22%20frameborder%3D%220%22%3E%3C/iframe%3E"));
				</script>
			</td>
			<td>
				
				<div class="skyline">
		
					<div style="float: left; ">
						<a href="/tracking202/" <? if ($navigation[1] == 'tracking202') { echo 'class="bold";'; } ?>>Tracking202</a>  
						&middot;
						
						<?php /* 
						<a href="/stats202/" <? if ($navigation[1] == 'stats202') { echo 'class="bold";'; } ?>>Stats202</a>  
						&middot;
						<a href="/alerts202/" <? if ($navigation[1] == 'alerts202') { echo 'class="bold";'; } ?>>Alerts202eh</a>   
						&middot; */ ?> 
						
						<script type="text/javascript"> new Ajax.Updater('new_offers', '/202-account/ajax/new-offers.php'); </script>
					</div>
					
					<a href="/202-account/" <? if (($navigation[1] == '202-account') AND !$navigation[2]) { echo 'class="bold";'; } ?>>Home</a>  
					&middot;
					<a href="/202-account/account.php" <? if ($navigation[2] == 'account.php') { echo 'class="bold";'; } ?>>My Account</a>  
					&middot; 
					<a href="/202-account/administration.php" <? if ($navigation[2] == 'administration.php') { echo 'class="bold";'; } ?>>Administration</a>  
					&middot; 
					<a href="/202-account/help.php" <? if ($navigation[2] == 'help.php') { echo 'class="bold";'; } ?>>Help</a>  
					&middot;
					<a href="/202-account/signout.php">Sign Out</a>  
				</div>
				
				<div id=update_needed></div>
				<script type="text/javascript"> new Ajax.Updater('update_needed', '/202-account/ajax/update-needed.php'); </script>
			</td>
		</tr>
	</table>
	
	<div class="content"><? 
		
		if ($navigation[1] == 'tracking202') {  include_once($_SERVER['DOCUMENT_ROOT'] . '/tracking202/_config/top.php'); }
		
	} function template_bottom() { global $version;?></div>
	
	<div style="clear: both;"></div>
	<div class="footer">
		
		
		<? if ($_SESSION['update_needed'] == true) { ?>
		 	<strong>Your Prosper202 <? echo $version; ?> is out of date. <a href="http://prosper202.com/apps/download/">Please update</a>.</strong>
		 <? } else { ?>
		 	Your Prosper202 <? echo $version; ?> is up to date.
		 <? } ?>
		 
		 <!--<p style="margin-top: 10px;">Like our software? &nbsp; You'll love the <a href="http://revolution.tracking202.com" style="padding: 0px;">Revolution202 Partner Network</a>!</p>-->
		 
		 
	<table style="margin: 20px auto 0px; text-align: left;" cellspacing="0" cellpadding="0">
		
	</table>
		
	</div>



</div>

<!-- this is the prosper202 support widget -->
<script type="text/javascript" charset="utf-8">
	var is_ssl = ("https:" == document.location.protocol);
	var asset_url = is_ssl ? "https://s3.amazonaws.com/s3.tracking202.com/feedback/widget.js" : "http://cdn.tracking202.com/feedback/widget.js";
	document.write(unescape("%3Cscript src='" + asset_url + "' type='text/javascript'%3E%3C/script%3E"));
</script>

</body>


<? } ?>
