<?php
namespace Models;

class ClassDB extends ClassConexao
{
    private $obj;
    private $cont;

    //prepare sql
    private function prepareSql($sql,$param)
    {
        $this->countParam($param);
        $this->obj = $this->conectaDB("127.0.0.1", "login", "root", "")->prepare($sql);

        if($this->cont > 0){
            for($i=1; $i <= $this->cont; $i++){
                $this->obj->bindValue($i,$param[$i-1]);
            }
        }
        $this->obj->execute();
    }

    //contador parametros
    private function countParam($param)
    {
        $this->cont = count($param);
    }

    //insertDB
    public function insertDB($table,$where,$param)
    {
        $this->prepareSql("INSERT INTO {$table} VALUES ({$where})",$param);
        return $this->obj;
    }

    //selectDB
    public function selectDB($fields,$table,$where,$param)
    {
        $this->prepareSql("SELECT {$fields} FROM {$table} {$where}",$param);
        return $this->obj;
    }

    //updareDB
    public function updateDB($table,$set,$where,$param)
    {
        $this->prepareSql("UPDATE {$table} SET {$set} WHERE {$where}",$param);
        return $this->obj;
    }
}

?>