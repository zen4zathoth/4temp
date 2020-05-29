<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="login.css">
        <meta charset="utf-8">
    </head>

    <body>
    <!----
        <header>
            
        </header>
    -->
    <article>
        <h1>Login</h1>
        <form action="index-login.php" method="POST">
           <input type="text" name="email" placeholder="E-mail ou Nome de Usuário" class="caixa" required>
           <br><br><input type="password" name="senha" placeholder="Senha" class="caixa" required>
           <br><br><input type="submit" class="submit" name="submit" value="Entrar">
           <br><br><label>
        </form>
            <label><a href="#">Esqueceu sua senha?</a></label></label>
            <br><label><a href="../registrar/index-register.html" class="conta">Não tenho uma conta.</a></label>
    </article>

        <?php

    include '../connect_mysql.php';

    if(isset($_POST['submit']))
    {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE email='$email'";
    $query = mysqli_query($conexao, $sql);
    $res = mysqli_fetch_row($query);

    if($email != $res[2])
    {
        echo "<div class='errorMessage'>E-mail incorreto.</div>";
    } 
    else if($senha != $res[1])
    {
        echo "<div class='errorMessage'>Senha incorreta.</div>";
    }

    else
    {
        echo "<div class='errorMessage'>Sessão iniciada.</div>";
        session_start();
        $_SESSION['nameSession'] = $res[0];
        $_SESSION['emailSession'] = $email;
        $_SESSION['senhaSession'] = $senha;

        // Checagem de nível de administrador

        
        if($res[6] == 1)
        {
            $_SESSION['isAdminSession'] = $res[6];
            header("Location:../sessions/adm/index_admin.php");
        }
        /*if($res[6] == 2)
        {
            $_SESSION['isAdminSession'] = $res[6];
            header("Location:../sessions/func/index_func.php");
        }*/
        else
        {
            header("Location:../sessions/user/index_user.php");
        }
        
    }
}
    ?>
    </body>
    </html>