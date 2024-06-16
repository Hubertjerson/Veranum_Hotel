<div class="content-wrapper" style="min-height: 717px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gestor de Productos de Restaurante</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">

    <div class="card card-primary card-outline">
       
       <div class="card-header pl-2 pl-sm-3">
        
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearProducto">Crear nuevo producto</button>

      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped">
        
          <thead>

            <tr>

              <th style="width:10px">#</th> 
              <th>Nombre</th>
              <th>Precio</th>
              <th>stock</th>
              <th style="width:100px">Acciones</th>          

            </tr>   

          </thead>

          <tbody>

            <!-- Producto 1 -->
            <tr>
              <td>1</td>
              <td>Pollo</td>
              <td>$12.990</td>
              <td>9</td>
              <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarProducto">Editar</button>
                <button class="btn btn-danger btn-sm">Eliminar</button>
              </td>
            </tr>

            <!-- Producto 2 -->
            <tr>
              <td>1</td>
              <td>limón</td>
              <td>$12.990</td>
              <td>7</td>
              <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarProducto">Editar</button>
                <button class="btn btn-danger btn-sm">Eliminar</button>
              </td>
            </tr>

            <!-- Producto 3 -->
            <tr>
              <td>2</td>
              <td>sal</td>
              <td>$8.990</td>
              <td>3</td>
              <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarProducto">Editar</button>
                <button class="btn btn-danger btn-sm">Eliminar</button>
              </td>
            </tr>

            <!-- Producto 4 -->
            <tr>
              <td>2</td>
              <td>crutones</td>
              <td>$8.990</td>
              <td>9</td>
              <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarProducto">Editar</button>
                <button class="btn btn-danger btn-sm">Eliminar</button>
              </td>
            </tr>

            <!-- Producto 5 -->
            <tr>
              <td>2</td>
              <td>Lechuga</td>
              <td>$8.990</td>
              <td>8</td>
              <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarProducto">Editar</button>
                <button class="btn btn-danger btn-sm">Eliminar</button>
              </td>
            </tr>

          </tbody>

        </table>

      </div>
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>

<!-- Modal Crear Producto -->
<div class="modal" id="crearProducto">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h4 class="modal-title">Crear Producto de Restaurante</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div class="input-group mb-3">
         
          <div class="input-group-append input-group-text">
            <span class="fas fa-utensils"></span>
          </div>

          <input type="text" class="form-control" name="nombreProducto" placeholder="Nombre del Producto" required> 

        </div>


        <div class="input-group mb-3">
         
          <div class="input-group-append input-group-text">
            <span class="fas fa-dollar-sign"></span>
          </div>

          <input type="text" class="form-control" name="precioProducto" placeholder="Precio del Producto" required> 

        </div>

        <div class="form-group">
          <label>Stock:</label>
          <textarea class="form-control" name="ingredientesProducto" placeholder="Ingrese la cantidad" required></textarea>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer d-flex justify-content-between">

        <div>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>

        <div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

      </div>

      </form>

    </div>

  </div>

</div>

<!-- Modal Editar Producto -->
<div class="modal" id="editarProducto">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h4 class="modal-title">Editar Producto de Restaurante</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <input type="hidden" class="form-control" name="idProducto">

        <div class="input-group mb-3">
         
          <div class="input-group-append input-group-text">
            <span class="fas fa-utensils"></span>
          </div>

          <input type="text" class="form-control" name="editarNombreProducto" required> 

        </div>

        <div class="input-group mb-3">
         
          <div class="input-group-append input-group-text">
            <span class="fas fa-dollar-sign"></span>
          </div>

          <input type="text" class="form-control" name="editarPrecioProducto" required> 

        </div>

        <div class="form-group">
          <label>stock:</label>
          <input class="form-control" name="editarIngredientesProducto" required></input>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer d-flex justify-content-between">

        <div>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>

        <div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

      </div>

      </form>

    </div>

  </div>

</div>
