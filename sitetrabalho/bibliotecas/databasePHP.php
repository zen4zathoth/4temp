<?php

    // Consulta como String única e <br>
    function databaseRecord($conexao)
    {
        $queryArray = [];

        $sql = 'SELECT * FROM usuario';
        $query = mysqli_query($conexao, $sql);

        $num = mysqli_num_rows($query);

        for ($i=1; $i <= $num; $i++)
        {
            $res = mysqli_fetch_row($query);
            $queryToString = implode(' ', $res);
            array_push($queryArray, $queryToString);
            array_push($queryArray, "<br>");
        }
        
        $returnQueryString = implode(' ', $queryArray);
        return $returnQueryString;
    }
    
    // Na prática, essa aqui também retorna uma string, mas é composta por uma tabela.
    // Relatorio com Tabela (<table>)
    function databaseTableRecord($conexao, $specifyColumn = NULL, $tableclass = NULL)
    {   
        if ($tableclass != NULL)
        {
            $queryArray = ["<table class='$tableclass'><tr><th>Nome</th><th>Senha</th><th>E-mail</th><th>Telefone</th><th>CPF</th><th>Data de Nascimento</th><th>Administrador</th></tr>"];
        } else
        {
            $queryArray = ["<table><tr><th>Nome</th><th>Senha</th><th>E-mail</th><th>Telefone</th><th>CPF</th><th>Data de Nascimento</th><th>Administrador</th></tr>"];
        }

        $sql = 'SELECT * FROM usuario';
        $query = mysqli_query($conexao, $sql);

        $num = mysqli_num_rows($query);

        for ($i=1; $i <= $num; $i++)
        {
            $res = mysqli_fetch_row($query);
            if(array_key_exists($specifyColumn, $res))
            {
                $replace = array($specifyColumn => "***");
                $res = array_replace($res, $replace);
            }
            $queryTable = "<tr><td>$res[0]</td><td>$res[1]</td><td>$res[2]</td><td>$res[3]</td><td>$res[4]</td><td>$res[5]</td><td>$res[6]</td><tr>";
            array_push($queryArray, $queryTable);
        }

        array_push($queryArray, "</table>");
        
        $returnQueryString = implode('', $queryArray);
        return $returnQueryString;
    }


    // Obsoleto, favor utilizar databaseQuery ou databaseQueryTable.
    function databaseQueryLegacy($conexao, $categoria, $conteudo)
    {
        echo "Nome da opção selecionada: $categoria<br>";
        $sql = "SELECT * FROM usuario WHERE ".$categoria." = '$conteudo'";
        $query = mysqli_query($conexao, $sql);
        $num = mysqli_num_rows($query);

        $res = mysqli_fetch_row($query);
        echo $res[0], " ", $res[1], " ", $res[2], " ", $res[3], " ", $res[4], " ", $res[5], " ", $res[6], "<br>";
    }

    // Consulta em String
    function databaseQuery($conexao, $categoria, $conteudo)
    {
        $sql = "SELECT * FROM usuario WHERE ".$categoria." = '$conteudo'";
        $query = mysqli_query($conexao, $sql);
        $num = mysqli_num_rows($query);

        $res = mysqli_fetch_row($query);
        implode(' ', $res);
        return $returnQueryString;
    }

    // Consulta com Tabela
    function databaseTableQuery($conexao, $categoria, $conteudo, $specifyColumn = NULL, $tableclass = NULL)
    {   
        if ($tableclass != NULL)
        {
            $queryArray = ["<table class='$tableclass'><tr><th>Nome</th><th>Senha</th><th>E-mail</th><th>Telefone</th><th>CPF</th><th>Data de Nascimento</th><th>Administrador</th></tr>"];
        } else
        {
            $queryArray = ["<table><tr><th>Nome</th><th>Senha</th><th>E-mail</th><th>Telefone</th><th>CPF</th><th>Data de Nascimento</th><th>Administrador</th></tr>"];
        }

        // Querys baseadas em array e implode são mais estáveis do que strings.
        $sql = ["SELECT * FROM usuario WHERE ", $categoria, " LIKE '", "$conteudo", "%'"];
        $sql = implode('', $sql);

        // Debug
        // echo $sql;
        
        $query = mysqli_query($conexao, $sql);
        $num = mysqli_num_rows($query);
        $res = mysqli_fetch_row($query);
        if(array_key_exists($specifyColumn, $res))
        {
            $replace = array($specifyColumn => "***");
            $res = array_replace($res, $replace);
        }

        $queryTable = "<tr><td>$res[0]</td><td>$res[1]</td><td>$res[2]</td><td>$res[3]</td><td>$res[4]</td><td>$res[5]</td><td>$res[6]</td><tr>";
        array_push($queryArray, $queryTable, "</table>");
        
        $returnQueryString = implode(' ', $queryArray);
        return $returnQueryString;
    }
?>