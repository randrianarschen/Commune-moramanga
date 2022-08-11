<?php
abstract class Model
{
    public $table;
    public $id;
    public $valToInsert;
    /**
     *pour connecter à la base de données
     *
     * @return void
     */
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    /**
     * suppression d'un ou 2 taxe pour un personne
     *
     * @param  mixed $id_tax1
     * @param  mixed $id_tax2
     * @return void
     */
    public function delete($id_tax): void
    {
        $delete = $this->pdo->prepare("DELETE FROM $this->table WHERE $this->id = :id_tax ");
        $delete->execute(compact('id_tax'));
    }    
    /**
     * pour inserer n'importe quelle données
     *
     * @param  mixed $var
     * @return void
     */
    public function insert(array $var){
        $insert = $this->pdo->prepare("INSERT INTO $this->table VALUES $this->valToInsert ");
        $insert->execute($var);
    }
}
