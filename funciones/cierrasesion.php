<?php
//cierrasesion.php

//incluye validasesion.php
require_once("validarsesion.php");

//incluye funciones.php
require_once("funciones.php");
// cierra la sesion actual
cerrarsesion();
// redirecciona el flujo al archivo index.php
?>
    <script language="javascript">
    <?php
      if(file_exists("index.php")) {
    ?>
        var pagina = "index.php";
    <?php
      } else {
    ?>
        var pagina = "../index.php";
    <?php
      }        
    ?>
        parent.parent.location.href=pagina;
    </script>

