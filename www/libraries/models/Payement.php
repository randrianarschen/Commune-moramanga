<?php

namespace models;
class Payement extends Model
{

      public $table = "payement";      
      /**
       * pour trouver les payement selon la date
       *
       * @param  mixed $year_payement
       * @return void
       */
      public function findAllByDate($year_payement = date("Y"))
      {
            $select = $this->pdo->prepare("SELECT*FROM payement WHERE dateDepay = :year_payement");
            $select->execute(compact('year'));
            return $select->fetchAll();
      }      
      /**
       * pour trouver le contrubuable a déjà  payé selon la date et CIN
       *
       * @param  mixed $year_payement
       * @param  mixed $Cin
       * @return void
       */
      public function search($year_payement, $Cin){
            $select = $this->pdo->prepare("SELECT payement.dateDePay, payement.id_cont,  payement.id_maison, payement.id_terr, payement.payement_tax_terr, payement.payement.tax_maison FROM payement, contrubuable WHERE contrubuable.CIN = :Cin AND payement.id_cont = contrubuable.id_cont AND payement.dateDePay = :year_payement");
            $select->execute(compact('year_payement', 'Cin'));
            return $select->fetchAll();
      }
      public function pay(){
            
      }
}
