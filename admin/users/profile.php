<?php
require("../lib/page2.php");
require("../../lib/database.php");
require("../../lib/validator.php");
Page::header("Editar perfil");

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
  	$nombres = $_POST['nombres'];
  	$apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $alias = $_POST['alias'];
    $clave1 = $_POST['clave1'];
    $clave2 = $_POST['clave2'];
    if($correo == "")
    {
        $correo = null;
    }

    try 
    {
      	if($nombres != "" && $apellidos != "" && $alias != "")
        {
            if($clave1 != "" || $clave2 != "")
            {
                if($clave1 == $clave2)
                {
                    $clave = password_hash($clave1, PASSWORD_DEFAULT);
                    $sql = "UPDATE usuarios SET Nombres = ?, Apellidos = ?, Email = ?, Username = ?, Clave = ? WHERE Id_Usuario = ?";
                    $params = array($nombres, $apellidos, $correo, $alias, $clave, $_SESSION['id']);
                }
                else
                {
                    throw new Exception("Las claves ingresadas no coinciden.");
                }
            }
            else
            {
                $sql = "UPDATE usuarios SET Nombres = ?, Apellidos = ?, Email = ?, Username = ? WHERE Id_Usuario = ?";
                $params = array($nombres, $apellidos, $correo, $alias, $_SESSION['id']);
            }
        }
        else
        {
            throw new Exception("Debe ingresar el nombre completo y el alias.");
        }
        Database::executeRow($sql, $params);
        header("location: ../main/index.php");
    }
    catch (Exception $error)
    {
        print("<div class='card-panel red'><i class='material-icons left'>error</i>".$error->getMessage()."</div>");
    }
}
else
{
    $sql = "SELECT * FROM usuarios WHERE Id_Usuario = ?";
    $params = array($_SESSION['id']);
    $data = Database::getRow($sql, $params);
    $nombres = $data['Nombres'];
    $apellidos = $data['Apellidos'];
    $correo = $data['Email'];
    $alias = $data['Username'];
}
?>
<form method='post' class='row' enctype='multipart/form-data'>
    <div class='row'>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>assignment_ind</i>
          	<input id='nombres' type='text' name='nombres' class='validate' length='50' maxlenght='50' value='<?php print($nombres); ?>' required/>
          	<label for='nombres'>Nombres</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>assignment_ind</i>
            <input id='apellidos' type='text' name='apellidos' class='validate' length='50' maxlenght='50' value='<?php print($apellidos); ?>' required/>
            <label for='apellidos'>Apellidos</label>
        </div>
    </div>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>email</i>
            <input id='correo' type='email' name='correo' class='validate' length='100' maxlenght='100' value='<?php print($correo); ?>'/>
            <label for='correo'>Correo</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>perm_identity</i>
            <input id='alias' type='text' name='alias' class='validate' length='50' maxlenght='50' value='<?php print($alias); ?>' required/>
            <label for='alias'>Alias</label>
        </div>
    </div>
    <div class='row'>
        <label>CAMBIAR CLAVE</label>
    </div>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>lock</i>
            <input id='clave1' type='password' name='clave1' class='validate' length='25' maxlenght='25'/>
            <label for='clave1'>Clave nueva</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>lock</i>
            <input id='clave2' type='password' name='clave2' class='validate' length='25' maxlenght='25'/>
            <label for='clave2'>Confirmar clave</label>
        </div>
    </div>
    <a href='../main/index.php' class='btn grey'><i class='material-icons right'>cancel</i>Cancelar</a>
 	<button type='submit' class='btn blue'><i class='material-icons right'>save</i>Guardar</button>
</form>
<?php
Page::footer();
?>