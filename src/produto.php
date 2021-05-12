<?php

declare(strict_types=1);

class Produto
{
  /**
   * @var
   */
  private $conexao;
  
  public function __construct()
  {
    try{
    $this->conexao = new PDO('mysql:host=localhost;dbname=exemplo','samuel','zyk270');
    }
    catch(Exception $e){
      echo $e->getMessage();
      die();
    } 
  }
  public function list() : array
  {
    echo"<h3>Produtos:</h3>";
    $sql = 'select * from produtos';
    $produtos= [];


    foreach ($this->conexao->query($sql) as $key=>$value){
        //echo 'Id: '. $value['id'].'<br> Descrição '. $value['descricao'].'<hr>';
        array_push($produtos,$value);
    }
    return $produtos;
  }
  public function insert(string $descricao) : int {
    $sql = 'insert into produtos(descricao) values(?)';

    $prepare = $this->conexao->prepare($sql);

    $prepare->bindParam(1,$descricao);
    $prepare->execute();

    return $prepare->rowCount();
  }
  public function update(string $descricao,int $id): int{
      $sql = 'update produtos set descricao = ? where id = ?';

      $prepare = $this->conexao->prepare($sql);
      
      $prepare->bindParam(1,$descricao);
      $prepare->bindParam(2,$id);
      
      $prepare->execute();
      
      return $prepare->rowCount();
  }
  public function delete(int $id) :int
  {
      $sql = 'delete from produtos where id = ?';

      $prepare = $this->conexao->prepare($sql);

      $prepare->bindParam(1,$id);
      $prepare->execute();

      return $prepare->rowCount();
  }
}