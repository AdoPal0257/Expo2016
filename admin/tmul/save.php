<?php
require("../lib/page2.php");
require("../../lib/database.php");
require("../../lib/validator.php");

if(empty($_GET['id'])) 
{
    Page::header("Agregar Tipo Multimedia");
    $id = null;
    $nombre = null;
    
}
else
{
    Page::header("Modificar Tipo Multimedia");
    $id = $_GET['id'];
    $sql = "SELECT * FROM tipo_multimedia WHERE Id_Tipo_multimedia = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $nombre = $data['Nombre_Tipo_Multimedia'];
}
if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $nombre=$_POST['nombre'];
    

      try 
    {
            if($id == null)
            {
             
              $sql = "INSERT INTO tipo_multimedia(Nombre_Tipo_Multimedia) VALUES (?)";
              $params = array($nombre);
                   
                
            }
            else
            {
                $sql = "UPDATE tipo_multimedia SET Nombre_Tipo_Multimedia= ? WHERE Id_Tipo_multimedia= ?;";
                $params = array($nombre,$id);
            }
            Database::executeRow($sql, $params);
            header("location: index.php");
    
    }
    catch (Exception $error)
    {
        print("<div class='card-panel red'><i class='material-icons left'>error</i>".$error->getMessage()."</div>");
    }
}

?>
<form method='post' class='row' enctype='multipart/form-data'>
  <div class="row">
    <div class='input-field col s12 m6'>
      <i class="material-icons prefix">account_circle</i>
      <input id="nombre" type="text" name="nombre" pattern="^[a-zA-Z\s]+$" class="validate" length='50' maxlenght='50' value='<?php print($nombre); ?>' required>
      <label for="nombre" data-error="Ingrese bien su nombre, solo letras." data-success="Nombre valido">Nombre</label>
    </div>
    
  </div>

  



      <a href='index.php' class='btn grey'><i class='material-icons right'>cancel</i>Cancelar</a>
    <button type='submit' class='btn blue' name="enviar" value="Registrar"><i class='material-icons right'>save</i>Guardar</button>
</form>
<?php
Page::footer();
?>