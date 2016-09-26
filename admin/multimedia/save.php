<?php
require("../lib/page2.php");
require("../../lib/database.php");
require("../../lib/validator.php");

if(empty($_GET['id'])) 
{
    Page::header("Agregar Multimedia");
    $id = null;
    $titulo = null;
    $descripcion=null;
    $tipo=null;
    $imagen=null;
    }
else
{
    Page::header("Modificar Multimedia");
    $id = $_GET['id'];
    $sql = "SELECT * FROM multimedia WHERE Id_Multimedia = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $titulo = $data['Titulo'];
    $descripcion=$data['Descripcion'];
    $tipo=$data['Tipo'];
    $imagen2=$data['Imagen'];
    
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $titulo=$_POST['Titulo'];
    $descripcion=$_POST['Descripcion'];
    $tipo=$_POST['Tipo'];
    $imagen=$_FILES['imagen'];
        try 
    {
      if(isset($_POST['Tipo']))
      {
        $tipo=$_POST['Tipo'];
      }
      else
      {
          throw new Exception("Debe seleccionar un tipo de multimedia.");
      }
  
            $base64 = Validator::validateImage($imagen);
             $imagen2 = $base64;
            if($id == null)
            {
               
                $sql = "INSERT INTO multimedia(Titulo, Descripcion, Tipo, Imagen) VALUES (?,?,?,?)";
                        $params = array($titulo, $descripcion, $tipo, $imagen2);
                    }
                                 
                
            else
            {
                $sql = "UPDATE multimedia SET Titulo= ?, Descripcion= ?,Tipo= ?, Imagen= ? WHERE Id_Multimedia= ?";
                $params = array($titulo, $descripcion, $tipo, $imagen2, $id);
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
      <input id="Titulo" type="text" name="Titulo" pattern="^[a-zA-Z\s]+$" class="validate" length='50' maxlenght='50' value='<?php print($titulo); ?>' required>
      <label for="Titulo" data-error="Ingrese bien el titulo, solo letras" data-success="Nombre valido">Titulo</label>
    </div>
    <div class='input-field col s12 m6'>
      <i class="material-icons prefix">account_circle</i>
      <input id="Descripcion
      " type="text" name="Descripcion" pattern="^[a-zA-Z\s]+$"  class="validate" length='50' maxlenght='50' value='<?php print($descripcion); ?>' required>
      <label for="Descripcion" data-error="Ingrese la descripcion, solo letras." data-success="Descripcion valida">Descripcion</label>
    </div>

  </div>

  <div class="row">
    <div class='input-field col s12 m6'>
    <div>
          <?php
            $sql = "SELECT Id_Tipo_multimedia, Nombre_Tipo_Multimedia FROM tipo_multimedia";
            Page::setCombo("Tipo", $tipo, $sql);
          ?>
          </div>
    </div>

    <div class='input-field col s12 m6'>
      <div class="file-field input-field">
        <button class="btn red darken-2">
          <i class="material-icons">insert_photo</i>
          <input type="file" name="imagen" id="imagen">
        </button>
        <div class="file-path-wrapper">
          <input class="file-path validate" name="imagen" type="text" placeholder='1200x1200px máx., 2MB máx., PNG/JPG/GIF'>
        </div>  
      </div>
    </div>
  </div>
    <a href='index.php' class='btn grey'><i class='material-icons right'>cancel</i>Cancelar</a>
    <button type='submit' class='btn blue' name="enviar" value="Registrar"><i class='material-icons right'>save</i>Guardar</button>
</form>
<?php
Page::footer();
?>