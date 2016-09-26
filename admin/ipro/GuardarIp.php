<link type='text/css' rel="stylesheet" href='../lib/styles.css'/>
<?php
require("../lib/page2.php");
require("../../lib/database.php");
require("../../lib/validator.php");

if(empty($_GET['id'])) 
{
    Page::header("Agregar Imagen");
    $id = null;
    $titulo = null;
    $imagen=null;
    $descripcion=null;
    $tipo=null;
    $tipoar=null;

}
else
{
    Page::header("Modificar Imagen");
    $id = $_GET['id'];
    $sql = "SELECT * FROM imagenes_productos WHERE Id_imagen = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
  $titulo=$data['Titulo'];
  $descripcion=$data['Descripción'];
  $tipo=$data['Id_producto'];
  $tipoar=$data['Tipo_Imagen'];
  
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
  $descripcion=$_POST['descripcion'];
  $titulo=$_POST['titulo'];
  $archivo=$_FILES['imagen'];
  $tipo=$_POST['tipo'];
  $tipoar=$_POST['tipoar'];
      try 
    {
      if(isset($_POST['tipo']))
      {
        $tipo=$_POST['tipo'];
      }
      else
      {
          throw new Exception("Debe seleccionar un tipo de productos.");
      }
      if(isset($_POST['tipoar']))
      {
        $tipoar=$_POST['tipoar'];
      }
      else
      {
          throw new Exception("Debe seleccionar un tipo de productos.");
      }
         $base64 = Validator::validateImage($archivo);
           $imagen = $base64;
            if($id == null)
            {
                        $sql = "INSERT INTO imagenes_productos(Id_producto, Imagen, Titulo,Descripción, Tipo_Imagen) VALUES (?,?,?,?,?)";
                        $params = array($tipoar, $imagen, $titulo, $descripcion, $tipo);
            }
            else
            {
                $sql = "UPDATE imagenes_productos SET Id_producto= ?, Imagen= ?, Titulo= ?, Descripción= ?, Tipo_Imagen= ? WHERE Id_imagen= ?";
                $params = array($tipoar, $imagen, $titulo, $descripcion, $tipo,$id);
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
  <div class="container">
         <div class="divider"></div>
      <div id="all">
      <form name="ingresarArticulos" method="POST" action="#" class="col s12" enctype="multipart/form-data">
      <div class="row">
         <div class="input-field col s6">
                <i class="material-icons prefix">loyalty</i>
                <input id="titulo" type="text" name="titulo" pattern="^[a-zA-Z\s]+$" class="validate" length='50' maxlenght='50' value='<?php print($titulo); ?>' required/>
                <label for="titulo" data-error="Ingrese bien el nombre, solo letras." data-success="Nombre valido">Titulo</label>
             </div>
              <div class="row">
    <div class='input-field col s12 m6'>
    <div>
          <?php
            $sql = "SELECT Id_Articulo, Nombre FROM articulos";
            Page::setCombo("tipoar", $tipoar, $sql);
          ?>
          </div>
    </div>
            
        </div>
        <div class="row">
                <div class="input-field col s6">
                    <textarea id="descripcion" class="materialize-textarea" name="descripcion" length="120"><?php print($descripcion); ?></textarea>
                    <label for="descripcion">Descripción:</label>
                </div>

    <div id="g" class='input-field col s12 m6'>
    <div>
          <?php
            $sql = "SELECT Id_Tipo_imagen, Nombre_tipo_imagen FROM tipo_imagen";
            Page::setCombo("tipo", $tipo, $sql);
          ?>
          </div>
    </div>
    </div>
        <div class="row">
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
        </div>
        </div>
 
<?php
Page::footer();
?>