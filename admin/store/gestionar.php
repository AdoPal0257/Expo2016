<?php
require("../lib/page2.php");
require("../../lib/database.php");
require("../../lib/validator.php");

if(empty($_GET['id'])) 
{
    Page::header("Agregar usuario");
    $id = null;
    $nombre = null;
    $apellidos=null;
    $correo=null;
    $username=null;
    $clave1=null;
    $tipo=null;
    $imagen=null;
    $sexo=null;
    $fecha_nacimiento=null;
}
else
{
    Page::header("Modificar usuario");
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE Id_Usuario = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $nombre = $data['Nombres'];
    $apellidos=$data['Apellidos'];
    $correo=$data['Email'];
    $username=$data['Username'];
   
    $tipo=$data['Tipo_Usuario'];
    $imagen=$data['Foto_Usuario'];
    $sexo=$data['Sexo'];
    $fecha_nacimiento=$data['Fecha_nacimiento'];
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $correo=$_POST['email'];
    

    
    $archivo=$_FILES['imagen'];
    $sexo=$_POST['sexo'];
    $fecha_nacimiento=$_POST['fecha'];
    if($correo == "")
    {
        $correo = null;
    }

    try 
    {
      if(isset($_POST['tipo']))
      {
        $tipo=$_POST['tipo'];
      }
      else
      {
          throw new Exception("Debe seleccionar un tipo de usuario.");
      }
      if($archivo['name'] != null)
        {
            $base64 = Validator::validateImage($archivo);
            if($base64 != false)
            {
                $imagen = $base64;

        if($nombre != "" && $apellidos != "")
        {
            if($id == null)
            {
                $username = $_POST['username'];
                $clave1 = $_POST['clave1'];
                $clave2 = $_POST['clave2'];
                if($username != "" && $clave1 != "" && $clave2 != "")
                {
                    if($clave1 == $clave2)
                    {
                        $clave = password_hash($clave1, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO usuarios(Nombres, Apellidos, Email,Username, Clave, Fecha_nacimiento, Sexo, Tipo_Usuario, Foto_Usuario) VALUES (?,?,?,?,?,?,?,?,?)";
                        $params = array($nombre, $apellidos, $correo, $username, $clave, $fecha_nacimiento, $sexo, $tipo, $imagen);
                    }
                    else
                    {
                        throw new Exception("Las claves ingresadas no coinciden.");
                    }
                }
                else
                {
                    throw new Exception("Debe ingresar todos los datos de autenticación.");
                }
            }
            else
            {
                $sql = "UPDATE usuarios SET Nombres= ?, Apellidos= ?, Email= ?, Fecha_nacimiento= ?, Sexo= ?, Tipo_Usuario= ?, Foto_Usuario= ? WHERE Id_Usuario= ?";
                $params = array($nombre, $apellidos, $correo, $fecha_nacimiento, $sexo, $tipo, $imagen, $id);
            }
            Database::executeRow($sql, $params);
            header("location: index.php");
        }
        else
        {
            throw new Exception("Debe ingresar el nombre completo.");
        }
        
         }
            else
            {
                throw new Exception("La imagen seleccionada no es valida.");
            }
}
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
    <div class='input-field col s12 m6'>
      <i class="material-icons prefix">account_circle</i>
      <input id="last_name" type="text" name="apellidos" pattern="^[a-zA-Z\s]+$"  class="validate" length='50' maxlenght='50' value='<?php print($apellidos); ?>' required>
      <label for="last_name" data-error="Ingrese bien su apellido, solo letras." data-success="Apellido valido">Apellido</label>
    </div>
  </div>

  <div class="row">
    <div class='input-field col s12 m6'>
      <i class="material-icons prefix">email</i>
      <input id="email" type="email" name="email" class="validate" length='100' maxlenght='100' value='<?php print($correo); ?>'>
      <label for="email"  data-error="Ingrese bien su correo" data-success="correo correcto">Correo</label>
    </div>
    <div class='input-field col s12 m6'>
      <i class="material-icons prefix">assignment_ind</i>
      <input id="username" type="text" name="username" class="validate" length='50' maxlenght='50' <?php print("value='$username'"); print(($id == null)?" required":" disabled"); ?>>
      <label for="username">Username</label>
    </div>
  </div>
<?php
    if($id == null)
    {
    ?>
  <div class="row">
    <div class='input-field col s12 m6'>
      <i class="material-icons prefix">lock</i>
      <input id="password" type="password" name="clave1" class="validate" length='25' maxlenght='25' required>
      <label for="password">Contraseña</label>
    </div>
    <div class='input-field col s12 m6'>
       <i class="material-icons prefix">lock</i>
      <input id="password" type="password" name="clave2" class="validate" length='25' maxlenght='25' required>
      <label for="password">Confirmar contraseña</label>
    </div>
  </div>
  <?php
    }
    ?>
  <div class="row">
    <div class='input-field col s12 m6'>
      <div class="input-field">
        <i class="material-icons prefix">perm_contact_calendar</i>
        <input type="date" class="datepicker" name="fecha" length='50' maxlenght='50' value='<?php print($fecha_nacimiento); ?>' required>
        
        <label for="date">Fecha de nacimiento</label>
      </div>
    </div>

  <div class='input-field col s12 m6'>

            <div class="col s3">
                 <input id='hombre' type='radio' name='sexo' class='with-gap' value='0' <?php print(($sexo == 0)?"checked":""); ?>/>
              <label for='hombre'>Hombre</label>
            </div>
            <div class="col s3">
                 <input id='mujer' type='radio' name='sexo' class='with-gap' value='1' <?php print(($sexo == 1)?"checked":""); ?>/>
            <label for='mujer'>Mujer</label>
            </div>
  </div>
    
    

</div>

  <div class="row">
    <div class='input-field col s12 m6'>
    <div>
          <?php
            $sql = "SELECT Id_Tipo, Nombre_tipo FROM tipo_usuario";
            Page::setCombo("tipo", $tipo, $sql);
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