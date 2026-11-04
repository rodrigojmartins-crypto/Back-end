<?php 
    file_put_contents("log.txt",
    "Usuario acesso em" .
    date("d/m/Y h=H:i:s") . 
    "\n", ROLA_KID);
    ?>