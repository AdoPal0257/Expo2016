<section id="usuarios" class="section">
<div class="container">

  <h1>Registro de usuarios</h1>
      <div class="divider"></div>

        <div id="all">
           
<form name="registro_usuarios" method="POST" action="users/guarda_usuario.php" class="col s12" enctype="multipart/form-data">

<div>
  <div class="row">
    <div class="input-field col s6">
      <i class="material-icons prefix">account_circle</i>
      <input id="nombre" type="text" name="nombre" pattern="^[a-zA-Z\s]+$" class="validate">
      <label for="nombre" data-error="Ingrese bien su nombre, solo letras." data-success="Nombre valido">Nombre</label>
    </div>
    <div class="input-field col s6">
      <i class="material-icons prefix">account_circle</i>
      <input id="last_name" type="text" name="apellidos" pattern="^[a-zA-Z\s]+$"  class="validate">
      <label for="last_name" data-error="Ingrese bien su apellido, solo letras." data-success="Apellido valido">Apellido</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s6">
      <i class="material-icons prefix">assignment_ind</i>
      <input id="username" type="text" name="username" class="validate">
      <label for="username">Username</label>
    </div>
    <div class="input-field col s6">
      <i class="material-icons prefix">lock</i>
      <input id="password" type="password" name="clave" class="validate">
      <label for="password">Contraseña</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s6">
      <i class="material-icons prefix">phone</i>
      <input id="telefono" type="text" name="telefono" pattern="^[0-9]{4}-?[0-9]{4}$"  class="validate">
      <label for="telefono" data-error="telefono incorrecto" data-success="telefono correcto">Telefono</label>
    </div>
    <div class="input-field col s6">
      <i class="material-icons prefix">email</i>
      <input id="email" type="email" name="email" class="validate">
      <label for="email"  data-error="Ingrese bien su correo" data-success="correo correcto">Correo</label>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s6">
      <select name="tipousuario">
        <option value="" disabled selected>Tipo de usuario</option>
        <?php
          while ($fila=$tipousuario->fetch_assoc()) {?>
           <?php echo "<option value='".$fila["Id_Tipo"]."'>".$fila['Nombre_tipo']."</option>";?>
        <?php  }?>
      </select>
    </div>
    <div class="col s6">
            <div class="col s3">
              <p>
                  <input class="with-gap" name="group1" type="radio" id="test1" value="0" required/>
                  <label for="test1">Hombre</label>
              </p>
            </div>
            <div class="col s3">
              <p>
                  <input class="with-gap" name="group1" type="radio" id="test2" value="1" required/>
                  <label for="test2">Mujer</label>
              </p>
            </div>  
    </div>
  </div>

  <div class="row">
  <div class="col s6">
    <div class="input-field">
      <i class="material-icons prefix">perm_contact_calendar</i>
      <input type="date" name="fecha" class="datepicker"/>
      <label for="date">Fecha de nacimiento</label>
    </div>
  </div>
    
    <script type="text/javascript">
        $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
    </script>

     <div class="col s6">

        <div class="file-field input-field">
            <button class="btn red darken-2">
              <i class="material-icons">insert_photo</i>
              <input type="file" name="imagen" id="imagen">
            </button>
            <div class="file-path-wrapper">
              <input class="file-path validate" name="imagen" type="text">
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
    <div class="col s6">
      <!-- Modal Trigger -->
      
      <button data-target="modal1" class="btn-floating btn-large modal-trigger"><i class="material-icons right deep-orange accent-3">view_list</i></button>
    </div>
  </div>

</div>
</form>
</div>
</div>

<div id="modal1" class="modal bottom-sheet">
<div id="vista" class="modal-content">
  <!--Vista-->
   <div class="row">
   <form name="buscar_usuario" method="POST" action="users/ver_usuario.php">
     <div class="input-field col s11">
          <input id="search" type="search" name="usuario" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
          
    </div>
    <div class="input-field col s1">
      <button class="btn-floating btn-large waves-effect waves-light red" type="submit" name="enviar" value="">
        <i class="material-icons right">send</i>
        
      </button> 
    </div>
    </form>
   </div>
   

   <table class="bordered striped highlight responsive-table">

     <thead>
          <tr>
              <th data-field="id">Id</th>
              <th data-field="name">Nombre</th>
              <th data-field="price">Apellidos</th>
              <th data-field="name">Username</th>
              <!--<th data-field="price">Contraseña</th>-->
              <th data-field="name">Teléfono</th>
              <th data-field="price">Correo</th>
              <th data-field="name">Tipo usuario</th>
              <th data-field="price">Sexo</th>
              <th data-field="name">Fecha nacimiento</th>
              <th data-field="name">Foto</th>
              <th data-field="name">Editar</th>
              <th data-field="name">Eliminar</th>
          </tr>
      </thead>


     <tbody>

       <?php

       while ($row = $resultado->fetch_assoc()){ ?>
         <tr>
            <td><?php echo $row["Id_Usuario"];?></td>
            <td><?php echo $row["Nombres"];?></td>
            <td><?php echo $row["Apellidos"];?></td>
            <td><?php echo $row["Username"];?></td>
            <td><?php echo $row["Telefono"];?></td>
            <td><?php echo $row["Email"];?></td>
            <td><?php echo $row["Nombre_tipo"];?></td>
            <td><?php 
            if($row['Sexo'] == 0)
            {
              echo "Hombre";
            }else{
              echo "Mujer";
            }
            ?></td>
            <td><?php echo $row["Fecha_nacimiento"];?></td>
            <td><img class="materialboxed" data-caption="<?php echo $row['Nombres'];?>" width="25" src="users/imagenes/<?php echo $row["Foto_Usuario"];?>"></td>
            <td><a href="users/modificar.php?id=<?php echo $row['Id_Usuario'];?>"><i class="material-icons prefix">mode_edit</i></a></td>
            <td><a href="users/eliminar_usuario.php?id=<?php echo $row['Id_Usuario'];?>"><i class="material-icons prefix">delete</i></a></td>
         </tr>
     <?php  } ?>
     </tbody>
   </table>
   </div>
</div>
   

</section>
