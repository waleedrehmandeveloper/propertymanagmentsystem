<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../assets/img/logo/logo.png" rel="icon">
  <title>Managment Software</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/ruang-admin.css" rel="stylesheet">
  <style>
    .custom-input{
    border-radius: 10px;
    padding: 10px 12px;
    border: 1px solid #e5e5e5;
    box-shadow: none;
    font-size: 14px;
    }

    .custom-input:focus{
    border-color: #213b2e;
    box-shadow: 0 0 0 0.15rem rgba(33,59,46,0.15);
    }

    .btn-save{
    background: linear-gradient(to right, #213b2e, #2f5a45);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-weight: 500;
    }

    .btn-save:hover{
    opacity: 0.9;
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php
    include("../compoents/sidebar.php");
    ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php
        include("../compoents/navbar.php");
        ?>
        <!-- Topbar -->
<!-- ADD PROJECTS CARD -->
<!-- ADD CLIENT CARD -->
<div class="container-fluid" id="container-wrapper">
  <div class="card shadow-sm border-0 p-4">

    <!-- TITLE -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="mb-0 fw-bold">ADD PROJECTS</h4>
  </div>
  <form id="addPlotForm">
  <div class="row">

    <div class="col-md-6 mb-2">
      <input id="projectName" type="text" name="project_name" class="form-control custom-input" placeholder="Project Name *">
    </div>

    <div class="col-md-6 mb-2">
      <input id="unitNo" type="text" name="unit_no" class="form-control custom-input" placeholder="Unit Number *">
    </div>

    <div class="col-md-4 mb-2">
      <input id="floor" type="text" name="floor" class="form-control custom-input" placeholder="Floor">
    </div>

    <div class="col-md-4 mb-2">
      <select id="unitType" name="type" class="form-control custom-input">
        <option selected disabled>Unit Type *</option>
        <option>Flat</option>
        <option>Shop</option>
        <option>Office</option>
        <option>Plot</option>
      </select>
    </div>

    <div class="col-md-4 mb-2">
      <input id="totalPrice" type="number" name="total_price" class="form-control custom-input" placeholder="Total Price *">
    </div>

    <div class="col-12 d-flex justify-content-end mt-3">
      <button id="savePlotBtn" type="submit" class="btn btn-save px-4">
        Save Plot
      </button>
    </div>

  </div>
</form>
  </div>
</div>
</div>
</div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="../assets/js/demo/chart-area-demo.js"></script> 

  <script src="pages/vendor/jquery/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#addPlotForm').on('submit', function(e) {
        e.preventDefault();

        const data = {
          project_name: $('#projectName').val(),
          unit_no: $('#unitNo').val(),
          floor: $('#floor').val(),
          type: $('#unitType').val(),
          total_price: $('#totalPrice').val()
        };

        $.ajax({
          url: '../ajax/addprojects.php',
          method: 'POST',
          data: data,
          success: function(response) {
            alert('Project added successfully!');
            $('#addPlotForm')[0].reset();
          },
          error: function() {
            alert('Error adding project. Please try again.');
          }
        });
      });
    }); 
  </script>
</body>

</html>