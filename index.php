<?php
// Exibe os erros  PHP 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

//Importa a classe  Carro 
require_once 'classes/carro.php';

$objCarro = new Carro();

if(isset($_GET['delete_id'])){
  $id = $_GET['delete_id'];
  try{
    if($id != null){
      if($objCarro->delete($id)){
        $objCarro->redirect('index.php?deleted');
      }
    }else{
      var_dump($id);
    }
  }catch(PDOException $e){
    echo $e->getMessage();
  }
}

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Head metas, css, and title -->
        <?php require_once 'includes/head.php'; ?>
    </head>
    <body>
        <!-- Header banner -->
        <?php require_once 'includes/header.php'; ?>
        <div  style="margin-top:30px"class="container-fluid">
            <div class="row">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <h1 style="margin-top: 10px"> Listar Carros </h1>
                    <?php
                      if(isset($_GET['updated'])){
                        echo  "<script>alert('Carro atualizado com sucesso!');</script>";
                      }else if(isset($_GET['deleted'])){
                        echo  "<script>alert('Carro removido!');</script>";
                      }else if(isset($_GET['inserted'])){
                        echo  "<script>alert('Carro inserido');</script>";
                      }else if(isset($_GET['error'])){
                        echo  "<script>alert('Ops algo deu errado, tente novamente mais tarde');</script>";
                      }
                    ?>
            
              </div>
                      <div class="table-responsive">
                        <table class="highlight">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Ano</th>
                                <th>Valor Fip</th>
                                <th></th>
                              </tr>
                            </thead>
                            <?php
                              $query = "SELECT * FROM carro";
                              $stmt = $objCarro->runQuery($query);
                              $stmt->execute();
                            ?>
                            <tbody>
                                <?php if($stmt->rowCount() > 0){
                                  while($rowCarro = $stmt->fetch(PDO::FETCH_ASSOC)){
                                 ?>
                                 <tr>
                                    <td><?php print($rowCarro['id']); ?></td>

                                    <td>
                                      <a href="form.php?edit_id=<?php print($rowCarro['id']); ?>">
                                      <?php print($rowCarro['modelo']); ?>
                                      </a>
                                    </td>

                                    <td><?php print($rowCarro['marca']); ?></td>

                                    <td><?php print($rowCarro['ano']); ?></td>
                                    <td><?php print($rowCarro['vlr_fip']); ?> R$</td>

                                    <td>
                                      <a class="confirmation" href="index.php?delete_id=<?php print($rowCarro['id']); ?>">
                                      <span ><i class="material-icons center">delete_forever</i></span>
                                      </a>
                                    </td>
                                 </tr>
                          <?php } } ?>
                            </tbody>
                        </table>

                      </div>


                </main>
            </div>
        </div>
        <script>
            $('.confirmation').on('click', function () {
                return confirm('Você tem certeza que deseja excluir este carro ?');
            });
        </script>
    </body>
</html>