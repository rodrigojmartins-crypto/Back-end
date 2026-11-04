<form> method  = "post" action = "post_get.php"
    Cor: <br>
    <input type = "text" nome = "cor" value = ""> <br>
    Tipo: <br>
    <input type = "text" nome = "tipo" value = ""> <br>

<input type = "submit" nome = "cadastrar" value = "">

</form>

<?php
    $cor = $_POST ['cor'];
    $tipo = $POST ['tipo'];
    $produto =  $_GET ['produto'] ?? "(nao selecionado)";

     if(empty ($_POST  ["cor"])){
        echo "a cor do $produto é $cor do tipo $tipo";
    }
?>