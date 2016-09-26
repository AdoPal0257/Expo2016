<link type='text/css' rel="stylesheet" href='../lib/styles.css'/>
<?php
require("../lib/page2.php");
require("../../lib/database.php");
require("../../lib/validator.php");

if(empty($_GET['id'])) 
{
    Page::header("Guardar Paquete");
    $id = null;
    $nombre = null;
    $precio=null;
    $descripcion=null;
    $estado=null;

}
else
{
    Page::header("Modificar Imagen");
    $id = $_GET['id'];
    $sql = "SELECT * FROM paquetes WHERE Id_Paquete = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
  $nombre=$data['Nombre'];
  $descripcion=$data['Descripcion'];
  $precio=$data['Precio'];
  $estado=$data['Estado'];
  
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
  $nombre=$_POST['nombre'];
  $precio=$_POST['precio'];
  $descripcion=$_POST['descripcion'];
  $estado=$_POST['estado'];
      try 
    {
            if($id == null)
            {
                        $sql = "INSERT INTO paquetes(Nombre, Precio, Descripcion,Estado) VALUES (?,?,?,?)";
                        $params = array($nombre, $precio, $descripcion, $estado);
            }
            else
            {
                $sql = "UPDATE paquetes SET Nombre= ?, Precio= ?, Descripcion= ?, Estado= ? WHERE Id_Paquete= ?";
                $params = array($nombre, $precio, $descripcion, $estado,$id);
            }
            Database::executeRow($sql, $params);


            $conexion = mysqli_connect("localhost","admin","admin","galaxydb");
  mysqli_set_charset($conexion, "utf8");
        
              $usuario = $_SESSION['id'];
              $fecha = date('U');
              $estado = 0;
              
              $consulta = "Select * from paquetes order by Id_Paquete desc LIMIT 1";

              $result = Database::get($consulta);

              $_SESSION['id_paquete'] = $result['Id_Paquete'];

            

              $id_paquete = $_SESSION['id_paquete'];
              $cantidad = 2;

              for ($i=0;$i < $_SESSION['contador2']; $i++) 
              { 
                $producto = $_SESSION['producto2'][$i];
  
            $consulta = "INSERT INTO articulos_paquete(Id_Paquete, Id_Articulo, Cantidad) values (?,?,?)";

            $params = array($id_paquete, $producto, $cantidad);

                Database::executeRow($consulta, $params);


                $sql = "SELECT * FROM articulos where Id_Articulo = '".$producto."'";

                $resultado = mysqli_query($conexion, $sql);

            while ($fila = mysqli_fetch_array($resultado)) {
              $existencia = $fila['Stock'];
              $nuevacant = $existencia - 1;

              $act = "UPDATE articulos set Stock = '".$nuevacant."' WHERE Id_Articulo = '".$producto."'";

              $final = mysqli_query($conexion,$act);
            }

  
          }
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
                <input id="nombre" type="text" name="nombre" pattern="^[a-zA-Z\s]+$" class="validate" length='50' maxlenght='50' value='<?php print($nombre); ?>' required/>
                <label for="nombre" data-error="Ingrese bien el nombre, solo letras." data-success="Nombre valido">Nombre</label>
             </div>
              <div class="row">
                <div class="input-field col s6">
        <i class="material-icons prefix">shopping_cart</i>
        <input id="precio" type="number" step="any" name="precio" pattern="^[0-9\.]+$"  length='5' maxlenght='5' value='<?php print($precio); ?>' required/>
        <label for="precio" data-error="Ingrese bien el precio, solo números." data-success="Precio valido">Precio</label>
      </div>
              </div>
            
        </div>
        <div class="row">
                <div class="input-field col s6">
                    <textarea id="descripcion" class="materialize-textarea" name="descripcion" length="120"><?php print($descripcion); ?></textarea>
                    <label for="descripcion">Descripción:</label>
                </div>

    <div id="g" class="input-field col s6 ">
            <select name="estado">
              <option value="" disabled selected>Estado del paquete</option>
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
           </select>
      </div>
    </div>
    <a href='index.php' class='btn grey'><i class='material-icons right'>cancel</i>Cancelar</a>
    <button type='submit' class='btn blue' name="enviar" value="Registrar"><i class='material-icons right'>save</i>Guardar</button>
        </form>
        </div>
            </div>
        
<div class="row">
      <div id="carrito" class="col s12" style=" color:white;background:black; ">
        Carrito
      </div>
      <div class="col s12">
        <button class="col s6">
      <a class='waves-effect waves-light btn' href='destruir.php'>
      <i class='material-icons left'>cloud</i>Vaciar carrito
      </a>
    </button>
      </div>
      
</div>

    <div class="row">
    <div class="col s12">
      <ul class="tabs">
      <?php
      $sql = "SELECT * FROM articulos  WHERE articulos.Estado = 1 and Stock > 0";
      
      $data = Database::getRows($sql, null);

      $tipoart = "SELECT * FROM tipo_productos";
      
      $data2 = Database::getRows($tipoart, null);
      if($data != null)
      {
        $products = "";    
        $fin ="</ul>
    </div>";
    $sub="";
        foreach ($data2 as $row2) 
        {
          $b2 ="$row2[Id_Tipo_Producto]";
          $nombre ="$row2[Nombre]";
          
          $sub2="";
          foreach ($data as $row) 
            {
              $c ="$row[Tipo_producto]";
              $b ="$row2[Id_Tipo_Producto]";
              if ($c ==$b) {
                $sub2 .= "<div class='col s12 m4'>
             <div  class='card horizontal'>
             <div id='imgdiv' class='col m6 card-image'>
             <img class='activator' src='data:image/*;base64,$row[Imagen]'>
                       </div>
             <div class='card-stacked'>
                         <div class='card-content '>
                 <p id='prueba'>$row[Nombre]</p>
               </div>
               <div id='prueba' class='col s12 m24  card-action'>
                  <button class='boton-compra' value='$row[Id_Articulo]'>
                      <a class='waves-effect waves-light btn'>
                        <i class='material-icons left'>cloud</i>Añadir
                      </a>
                    </button>                         
               </div>
             </div>
       
           </div>
         </div>";
              }
              else
              {
                 $sub2 .= "";
              }
            }
          $sub .= "<div id='test$b2' class='col s12'>".$sub2."</div>";
          $products .= " <li class='tab col s3'><a href='#test$b2'>$nombre</a></li>
         ";
        }
         
        $products .= $fin;
        $products .= $sub;
        print($products);
      }
      else
      {
        print("<div class='card-panel yellow'><i class='material-icons left'>warning</i>No hay productos disponibles en este momento.</div>");
      }
        ?>
    </div>
    
            
 
<?php
Page::footer();
?>