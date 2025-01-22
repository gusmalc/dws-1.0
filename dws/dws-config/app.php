<?php 
global $dwsconfig;
$dwsconfig = array();

// configurar
$dwsconfig['site-domain'] = "http://localhost/";
$dwsconfig['site-folder'] = "dws/dws-1.0/";
$dwsconfig['lang']= "es";
$dwsconfig['minhtml']= false;
$dwsconfig['timezone']= "America/Argentina/Buenos_Aires";
$dwsconfig['minhtml'] = false;


// no cambiar
$dwsconfig['site-url'] = $dwsconfig['site-domain'].$dwsconfig['site-folder'];

function dws_site_url($p=""){
    $u = $GLOBALS['dwsconfig']['site-url'] . $p;
    return $u;
}

function dws_inc_section($p,$s){
    $u = "dws/dws-app/pages/$p/front/sections/$s.php";
    include $u;
}

function dws_add_js($p,$s){
    $u = "dws/dws-app/pages/$p/assets/js/$s.js";
    $n = $GLOBALS['dws_nonce'];
    echo "<script nonce='$n' src='$u'></script>";
}

function dws_add_css($p,$s){
    $u = "dws/dws-app/pages/$p/assets/css/$s.css";
    echo "<link rel='stylesheet' href='$u'>";
}

function dws_inc_common($p){
    $u = "dws/dws-app/common/$p.php";
    include $u;
}

function sanitizeOutput($buffer) {
    $search = array(
        '/\>[^\S ]+/s',     // Quitamos espacios en blanco después de las etiquetas, excepto los espacios en sí
        '/[^\S ]+\</s',     // Quitamos espacios en blanco antes de las etiquetas, excepto los espacios en sí
        '/(\s)+/s',         // Acortamos los espacios en blanco
        '/<!--(.|\s)*?-->/' // Quitamos los comentarios HTML
    );
    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );
    $output = preg_replace($search, $replace, $buffer);
    return $output;
}

if ($dwsconfig['minhtml']) {
  ob_start("sanitizeOutput");
}
?>