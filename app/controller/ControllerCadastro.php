<?php


namespace App\Controller;
// session_start();
use Src\Classes\classRender;
use Src\Interfaces\InterfaceView;
use App\Model\ClassCadastro;
use Src\Classes\ClassRoutes;

class ControllerCadastro extends ClassCadastro{

  // O que falta:
  // add o diretório da action no form do html para enviar os dados até cadastro/cadastrar;
  protected $userId;
  protected $cliente;
  protected $equipe;
  protected $date;
  protected $infra_estrutura;
  protected $infra_estrutura_num;
  protected $cabeamento;
  protected $cabeamento_num;
  protected $conectorizacao;
  protected $conectorizacao_num;
  protected $tempo_conclusao;
  protected $projeto;
  protected $obs;

  public function __construct()
  {
    if(isset($_SESSION['userId'])){
      $Render = new classRender;
      $Render->setDescription("Página de cadastro");
      $Render->setKeywords("cabeamento,smartfast,performance");
      $Render->setTitle("Smartfast Cadastro");
      $Render->setDir("cadastro/");
      $Render->renderLayout();
    }else{
      if(file_exists(DIRREQ."app/controller/ControllerHome.php")){
      // Redireciona o usuário pra tela home (alterar para tela de login);
        header("Location: ".DIRPAGE);
        exit();
      }
    }
    
  }

  public function receberVariaveis()
  {
    if(isset($_POST['cliente'])){
      $this->userId=filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['equipe'])){
      $this->equipe=filter_input(INPUT_POST, 'equipe', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['date'])){
      $this->date=filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['infra_estrutura'])){
      $this->infra_estrutura=filter_input(INPUT_POST, 'infra_estrutura', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['infra_estrutura_num'])){
      $this->infra_estrutura_num=filter_input(INPUT_POST, 'infra_estrutura_num', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['cabeamento'])){
      $this->cabeamento=filter_input(INPUT_POST, 'cabeamento', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['cabeamento_num'])){
      $this->cabeamento_num=filter_input(INPUT_POST, 'cabeamento_num', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['conectorizacao'])){
      $this->conectorizacao=filter_input(INPUT_POST, 'conectorizacao', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['conectorizacao_num'])){
      $this->conectorizacao_num=filter_input(INPUT_POST, 'conectorizacao_num', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['tempo_conclusao'])){
      $this->tempo_conclusao=filter_input(INPUT_POST, 'tempo_conclusao', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['projeto'])){
      $this->projeto=filter_input(INPUT_POST, 'projeto', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['obs'])){
      $this->obs=filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_SPECIAL_CHARS);
    }
  }

  public function cadastrar()
  {
    $this->receberVariaveis();

    parent::cadastroGestao(
      $this->userId, 
      $this->cliente, 
      $this->equipe, 
      $this->date, 
      $this->infra_estrutura, 
      $this->infra_estrutura_num, 
      $this->cabeamento, 
      $this->cabeamento_num, 
      $this->conectorizacao, 
      $this->conectorizacao_num, 
      $this->tempo_conclusao, 
      $this->projeto, 
      $this->obs
    );
    
  }


  #Selecionar e exibir os dados do banco  de dados
  public function seleciona()
  {
      $this->receberVariaveis();
      $this->selecionaClientes($this->Nome, $this->Sexo, $this->Cidade);
      echo "
        <table border='1'>
            <tr>
                <td>Nome</td>
                <td>Sexo</td>
                <td>Cidade</td>
            </tr>
            ";
                foreach($B as $C){
                    echo "
                    <table border='1'>
                        <tr>
                            <td>$C[Nome]</td>
                            <td>$C[Sexo]</td>
                            <td>$C[Cidade]</td>
                        </tr>
                        ";
        echo"
            </table> 
        ";
                }
  }


  #puxando dados do DB

  public function puxaDB()
  {
      $this->receberVariaveis();
      $B=$this->selecionaClientes($this->Nome, $this->Sexo, $this->Cidade);

      foreach($B as $C) {
          if($C['Id']==$Id){
              $Nome=$C['Nome'];
              $Sexo=$C['Sexo'];
              $Cidade=$C['Cidade'];
          }
      }
  }


  #Atualizar dados dos clientes

  public function atualizar()
  {
      $this->receberVariaveis();
      $this->atualizarClientes($this->Id, $this->Nome, $this->Sexo, $this->Cidade);

      echo "Usuário Atualizado com Sucesso!";
  }
}
