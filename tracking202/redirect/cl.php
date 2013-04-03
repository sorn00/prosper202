<? include_once($_SERVER['DOCUMENT_ROOT'] . '/202-config/connect2.php'); 

//run script   
$mysql['click_id_public'] = mysql_real_escape_string($_GET['pci']);

$tracker_sql = "
	SELECT
		aff_campaign_name,
		site_url_address
	FROM
		202_clicks, 202_clicks_record, 202_clicks_site, 202_site_urls, 202_aff_campaigns
	WHERE
		202_clicks.aff_campaign_id = 202_aff_campaigns.aff_campaign_id
		AND 202_clicks.click_id = 202_clicks_record.click_id
		AND 202_clicks_record.click_id_public='".$mysql['click_id_public']."'
		AND 202_clicks_record.click_id = 202_clicks_site.click_id 
		AND 202_clicks_site.click_redirect_site_url_id = 202_site_urls.site_url_id
";
$tracker_row = memcache_mysql_fetch_assoc($tracker_sql);

if (!$tracker_row) {
	$action_site_url = "/202-404.php";
	$redirect_site_url = "/202-404.php";
} else {
	$action_site_url = "/tracking202/redirect/cl2.php";
	//modify the redirect site url to go through another cloaked link
	$redirect_site_url = $tracker_row['site_url_address'];  
}

$html['aff_campaign_name'] = $tracker_row['aff_campaign_name']; 
?>

<html>
	<head>
		<title><? echo $html['aff_campaign_name']; ?></title>
		<meta name="robots" content="noindex,nofollow">
		<script>top.location.href='<? echo $redirect_site_url; ?>';</script>
       
	</head>
	<body>
		<div style="padding: 30px; text-align: center;">
			Page Stuck? <a href="<? echo $url; ?>">Click Here</a>.
		</div>
	</body> 
</html> 