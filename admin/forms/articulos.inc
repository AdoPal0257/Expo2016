<section id="articulos" class="section">
    <div class="container">
         <h1>Articulos</h1>
         <div class="divider"></div>
<div id="all">
<div class="row">
    <form class="col s12">
      <div class="row">
         <div class="input-field col s4">
            <i class="material-icons prefix">loyalty</i>
          <input id="last_name" type="text" pattern="^[a-zA-Z\s]+$" class="validate">
          <label for="last_name" data-error="Ingrese bien el nombre, solo letras." data-success="Nombre valido">Nombre</label>
        </div>
        <div class="input-field col s4">
        <i class="material-icons prefix">shopping_cart</i>
          <input id="last_name" type="number" pattern="^[0-9\.]+$"  class="validate">
          <label for="last_name" data-error="Ingrese bien el precio, solo números." data-success="Precio valido">Precio</label>
        </div>
      <div class="input-field col s4">
            <i class="material-icons prefix">description</i>
               <input id="last_name" type="text" pattern="^[a-zA-Z\s]+$"  class="validate">
          <label for="last_night" data-error="Ingrese bien la descripción, solo letras" data-success="Descripción correcta">Descripción</label>
        </div>
      </div>
    </form>
  </div>
  <div class="row">
    <form class="col s12">
   <div  class="input-field col s6">
     <i class="material-icons prefix">list</i>
    <select>
      <option value="" disabled selected>Elija un tipo</option>
      <option value="1">Tipo 1</option>
      <option value="2">Tipo 2</option>
      <option value="3">Tipo 3</option>
      <option value="4">Tipo 4</option>
    </select>
    <label>Tipo</label>
</div>

 <script type="text/javascript">
   $(document).ready(function() {
    $('select').material_select();
  });
            </script>
<div class=" input-field col s6">
  <i class="material-icons prefix">import_export</i>
          <input id="number" type="number" pattern="^[0-9\.]+$"  class="validate">
     <label for="number" data-error="Ingrese bien la cantidad, solo números." data-success="Cantidad valido">Cantidad</label>
   </div>
  </form>


  </div>

  
<div class="row">
    <form class="col s6">
      <i class="material-icons prefix">today</i>
    <input type="date" class="datepicker" >
    <label for="last_name">Fecha inicio</label>
</form>
 <form class="col s6">
  <i class="material-icons prefix">today</i>
    <input type="date" class="datepicker" >
    <label for="last_name">Fecha fin</label>
</form>
</div>
<script type="text/javascript">
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
        </script>
<a class="waves-effect waves-light btn"><i class="material-icons left">done_all</i>Enviar</a>
<a class="waves-effect waves-light btn" ><i class="material-icons left">replay</i>Limpiar</a>
</div>
</div>
    </section>