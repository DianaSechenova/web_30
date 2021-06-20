<?php


namespace App\Models;


class Currency
{
 public function get_currency(){

     $currency = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
     $currency = json_decode($currency, true);
     foreach($currency as $c){
         if($c['ccy'] == 'BTC'){
             continue;
         }
         echo '<li class="list-group-item list-group-item-secondary"><p>' .$c['ccy'] . ' - ' .round($c['buy'], 2) . ' '. $c['base_ccy']  .  '</p></li>';
     };
 }
}
