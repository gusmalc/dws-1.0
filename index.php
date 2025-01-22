<?php 
// dws 1.0
require_once 'dws/dws-config/app.php';
require_once 'dws/dws-config/routes.php';

global $dws_nonce;
$strong = false;
$dws_nonce = base64_encode(openssl_random_pseudo_bytes(46, $strong));
if (!$strong) {
    die("Error: Los datos generados no son criptográficamente seguros.");
}

header("Content-Security-Policy: script-src 'nonce-$dws_nonce' 'strict-dynamic' ; object-src 'none'; base-uri 'none'; ");

session_set_cookie_params(['SameSite' => 'None', 'Secure' => true]);
session_start();

date_default_timezone_set($GLOBALS['dwsconfig']['timezone']);

$dws_request_uri = explode("?",$_SERVER['REQUEST_URI']);

if($GLOBALS['dwsconfig']['site-folder']==""){
    $dws_uri = $dws_request_uri[0]; 
}else{
    $dws_uri = str_replace($GLOBALS['dwsconfig']['site-folder'],"", $dws_request_uri[0]);
}
$dws_uri = substr($dws_uri, 1);
if($dws_uri == ""){
    $dws_page_code = "home";
    $arr_uri = [];
}else{
    $arr_uri = explode("/",$dws_uri);
    if (isset($dwsroutes[$arr_uri[0]])) {
        $dws_page_code = $arr_uri[0];
    }else{
        $dws_page_code = "err404";
    }    
}

//echo $dwsroutes[$dws_route]['code'];

require_once 'dws/dws-app/main.php';

?>