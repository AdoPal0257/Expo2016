<link type='text/css' rel="stylesheet" href='../lib/styles.css'/>
<?php
require("../lib/page2.php");
require("../../lib/database.php");
require("../../lib/validator.php");

if(empty($_GET['id'])) 
{
    Page::header("Agregar Articulo");
    $id = null;
    $nombre = null;
    $tipo_producto=null;
    $descripcion=null;
    $precio=null;
    $stock=null;
    $estado=null;
    $peso=null;
    $ima=null;
    $longitud=null;
    $anchura=null;
    $anchura=null;
    $talla=null;
}
else
{
    Page::header("Modificar Articulo");
    $id = $_GET['id'];
    $sql = "SELECT * FROM Articulos WHERE Id_Articulo = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
   $nombre=$data['Nombre'];
  $tipo_producto=$data['Nombre'];
  $descripcion=$data['Descripcion'];
  $precio=$data['Precio'];
  $stock=$data['Stock'];
  $estado=$data['Estado'];
  $ima =$data['Imagen'];
  $peso=$data['Peso'];
  $longitud=$data['Longitud'];
  $anchura=$data['Anchura'];
  $altura=$data['Altura'];
  $talla=$data['Talla'];
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
$nombre=$_POST['nombre'];
  $descripcion=$_POST['descripcion'];
  $precio=$_POST['precio'];
  $stock=$_POST['stock'];
  $archivo=$_FILES['ima'];
  $estado=$_POST['estado'];
  $peso=$_POST['peso'];
  $longitud=$_POST['long'];
  $anchura=$_POST['anchura'];
  $altura=$_POST['altura'];
  $talla=$_POST['talla'];
    if($peso == "")
    {
        $peso = null;
    }
    if($longitud == "")
    {
        $longitud = null;
    }
    if($anchura == "")
    {
        $anchura = null;
    }
    if($altura == "")
    {
        $altura = null;
    }
    if($talla == "")
    {
        $talla = null;
    }

    try 
    {
      if(isset($_POST['tipo_producto']))
      {
        $tipo_producto=$_POST['tipo_producto'];
      }
      else
      {
          throw new Exception("Debe seleccionar un tipo de productos.");
      }  
        if($archivo['name'] != null)
        {
          $base64 = Validator::validateImage($archivo);
          if($base64 != false)
            {
              $ima = $base64;
              if($id == null)
              {
                          $sql = "INSERT INTO articulos(Nombre, Descripcion, precio,Peso, Longitud, Anchura, Altura, Talla, Stock,tipo_producto,Estado,Imagen) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                          $params = array($nombre, $descripcion, $precio, $peso, $longitud, $anchura, $altura, $talla, $stock,$tipo_producto, $estado,$ima);
              }
              else
              {
                  $sql = "UPDATE articulos SET Nombre= ?, Descripcion= ?, precio= ?, Peso= ?, Longitud= ?, Anchura= ?, Altura= ?, Talla= ?, Stock= ?, tipo_producto= ?, Estado= ?,Imagen=? WHERE Id_Articulo= ?";
                   $params = array($nombre, $descripcion, $precio, $peso, $longitud, $anchura, $altura, $talla, $stock,$tipo_producto, $estado,$ima,$id);
              }
          
            Database::executeRow($sql, $params);            
            header("location: articulosindex.php");
          }
        }
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
<div class="row">
    <form method='post' class='row' enctype='multipart/form-data'>
      <div class="row">
         <div class="input-field col s5">
            <i class="material-icons prefix">loyalty</i>
            <input id="nombre" type="text" name="nombre" pattern="^[a-zA-Z\s]+$" length='50' maxlenght='50' value='<?php print($nombre); ?>' required/>
            <label for="nombre" data-error="Ingrese bien el nombre, solo letras." data-success="Nombre valido">Nombre</label>
         </div>
         <div class="row">
           <div class='input-field col s12 m6'>
            <div>
          <?php
            $sql = "SELECT Id_Tipo_Producto, Nombre FROM tipo_productos";
            Page::setCombo("tipo_producto", $tipo_producto, $sql);
          ?>
          </div>
    </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="descripcion" class="materialize-textarea" name="descripcion" length='200' maxlenght='200' required/><?php print($descripcion); ?></textarea>
          <label for="descripcion">Descripcion</label>

        </div>
      </div>
      <div class="row">
      <div class="input-field col s4">
        <i class="material-icons prefix">shopping_cart</i>
        <input id="precio" type="number" step="any" name="precio" pattern="^[0-9\.]+$"  length='5' maxlenght='5' value='<?php print($precio); ?>' required/>
        <label for="precio" data-error="Ingrese bien el precio, solo números." data-success="Precio valido">Precio</label>
      </div>
      <div class="input-field col s4">
        <i class="material-icons prefix">assignment</i>
        <input id="stock" type="number" step="any" name="stock" pattern="^[0-9\.]+$"  length='5' maxlenght='5' value='<?php print($stock); ?>' required/>
        <label for="stock" data-error="Ingrese la cantidad, solo números." data-success="Stock valido">Stock</label>
      </div>
     <div class="input-field col s4 ">
            <select name="estado">
              <option value="" disabled selected>Estado del paquete</option>
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
           </select>
      </div>
      </div>
      <div class="row">
        <div class='input-field col s12 m6'>
      <div class="file-field input-field">
        <button class="btn red darken-2">
          <i class="material-icons">insert_photo</i>
          <input type="file" name="ima" id="ima" required/>
        </button>
        <div class="file-path-wrapper">
          <input class="file-path validate" name="ima" type="text" placeholder='1200x1200px máx., 2MB máx., PNG/JPG/GIF '>
        </div>  
      </div>
    </div>
      </div>     
    <ul class="collapsible popout" data-collapsible="accordion">
      <li>
        <div class="collapsible-header"><i class="material-icons">stars</i>Complementos</div>
        <div class="collapsible-body">
          <h5>Datos</h5>
          <div class="input-field col s5">
            <i class="material-icons prefix">done</i>
            <input id="peso" type="number" step="any" name="peso" pattern="^[0-9\.]+$" length='50' maxlenght='50' value='<?php print($peso); ?>'>
            <label for="peso" data-error="Ingrese bien el nombre, solo letras." data-success="Nombre valido">Peso</label>
         </div>  
         <div class="input-field col s5">
            <i class="material-icons prefix">done</i>
            <input id="long" type="number" step="any" name="long" pattern="^[0-9\.]+$" length='50' maxlenght='50' value='<?php print($longitud); ?>'>
            <label for="long" data-error="Ingrese bien el nombre, solo letras." data-success="Nombre valido">Longitud</label>
         </div> 
         <div id="row"> 
            <div class="input-field col s4">
              <i class="material-icons prefix">done</i>
              <input id="anchura" type="number" step="any" name="anchura" pattern="^[0-9\.]+$" length='50' maxlenght='50' value='<?php print($anchura); ?>'>
              <label for="anchura" data-error="Ingrese bien el nombre, solo letras." data-success="Nombre valido">Anchura</label>
           </div> 
            <div class="input-field col s4">
              <i class="material-icons prefix">done</i>
              <input id="altura" type="number" step="any" name="altura" pattern="^[0-9\.]+$" clength='50' maxlenght='50' value='<?php print($altura); ?>'>
              <label for="altura" data-error="Ingrese bien el nombre, solo letras." data-success="Nombre valido">Altura</label>
           </div>  
           <div class="input-field col s4">
              <i class="material-icons prefix">done</i>
              <input id="talla" type="text"  name="talla" pattern="^[a-zA-Z\s]+$" length='50' maxlenght='50' value='<?php print($talla); ?>'>
              <label for="talla" data-error="Ingrese bien el nombre, solo letras." data-success="Nombre valido">Talla</label>
           </div> 
         </div>
         
         <p id="minimal">*Opciones no necesarias para todos los productos*</p>
        </div>
      </li>
    </ul>
    <div id="centro">
     <a href='articulosindex.php' class='btn grey'><i class='material-icons right'>cancel</i>Cancelar</a>
    <button type='submit' class='btn blue' name="enviar" value="Registrar"><i class='material-icons right'>save</i>Guardar</button>
    </div>
    </div>
  
</form>
  </div>
</div>
</div>
 
<?php
Page::footer();
?>