<?php

namespace Src\Classes;

use Src\Traits\TraitUrlParser;

class ClassRoutes{

  use TraitUrlParser;

  private $Rota;

  #Retorna a rota;
  public function getRota(){
    $url=$this->parseUrl();
    $i=$url[0];
    // return $i;
    $this->Rota=array(
      ""=>"ControllerHome",
      "home"=>"ControllerHome",
      "sitemap"=>"ControllerSitemap",
      "cadastro"=>"ControllerCadastro",
      "login"=>"ControllerLogin",
      'logout'=>"ControllerLogout",
      'registro'=>"ControllerRegistro"

    );


    if(array_key_exists($i, $this->Rota)){

      if(file_exists(DIRREQ."app/controller/{$this->Rota[$i]}.php")){
        return $this->Rota[$i];
      }else{
        return "ControllerHome";
        // return 'file não existe';
      }
    }else{
      return "ControllerHome";
      // return 'rota não existe';
    }
  }

}