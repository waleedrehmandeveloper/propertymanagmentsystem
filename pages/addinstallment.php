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
         <div class="container-fluid" id="container-wrapper">
            <div class="container-fluid" id="container-wrapper">
  <div class="card shadow-sm border-0 p-4">

    <!-- TITLE -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="mb-0 fw-bold">ADD INSTALLMENT PLAN</h4>
    </div>

    <form>
      <div class="row">

        <!-- PLAN INFO -->
        <div class="col-md-4 mb-2">
          <input type="text" class="form-control custom-input" placeholder="Plan Name * (e.g 2 Years Plan)">
        </div>

        <div class="col-md-4 mb-2">
          <input type="number" class="form-control custom-input" placeholder="Duration (Months) *">
        </div>

        <div class="col-md-4 mb-2">
          <select class="form-control custom-input">
            <option selected disabled>Payment Frequency *</option>
            <option>Monthly</option>
            <option>Quarterly</option>
            <option>Half Yearly</option>
          </select>
        </div>

        <!-- OPTIONAL -->
        <div class="col-md-6 mb-2">
          <input type="number" class="form-control custom-input" placeholder="Late Fine (optional)">
        </div>

        <div class="col-md-6 mb-2">
          <select class="form-control custom-input">
            <option selected disabled>Status</option>
            <option>Active</option>
            <option>Inactive</option>
          </select>
        </div>

        <!-- DESCRIPTION -->
        <div class="col-md-12 mb-2">
          <textarea class="form-control custom-input" rows="3" placeholder="Description (optional)"></textarea>
        </div>

        <!-- BUTTON -->
        <div class="col-12 d-flex justify-content-end mt-3">
          <button class="btn btn-save px-4">
            Save Plan
          </button>
        </div>

      </div>
    </form>

  </div>
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
</body>

</html>