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
    .project-card{
    background: #fff;
    border-radius: 16px;
    padding: 18px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.06);
    transition: 0.3s;
    height: 100%;
}

.project-card:hover{
    transform: translateY(-5px);
}

.status{
    font-size: 11px;
    padding: 5px 10px;
    border-radius: 20px;
    display: inline-block;
    margin-bottom: 10px;
    font-weight: 600;
}

.upcoming{
    background: #fff3cd;
    color: #856404;
}

.active{
    background: #d1e7dd;
    color: #0f5132;
}

.completed{
    background: #e2e3e5;
    color: #41464b;
}

.project-card h5{
    font-weight: 700;
    margin-bottom: 10px;
}

.meta p{
    margin: 0;
    font-size: 13px;
    color: #6b7280;
}

.plans{
    margin-top: 12px;
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}

.plan{
    font-size: 12px;
    padding: 5px 10px;
    background: #f1f5f9;
    border-radius: 20px;
    color: #334155;
}

.view-btn{
    margin-top: 15px;
    width: 100%;
    padding: 8px;
    border: none;
    border-radius: 10px;
    background: linear-gradient(to right,#213b2e,#2f5a45);
    color: white;
    font-weight: 500;
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
    <div class="container-fluid mt-4" id="container-wrapper">

  <div class="row">

    <!-- CARD -->
    <div class="col-md-3 mb-4">

      <div class="project-card">

        <!-- STATUS -->
        <div class="status upcoming">Upcoming</div>

        <!-- TITLE -->
        <h5>Green Valley Heights</h5>

        <div class="meta">
          <p>Code: PRJ-001</p>
          <p>Type: Apartment</p>
          <p>City: Karachi</p>
          <p>Floors: 12</p>
        </div>

        <!-- PLANS -->
        <div class="plans">
          <span class="plan">1 Year</span>
          <span class="plan">2 Years</span>
          <span class="plan">3 Years</span>
          <span class="plan">4 Years</span>
        </div>

        <!-- BUTTON -->
        <button class="view-btn">View Plans</button>

      </div>

    </div>


    <!-- CARD 2 -->
    <div class="col-md-3 mb-4">

      <div class="project-card">

        <div class="status active">Active</div>

        <h5>Skyline Residency</h5>

        <div class="meta">
          <p>Code: PRJ-002</p>
          <p>Type: Commercial</p>
          <p>City: Karachi</p>
          <p>Floors: 20</p>
        </div>

        <div class="plans">
          <span class="plan">2 Years</span>
          <span class="plan">3 Years</span>
        </div>

        <button class="view-btn">View Plans</button>

      </div>

    </div>


    <!-- CARD 3 -->
    <div class="col-md-3 mb-4">

      <div class="project-card">

        <div class="status completed">Completed</div>

        <h5>Metro Business Hub</h5>

        <div class="meta">
          <p>Code: PRJ-003</p>
          <p>Type: Mixed</p>
          <p>City: Karachi</p>
          <p>Floors: 8</p>
        </div>

        <div class="plans">
          <span class="plan">Sold Out</span>
        </div>

        <button class="view-btn">View Plans</button>

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