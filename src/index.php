<?php
include_once 'produto.php';
$produto = new Produto();

switch($_GET['operacao']){

    case 'list':

        foreach ($produto->list() as $value){
            echo 'Id: '. $value['id'].'<br> Descrição '. $value['descricao'].'<hr>';
        }
        break;

    case 'insert':

        $status = $produto->insert('craudin');
        
        if(!$status){
            echo "Não foi possível executar a operação";
            return false;
        }
        echo "registro inserido com sucesso";

        break;

    case 'update':

        $status = $produto->update('ariosvaldo',5);


        if(!$status){
            echo "Não foi possível executar a operação";
            return false;
        }
        echo "registro modificado com sucesso";

        
        break;

    case 'delete':
        
        $status = $produto->delete(1);

            if(!$status){
                echo "Não foi possível executar a operação";
                return false;
            }
            echo "registro deletado com sucesso";

        break;
}






?>
<title>index</title>