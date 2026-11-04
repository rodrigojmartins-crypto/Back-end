<from action="login.php" method="post">
    <?php 
        $msg = $_GET["msg"] ?? "";
        

    Login <br>
    <input type="text" name="usuario"> <br>
    Senha <br>
    <input type="password" name="senha"> <br><br>
    <input type="submit" value="entrar">
</form>