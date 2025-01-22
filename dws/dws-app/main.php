<?php 
require_once "dws/dws-app/pages/$dws_page_code/page_config.php";
?>
<!DOCTYPE html>
<html lang="<?php echo $dwsconfig['lang']; ?>">
  <head>    
    <meta http-equiv="Content-Language" content="<?php echo $dwsconfig['lang']; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index,follow">
    <?php 
      echo '<title>'.$dws_pag_config['title'].'</title>';

      if ($dws_pag_config['desc'] != ""){
        echo "<meta name='description' content='".$dws_pag_config['desc']."'>";
      }
      if ($dws_pag_config['keys'] != ""){
        echo "<meta name='Keywords' content='".$dws_pag_config['keys']."'>";
      }
    ?>    
    <script nonce="<?php echo $GLOBALS['dws_nonce']; ?>">
      window.site_url = "<?php echo $GLOBALS['dwsconfig']['site-url']; ?>";
    </script>

    <?php 
      include "dws/dws-app/templates/".$dws_pag_config['tpl']."/".$dws_pag_config['tpl']."_h.php";
      include "dws/dws-app/pages/$dws_page_code/front/hh.php"; 
    ?>
  </head>
<body>
    <?php 
      include "dws/dws-app/templates/".$dws_pag_config['tpl']."/".$dws_pag_config['tpl']."_v.php";
      include "dws/dws-app/templates/".$dws_pag_config['tpl']."/".$dws_pag_config['tpl']."_e.php";
      include "dws/dws-app/pages/$dws_page_code/front/ee.php";
    ?>
</body>
</html>
