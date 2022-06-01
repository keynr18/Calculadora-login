<?php 
    
     if (!isset($_SESSION['usuario']) || !isset($_SESSION['pass'])) {
        return header('location:session');
     }
 ?>


<h2 class="container display-4 text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-xm-12 mt-4">
                <img class="img-fluid" src="Vista/img/riesgocero2.jpeg">
            </div>
        </div>
  </h2>
 
  <div class="container mt-2 bloque1">

      <div class="row mb-3 justify-content-center">
        <div class="col-md-4 col-lg-4 text-center ">
              <select id="paises" name="paises" class="form-control">
              
            </select>
        </div> 
      </div>

      <div class="row justify-content-center">
        <label class="col-md-4 col-lg-4 text-center"><p class="casilla pt-2 pb-2">Tasa de Cambio</p>
              <input type="" value="" id="taza" class="form-control">
        </label> 

        <label class="col-md-4 col-lg-4 text-center"><p class="casilla pt-2 pb-2">Precio del dolar</p>
              <input type="text"  name="" id="precio" placeholder="" class="form-control">
        </label>
      </div>
  </div>

  <div class="container mb-3 mt-2 bloque2">

    <div class="row justify-content-center mb-2">

        <div class="col-lg-6 text-center">

          <div class="row">
            <div class=" mb-1 mt-1 col-xm-6 col-sm-6 col-md-3 col-lg-3 justify-content-center">
              <button class="btn casilla" id="agregarp">Insertar</button>
            </div>
            <div class=" mb-1 mt-1 col-xm-6 col-sm-6 col-md-3 col-lg-3">
              <button class="btn casilla" id="actualizar">Actualizar</button>
            </div>
            <div class=" mb-1 mt-1 col-xm-6 col-sm-6 col-md-3 col-lg-3 ">
               <button class="btn casilla" id="eliminarp">Eliminar</button>
            </div>
            <div class=" mb-1 mt-1 col-xm-6 col-sm-6 col-md-3 col-lg-3 ">
              <a href="controladorcerrarsesion"><button class="btn casilla" id="">Salir</button></a>
            </div>
          </div>
        </div>
    </div><!--PRIMERA FILA-->
  </div>

<!-- formulario para agregar un nuevo pais-->
<div class="container mt-2 bloque3" style="display:none;">

      <div class="row justify-content-center">
        <label class="col-md-4 col-lg-4 text-center"><p class="casilla pt-2 pb-2">Nombre del Pais</p>
              <input type="" value="" id="nombrepais" class="form-control">
        </label> 

        <label class="col-md-4 col-lg-4 text-center"><p class="casilla pt-2 pb-2">Nombre de la Moneda</p>
              <input type="text"  name="" id="nombremoneda" placeholder="" class="form-control">
        </label>
      </div>

      <div class="row justify-content-center">
        <label class="col-md-4 col-lg-4 text-center"><p class="casilla pt-2 pb-2">Taza de Cambio</p>
              <input type="" value="" id="taza2" class="form-control">
        </label> 

        <label class="col-md-4 col-lg-4 text-center"><p class="casilla pt-2 pb-2">Precio del Dolar</p>
              <input type="text"  name="" id="precio2" placeholder="" class="form-control">
        </label>
      </div>

      <div class="row justify-content-center mb-2">

       <div class="col-md-4 col-lg-4">

          <div class="row">
            <div class=" mb-1 mt-1 col-xm-6 col-sm-6 col-md-6 col-lg-6 text-center">
              <button class="btn casilla" id="guardar">Guardar</button>
            </div>
            <div class=" mb-1 mt-1 col-xm-6 col-sm-6 col-md-6 col-lg-6 text-center">
              <button class="btn casilla" id="atras">Atras</button>
            </div>
          </div>
        </div>
    </div>
</div>