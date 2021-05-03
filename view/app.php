<?php session_start();
  $rutas = array();
  if (isset($_GET['ruta'])) {
      $rutas = explode('/', $_GET['ruta']);
  }?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/af-2.3.6/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/date-1.0.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.css"/>

    <title>Hello, world!</title>
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<div class="container-fluid">
  			<a class="navbar-brand" href="#">
  			      <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
  			      OHLCell
  			    </a>
  			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  				<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
  			</div>
  		</div>
  	</nav>
    <section class="p-5">
      <div class="col-12 d-flex justify-content-end">
        <button class="btn-sm btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addproducts" type="button">Agregar nuevo producto</button>
      </div>
      <table class="table table-hover" id="products">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // $result = ProductController::getRecordsController();
            // for ($i=0; $i < count(ProductController::getRecordsController()); $i++) {

            //   echo '
            //     <tr>
            //       <th scope="row">'.$i.'</th>
            //       <td>'.$result[$i]['name'].'</td>
            //       <td>'.$result[$i]['description'].'</td>
            //       <td>$ '.$result[$i]['price'].'</td>
            //       <td>acciones</td>
            //     </tr>

            //    ';
            // }
          ?>
          <tr></tr>
        </tbody>
      </table>
    </section>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="addproducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form id="FormProducts">
                <div class="mb-3">
                  <label for="name" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Descripción</label>
                  <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Precio</label>
                  <input type="text" class="form-control" name="price" id="price"  oninput="limitDecimalPlaces(event, 2)" onkeypress="return isNumberKey(event)">
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="addProduct">Guarda Producto</button>
            <button type="button" class="btn btn-primary" id="editProduct" style="display: none">Edita Producto</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/af-2.3.6/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/date-1.0.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.js"></script>

    <script>
      var myModalEl = document.getElementById('addproducts')
      const modal = new bootstrap.Modal(myModalEl);
      var products = $('#products').DataTable({
        ajax:{
          url :'/Ajax/ProductAjax.php',
          type: "get",
          data: {"getProducts": 'getProducts'},
          error: function (xhr, error, thrown) {
            products.ajax.reload( null, false )
          },
        },
        responsive: true,
      });

      // $.ajax({
      //     type: 'POST',
      //     url: "/Ajax/ProductAjax.php?getProducts=getProducts",
      //     data: {getProducts: "getProducts"},
      //     beforeSend: function() {
      //       console.log('enviando')
      //     },
      //     success: function(data) {
      //         console.log(data)
      //     },
      //     error: function(xhr) {
      //         alert("Error occured.\n please try again \n " + xhr.statusText + " " +xhr.responseText);
      //     },
      //     complete: function() {

      //     },
      // });
      myModalEl.addEventListener('hidden.bs.modal', function (event) {
        var name = document.getElementById('name')
        var description = document.getElementById('description')
        var price = document.getElementById('price')
        name.value = '';
        description.value = '';
        price.value = '';
        $('#editProduct').removeAttr('product').hide()
      })
      function limitDecimalPlaces(e, count) {
        if (e.target.value.indexOf('.') == -1) { return; }
        if ((e.target.value.length - e.target.value.indexOf('.')) > count) {
          e.target.value = parseFloat(e.target.value).toFixed(count);
        }
      }

      function isNumberKey(evt)
      {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
          return false;

        return true;
      }
      $(document).on('click', '#addProduct', function(event) {
        event.preventDefault();
        if ($('#name').val() == '' || $('#description').val() == '' || $('#price').val() == '' ) {
          alert("llena todos los campos");
          return;

        }
        var data = new FormData($('form')[0]);
        data.append('addProduct', 'addProduct')
        $.ajax({
            type: 'POST',
            url: "/Ajax/ProductAjax.php",
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function() {
              console.log('enviando')
            },
            success: function(data) {
                //console.log(data)
                var dataParse = JSON.parse(data)
                if (dataParse.hecho == 1) {
                  alert('Producto agregado con exito')
                  $('#products').DataTable().ajax.reload();
                  modal.hide()
                }
            },
            error: function(xhr) {
                alert("Error occured.\n please try again \n " + xhr.statusText + " " +xhr.responseText);
            },
            complete: function() {

            }
        });

      });
      $(document).on('click', '.delete', function(event) {
        event.preventDefault();
        var data = new FormData();
        data.append('deleteProduct', 'deleteProduct')
        data.append('delete', $(this).attr('delete'))
        $.ajax({
            type: 'POST',
            url: "/Ajax/ProductAjax.php",
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function() {
              console.log('enviando')
            },
            success: function(data) {
                if (data == 'ok') {
                  alert('Producto eliminado con exito')
                  $('#products').DataTable().ajax.reload();
                }
            },
            error: function(xhr) {
                alert("Error occured.\n please try again \n " + xhr.statusText + " " +xhr.responseText);
            },
            complete: function() {

            }
        });
      });
      $(document).on('click', '.edit', function(event) {
        event.preventDefault();
        var data = new FormData();
        data.append('editProduct', 'editProduct')
        data.append('id', $(this).attr('edit'))
        $.ajax({
            type: 'POST',
            url: "/Ajax/ProductAjax.php",
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function() {
              console.log('enviando')
            },
            success: function(data) {
                var dataParse = JSON.parse(data)
                console.log("dataParse", dataParse);
                $('#name').val(dataParse.name)
                $('#description').val(dataParse.description)
                $('#price').val(dataParse.price)
                $('#editProduct').attr('product', dataParse.id).show()
                $('#addProduct').hide()
                modal.show()
            },
            error: function(xhr) {
                alert("Error occured.\n please try again \n " + xhr.statusText + " " +xhr.responseText);
            },
            complete: function() {
            }
        });

      });
      $(document).on('click', '#editProduct', function(event) {
        event.preventDefault();
        if ($('#name').val() == '' || $('#description').val() == '' || $('#price').val() == '' ) {
          alert("llena todos los campos");
          return;

        }
        var data = new FormData($('form')[0]);
        data.append('updateProduct', 'updateProduct')
        data.append('id', $(this).attr('product'))
        $.ajax({
            type: 'POST',
            url: "/Ajax/ProductAjax.php",
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function() {
              console.log('enviando')
            },
            success: function(data) {
              console.log("data", data);
                if (data == 1) {
                  alert('Producto editado con exito')
                  $('#products').DataTable().ajax.reload();
                  modal.hide()
                }
            },
            error: function(xhr) {
                alert("Error occured.\n please try again \n " + xhr.statusText + " " +xhr.responseText);
            },
            complete: function() {

            }
        });

      });
    </script>
  </body>
</html>