<?php
require("../../lib/database.php");
$sql = "SELECT * FROM usuarios";
$data = Database::getRows($sql, null);

require("../lib/page.php");
require("../../lib/validator.php");
Page::header("Registrar usuario");

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
    $nombres = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['email'];
    $alias = $_POST['username'];
    $sexo = $_POST['sexo'];
    $fecha = $_POST['fecha'];
    $tipo = 2;
    $archivo = $_FILES['imagen'];
    if($correo == "")
    {
        $correo = null;
    }

    try 
    {
        if($archivo['name'] != null)
        {
            $base64 = Validator::validateImage($archivo);
            if($base64 != false)
            {
                $imagen = $base64;


                if($nombres != "" && $apellidos != "")
        {
            $clave1 = $_POST['clave1'];
            $clave2 = $_POST['clave2'];
            if($alias != "" && $clave1 != "" && $clave2 != "")
            {
                if($clave1 == $clave2)
                {
                    $clave = password_hash($clave1, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO usuarios(Nombres, Apellidos, Email,Username, Clave, Fecha_nacimiento, Sexo, Tipo_Usuario, Foto_Usuario) VALUES (?,?,?,?,?,?,?,?,?)";
                    $param = array($nombres, $apellidos, $correo, $alias, $clave, $fecha, $sexo, $tipo, $imagen);
                    Database::executeRow($sql, $param);
                    header("location: login.php");
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
else
{
    $nombres = null;
    $apellidos = null;
    $correo = null;
    $alias = null;
    $estado = null;
    $fecha = null;
    $archivo = null;
}
?>

<form method='post' class='row' enctype='multipart/form-data'>
    <div>
  <div class="row">
    <div class="input-field col s6">
      <i class="material-icons prefix">account_circle</i>
      <input id="nombre" type="text" name="nombre" pattern="^[a-zA-Z\s]+$" class="validate" autocomplete="off">
      <label for="nombre" data-error="Ingrese bien su nombre, solo letras." data-success="Nombre valido">Nombre</label>
    </div>
    <div class="input-field col s6">
      <i class="material-icons prefix">account_circle</i>
      <input id="last_name" type="text" name="apellidos" pattern="^[a-zA-Z\s]+$"  class="validate" autocomplete="off">
      <label for="last_name" data-error="Ingrese bien su apellido, solo letras." data-success="Apellido valido">Apellido</label>
    </div>
  </div>

  <div class="row">
  <div class="input-field col s6">
      <i class="material-icons prefix">email</i>
      <input id="email" type="email" name="email" class="validate" autocomplete="off">
      <label for="email"  data-error="Ingrese bien su correo" data-success="correo correcto">Correo</label>
    </div>
    <div class="input-field col s6">
      <i class="material-icons prefix">assignment_ind</i>
      <input id="username" type="text" name="username" class="validate" autocomplete="off">
      <label for="username">Username</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s6">
      <i class="material-icons prefix">lock</i>
      <input id="password" type="password" name="clave1" class="validate" autocomplete="off">
      <label for="password">Contraseña</label>
    </div>
    <div class="input-field col s6">
       <i class="material-icons prefix">lock</i>
      <input id="password" type="password" name="clave2" class="validate" autocomplete="off">
      <label for="password">Confirmar contraseña</label>
    </div>
  </div>

  

  <div class="row">
  
  <div class="col s6">
    <div class="input-field">
      <i class="material-icons prefix">perm_contact_calendar</i>
      <input type="date" name="fecha" class="datepicker" id="date"/>
      <label for="date">Fecha de nacimiento</label>
    </div>
  </div>

  <div class="col s6">

            <div class="col s3">
            
              <p>
                 <input id='hombre' type='radio' name='sexo' class='with-gap' value='0' required/>
              <label for='hombre'>Hombre</label>
              </p>
            </div>
            <div class="col s3">
              <p>
                 <input id='mujer' type='radio' name='sexo' class='with-gap' value='1' required />
            <label for='mujer'>Mujer</label>
              </p>
            </div>  

    </div>
     <div class="col s12">

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

  <div class="row">
    <div class=" col s6">
      <button class="btn-floating btn-large waves-effect waves-light light-green accent-4" type="submit" name="enviar" value="Registrar">
        <i class="material-icons right">send</i>
      </button>
    </div>
  </div>

</div>
</form>
<?php
Page::footer();
?>