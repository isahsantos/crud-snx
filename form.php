<?php
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'classes/carro.php';

$objCarro = new Carro();
//  Metodo get 
if(isset($_GET['edit_id'])){
  $id = $_GET['edit_id'];
  $stmt = $objCarro->runQuery("SELECT * FROM carro WHERE id=:id");
  $stmt->execute(array(":id" => $id));
  $rowCarro = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
$id = null;
$rowCarro = null;
}

// Metodo post
if(isset($_POST['btn_save'])){
  $modelo  = strip_tags($_POST['modelo']);
  $marca  = strip_tags($_POST['marca']);
  $ano  = strip_tags($_POST['ano']);
  $vlr_fip  = strip_tags($_POST['vlr_fip']);

  try{
     if($id != null){
       if($objCarro->update($id,$modelo,$marca,$ano,$vlr_fip)){
         $objCarro->redirect('index.php?updated');
       }
     }else{
       if($objCarro->insert($modelo,$marca,$ano,$vlr_fip)){
         $objCarro->redirect('index.php?inserted');
       }else{
       
       }
     }
  }catch(PDOException $e){

  }
}

?>
<!doctype html>
<html lang="en">
    <head>
        <?php require_once 'includes/head.php'; ?>
    </head>
    <body>
        <?php require_once 'includes/header.php'; ?>
        <div class="container-fluid">
            <div style="margin-top:10px"class="row">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  <h1 style="margin-top: 40px">Add/Editar Carro</h1>
                  <form  method="post">
                    <h5> Todos os campos são obrigatórios</h5>               
                        <label for="modelo">Modelo *</label>
                        <input  class="form-control" type="text" name="modelo" id="modelo" placeholder="Nome do modelo" value="<?php print($rowCarro=== null ? "" : $rowCarro['modelo']) ?>" required maxlength="100">
                    </div>
                    <div class="form-group">
                        <label for="email">Marca *</label>
                        <input  class="form-control" type="text" name="marca" id="marca" placeholder="Ford/Fiat" value="<?php print($rowCarro=== null ? "" : $rowCarro['marca']) ?>" required maxlength="100">
                    </div>
                    <div class="form-group">
                        <label for="ano">Ano *</label>
                        <input  class="form-control" type="text" name="ano" id="ano" placeholder="YYYY" value="<?php print($rowCarro=== null ? "" : $rowCarro['ano']) ?>" required maxlength="4">
                    </div>
                    <div class="form-group">
                        <label for="vlr_fip">Valor tabela Fipe *</label>
                        <input  class="form-control" type="text" name="vlr_fip" id="vlr_fip" value="<?php print($rowCarro=== null ? "" : $rowCarro['vlr_fip']) ?>" required maxlength="5">
                    </div>
                    <button class="btn waves-effect waves-light" value="Save" type="submit" name="btn_save">Salvar
                    <i class="material-icons right">save</i>
                    </button>
                  </form>
                </main>
            </div>
        </div>
<div class="footer"><div>
    </body>
</html>