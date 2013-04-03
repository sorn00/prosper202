<?

class AUTH {


function logged_in() {

$session_time_passed = time() - $_SESSION['session_time'];

if ($_SESSION['user_name']
AND $_SESSION['user_id']
AND ($_SESSION['session_fingerprint'] == md5('session_fingerprint' . $_SERVER['HTTP_USER_AGENT'] . session_id()))
AND ($session_time_passed < 50000)) {

$_SESSION['session_time'] = time();
return true;

} else {

return false;

}
}

function require_user($auth_type='') {
if (AUTH::logged_in() == false) {
if($auth_type=="toolbar")
$_SESSION['toolbar'] = 'true';
//echo "what";
die(include_once($_SERVER['DOCUMENT_ROOT']. '/202-access-denied.php'));
}
AUTH::set_timezone($_SESSION['user_timezone']);
}

function require_valid_api_key() {

$user_api_key = $_SESSION['user_api_key'];
if (AUTH::is_valid_api_key($user_api_key) == false) {
header('location: /202-account/api-key-required.php'); die();
}
}

function require_valid_app_key($appName, $user_api_key, $user_app_key) {
if (AUTH::is_valid_app_key($appName, $user_api_key, $user_app_key) == false) {
header('location: /202-account/app-key-required.php'); die();
}
}


//this checks if this api key is valid
function is_valid_api_key($user_api_key) {
$url = TRACKING202_API_URL . "/auth/isValidApiKey?apiKey=$user_api_key";

//check the tracking202 api authentication server
$xml = getUrl($url);
$isValidApiKey = convertXmlIntoArray($xml);
$isValidApiKey = $isValidApiKey['isValidApiKey'];

//returns true or false if it is a valid key
if ($isValidApiKey['isValid'] == 'true') return true;
else return false;
}

//this checks if the application key is valid
function is_valid_app_key($appName, $user_api_key, $user_app_key) {
if($user_app_key!='') {
switch ($appName) {
case "stats202": // check to make sure this is a valid stats202 app key
$url = TRACKING202_API_URL . "/auth/isValidStats202AppKey?apiKey=$user_api_key&stats202AppKey=$user_app_key";
$xml = getUrl($url);
$isValidStats202AppKey = convertXmlIntoArray($xml);
$isValidStats202AppKey = $isValidStats202AppKey['isValidStats202AppKey'];

if ($isValidStats202AppKey['isValid'] == 'true') {
return true;
} else {
return false;
}
break;
}
}
return false;
}


function set_timezone($user_timezone) {

if (isset($_SESSION['user_timezone'])) {
$user_timezone = $_SESSION['user_timezone'];	
}

if ($user_timezone == '-12') { date_default_timezone_set('Kwajalein'); }
if ($user_timezone == '-11') { date_default_timezone_set('Pacific/Midway'); }
if ($user_timezone == '-10') { date_default_timezone_set('Pacific/Honolulu'); }
if ($user_timezone == '-9') { date_default_timezone_set('America/Anchorage'); }
if ($user_timezone == '-8') { date_default_timezone_set('America/Los_Angeles'); }
if ($user_timezone == '-7') { date_default_timezone_set('America/Denver'); }
if ($user_timezone == '-6') { date_default_timezone_set('America/Tegucigalpa'); }
if ($user_timezone == '-5') { date_default_timezone_set('America/New_York'); }
if ($user_timezone == '-4') { date_default_timezone_set('America/Halifax'); }
if ($user_timezone == '-3.5') { date_default_timezone_set('America/St_Johns'); }
if ($user_timezone == '-3') { date_default_timezone_set('America/Sao_Paulo'); }
if ($user_timezone == '-2') { date_default_timezone_set('Atlantic/South_Georgia'); }
if ($user_timezone == '0') { date_default_timezone_set('Europe/London'); }
if ($user_timezone == '1') { date_default_timezone_set('Europe/Paris'); }
if ($user_timezone == '2') { date_default_timezone_set('Asia/Istanbul'); }
if ($user_timezone == '3') { date_default_timezone_set('Asia/Kuwait'); }
if ($user_timezone == '3.5') { date_default_timezone_set('Asia/Tehran'); }
if ($user_timezone == '5.5') { date_default_timezone_set('Asia/Kolkata'); }
if ($user_timezone == '7') { date_default_timezone_set('Asia/Bangkok'); }
if ($user_timezone == '8') { date_default_timezone_set('Asia/Hong_Kong'); }
if ($user_timezone == '9') { date_default_timezone_set('Asia/Tokyo'); }
if ($user_timezone == '9.5') { date_default_timezone_set('Australia/Darwin'); }
if ($user_timezone == '10') { date_default_timezone_set('Australia/Sydney'); }
if ($user_timezone == '12') { date_default_timezone_set('Pacific/Auckland'); }

}


}