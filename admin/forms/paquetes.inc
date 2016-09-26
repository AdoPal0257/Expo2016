 <section id="paquetes">
    <div class="container">
        <h1>Paquetes</h1>
        <div class="divider"></div>
<div id="all">
<div class="row">
    <form class="col s12">
      <div class="row">
         <div class="input-field col s4">
            <i class="material-icons prefix">mode_edit</i>
          <input id="last_name" type="text" pattern="^[a-zA-Z\s]+$" class="validate">
          <label for="last_name" data-error="Ingrese bien el nombre, solo letras." data-success="Nombre valido">Nombre</label>
        </div>
        <div class="input-field col s4">
        <i class="material-icons prefix">shopping_cart</i>
          <input id="last_name" type="number" pattern="^[0-9\.]+$"  class="validate">
          <label for="last_name" data-error="Ingrese bien el precio, solo números." data-success="Precio valido">Precio</label>
        </div>
      <div class="input-field col s4">
            <i class="material-icons prefix">speaker_notes</i>
               <input id="last_name" type="text" pattern="^[a-zA-Z\s-,]+$"  class="validate">
          <label for="last_night" data-error="Ingrese bien la descripción, solo letras" data-success="Descripción correcta">Incluye</label>
        </div>
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