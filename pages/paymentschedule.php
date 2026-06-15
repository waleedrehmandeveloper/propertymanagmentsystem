<?php
session_start();
require_once("../config/db.php");
require_once("../auth/auth.php");
chekLogin();
sellerStatusChecked();
?>
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
    .seo-table thead th {
      border: none;
      color: #94a3b8;
      font-size: 13px;
      font-weight: 600;
      padding-bottom: 18px;
      white-space: nowrap;
    }

    .seo-table tbody td {
      border-top: 1px solid #f1f5f9;
      padding: 16px 15px;
      vertical-align: middle;
      white-space: nowrap;
      color: #334155;
    }

    .seo-table tbody tr:hover {
      background: #f8fafc;
    }

    .status-badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      display: inline-block;
    }

    /* buttons */
    .table-btn {
      border: none;
      background: #f8fafc;
      width: 36px;
      height: 36px;
      border-radius: 10px;
      color: #64748b;
      transition: .2s;
    }

    .table-btn:hover {
      background: #213b2e;
      color: white;
    }

    .btn-save {
      background: linear-gradient(to right, #213b2e, #2f5a45);
      border: none;
      color: white;
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

          <div class="card border-0 shadow-sm">
            <div class="card-body">

              <!-- HEADER -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 font-weight-bold">Installment Schedule</h5>

                <button class="btn btn-save">
                  <i class="fas fa-plus mr-1"></i>
                  Add Payment
                </button>
              </div>

              <div class="table-responsive">

                <table class="table seo-table mb-0">

                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Client</th>
                      <th>Project</th>
                      <th>Unit</th>
                      <th>Due Date</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>

                  <tbody>

                    <tr>
                      <td>1</td>

                      <td>
                        <div>
                          <h6 class="mb-0">Muhammad Ali</h6>
                          <small>42101-1234567-1</small>
                        </div>
                      </td>

                      <td>Green Valley Heights</td>

                      <td>A-302</td>

                      <td>01-07-2026</td>

                      <td>166,666</td>

                      <td>
                        <span class="status-badge bg-danger text-white">
                          Unpaid
                        </span>
                      </td>

                      <td class="text-center">

                        <button class="table-btn">
                          <i class="fas fa-eye"></i>
                        </button>

                        <button class="table-btn">
                          <i class="fas fa-check"></i>
                        </button>

                      </td>
                    </tr>

                    <tr>
                      <td>2</td>

                      <td>
                        <div>
                          <h6 class="mb-0">Muhammad Ali</h6>
                          <small>42101-1234567-1</small>
                        </div>
                      </td>

                      <td>Green Valley Heights</td>

                      <td>A-302</td>

                      <td>01-08-2026</td>

                      <td>166,666</td>

                      <td>
                        <span class="status-badge bg-warning text-dark">
                          Pending
                        </span>
                      </td>

                      <td class="text-center">

                        <button class="table-btn">
                          <i class="fas fa-eye"></i>
                        </button>

                        <button class="table-btn">
                          <i class="fas fa-check"></i>
                        </button>

                      </td>
                    </tr>

                  </tbody>

                </table>

              </div>

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