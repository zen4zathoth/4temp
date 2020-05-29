<?php

session_start();
if(isset($_SESSION['emailSession']))
{
    $emailSession = $_SESSION['emailSession'];
}

if(isset($_SESSION['passwordSession']))
{
    $passwordSession = $_SESSION['passwordSession'];
}
if(isset($_SESSION['isAdminSession']))
{
    $isAdminSession = $_SESSION['isAdminSession'];
}

if(empty($emailSession) || empty($passwordSession))
{
    $sql = "SELECT * FROM usuario WHERE email = '$emailSession'";
    $query = mysqli_query($conexao, $sql);
    $res = mysqli_fetch_row($query);
    if(mysqli_num_rows($query) == 1)
    {
        if($passwordSession != $res[1])
        {
            session_destroy();
            header("Location:../login/loginNull.php");
        }
    } else
    {
        session_destroy();
        header("Location:../login/loginNull.php");
    }
}