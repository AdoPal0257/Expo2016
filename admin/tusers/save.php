<?php
require("../lib/page2.php");
require("../../lib/database.php");
require("../../lib/validator.php");

if(empty($_GET['id'])) 
{
    Page::header("Agregar tipo usuario");
    $id = null;
    $nombre = null;
    
}
else
{
    Page::header("Modificar tipo usuario");
    $id = $_GET['id'];
    $sql = "SELECT * FROM tipo_usuario WHERE Id_Tipo = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $nombre = $data['Nombre_tipo'];
    $usuario=$data['usuario'];
    $tipo_usuario=$data['tipo_usuario'];
    $articulos=$data['articulo'];
    $tipo_producto=$data['tipo_producto'];
    $imagenes_producto=$data['img_producto'];
    $paquetes=$data['paquetes'];
    $pedidos=$data['pedidos'];
    $multimedia=$data['multimedia'];
    $tipo_multimedia=$data['tipo_multimedia'];
    $tipo_imagen=$data['tipo_img'];
    $guardar=$data['guardar'];
    $modificar=$data['modificar'];
    $eliminar=$data['eliminar'];
}
if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $nombre=$_POST['nombre'];
    $usuario=$_POST['usuario'];
    $tipo_usuario=$_POST['tipousuario'];
    $articulos=$_POST['articulos'];
    $tipo_producto=$_POST['tipoproductos'];
    $imagenes_producto=$_POST['imagenesproducto'];
    $paquetes=$_POST['paquetes'];
    $pedidos=$_POST['pedidos'];
    $multimedia=$_POST['multimedia'];
    $tipo_multimedia=$_POST['tipomultimedia'];
    $tipo_imagen=$_POST['tipoimagen'];
    $guardar=$_POST['guardar'];
    $modificar=$_POST['modificar'];
    $eliminar=$_POST['eliminar'];

      try 
    {
            if($id == null)
            {
             
              $sql = "INSERT INTO tipo_usuario(Nombre_tipo, usuario, tipo_usuario, articulo, tipo_producto, img_producto, paquetes, pedidos, multimedia,tipo_multimedia, tipo_img, guardar, modificar, eliminar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)";
              $params = array($nombre,$usuario,$tipo_usuario,$articulos,$tipo_producto,$imagenes_producto,$paquetes,$pedidos,$multimedia,$tipo_multimedia,$tipo_imagen,$guardar,$modificar,$eliminar);   
            }
            else
            {
                $sql = "UPDATE tipo_usuario SET Nombre_tipo= ?, usuario= ?, tipo_usuario=?, articulo=?, tipo_producto=?, img_producto=?, paquetes=?, pedidos=?, multimedia=?,tipo_multimedia=?, tipo_img=?, guardar=?, modificar=?, eliminar=? WHERE Id_Tipo= ?;";
                $params = array($nombre, $usuario,  $tipo_usuario,$articulos,$tipo_producto,$imagenes_producto,$paquetes,$pedidos,$multimedia,$tipo_multimedia,$tipo_imagen,$guardar,$modificar,$eliminar,$id);
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

  <div class="row">
    <div class='input-field col s1 m2'>
      <input id="usuario" type="checkbox" name="usuario" value='1' <?php if($usuario == 1){print('checked="checked"');}?> >
      <label for="usuario">Usuario</label>
    </div>
    <div class='input-field col s1 m2'>
      <input id="Tipo usuario" type="checkbox" name="tipousuario" value='2' <?php if($tipo_usuario == 2){print('checked="checked"');}?>>
      <label for="Tipo usuario">Tipo usuario</label>
    </div>
    <div class='input-field col s1 m2'>
      <input id="Articulos" type="checkbox" name="articulos" value='3' <?php if($articulos == 3){print('checked="checked"');}?>>
      <label for="Articulos">Articulos</label>
    </div>
    <div class='input-field col s1 m2'>
      <input id="Tipo productos" type="checkbox" name="tipoproductos" value='4' <?php if($tipo_producto == 4){print('checked="checked"');}?>>
      <label for="Tipo productos">Tipo productos</label>
    </div>
    <div class='input-field col s1 m2'>
      <input id="Imagenes producto" type="checkbox" name="imagenesproducto" value='5' <?php if($imagenes_producto == 5){print('checked="checked"');}?>>
      <label for="Imagenes producto">Imagenes producto</label>
    </div>
    <div class='input-field col s1 m2'>
      <input id="Paquetes" type="checkbox" name="paquetes" value='6' <?php if($paquetes == 6){print('checked="checked"');}?>>
      <label for="Paquetes">Paquetes</label>
    </div>
    <div class='input-field col s1 m2'>
      <input id="Pedidos" type="checkbox" name="pedidos" value='7' <?php if($pedidos == 7){print('checked="checked"');}?>>
      <label for="Pedidos">Pedidos</label>
    </div>
    <div class='input-field col s1 m2'>
      <input id="Multimedia" type="checkbox" name="multimedia" value='8' <?php if($multimedia == 8){print('checked="checked"');}?>>
      <label for="Multimedia">Multimedia</label>
    </div>
    <div class='input-field col s1 m2'>
      <input id="Tipo multimedia" type="checkbox" name="tipomultimedia" value='9' <?php if($tipo_multimedia == 9){print('checked="checked"');}?>>
      <label for="Tipo multimedia">Tipo multimedia</label>
    </div>
    <div class='input-field col s1 m2'>
      <input id="Tipo imagen" type="checkbox" name="tipoimagen" value='10' <?php if($tipo_imagen == 10){print('checked="checked"');}?>>
      <label for="Tipo imagen">Tipo imagen</label>
    </div>
    <div class='input-field col s1 m2'>
      <input id="Guardar" type="checkbox" name="guardar" value='11' <?php if($guardar == 11){print('checked="checked"');} ?>>
      <label for="Guardar">Guardar</label>
    </div>
    <div class='input-field col s1 m2'>
      <input id="Modificar" type="checkbox" name="modificar" value='12' <?php if($modificar == 12){print('checked="checked"');}?>>
      <label for="Modificar">Modificar</label>
    </div>
    <div class='input-field col s1 m2'>
      <input id="Eliminar" type="checkbox" name="eliminar" value='13' <?php if($eliminar == 13){print('checked="checked"');}?>>
      <label for="Eliminar">Eliminar</label>
    </div>
  </div>
      <a href='index.php' class='btn grey'><i class='material-icons right'>cancel</i>Cancelar</a>
    <button type='submit' class='btn blue' name="enviar" value="Registrar"><i class='material-icons right'>save</i>Guardar</button>
</form>
<?php
Page::footer();
?>