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
    .project-portrait-card{
  background-color: white;
  color: #fff;
  border-radius: 25px;
  padding: 16px;
  min-height: 400px;
  position: relative;
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
  transition: 0.3s;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
/* .cardborder{
    background: linear-gradient(145deg, #2d684d, #2d584d);
    padding: 40px 2px;
    border-radius: 30px; */
/* 
} */

.project-portrait-card h5{
  margin-top: 25px;
  font-weight: 600;
}

.project-portrait-card .info p{
  margin: 4px 0;
  font-size: 13px;
  opacity: 0.9;
}

.project-portrait-card .info span{
  font-weight: 600;
}

.status-tag{
  position: absolute;
  top: 12px;
  right: 12px;
  font-size: 11px;
  padding: 4px 10px;
  border-radius: 20px;
  background: #ffc107;
  color: #000;
}

.status-tag.active{
  background: #17a2b8;
  color: #fff;
}

.status-tag.completed{
  background: #28a745;
  color: #fff;
}

.bottom{
  display: flex;
  justify-content: space-between;
  margin-top: 10px;
}

.viewbtn{
    background: linear-gradient(145deg, #2d684d, #2d584d);
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
    <!-- PROJECTS LIST SECTION -->
<div class="container-fluid mt-4">

  <div class="row">

    <?php
require_once("../config/db.php");

$query = "SELECT id, unit_no, floor, type, total_price, project_name, status FROM plots ORDER BY id <DESC></DESC>";
$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
?>
    <div class="col-md-3 mb-4">
        <div class="cardborder">
            <div class="project-portrait-card">

                <div class="status-tag <?= strtolower($row['status']) ?>">
                    <?= ucfirst($row['status']) ?>
                </div>

                <h5><?= htmlspecialchars($row['project_name']) ?></h5>

                <div class="info">
                    <p><span>Unit No:</span> <?= htmlspecialchars($row['unit_no']) ?></p>
                    <p><span>Type:</span> <?= htmlspecialchars($row['type']) ?></p>
                    <p><span>Floor:</span> <?= htmlspecialchars($row['floor']) ?></p>
                    <p><span>Price:</span> Rs <?= number_format($row['total_price']) ?></p>
                </div>

                <div class="bottom">
                    <a href="view_project.php?id=<?= $row['id'] ?>" class="btn viewbtn">
                        View
                    </a>
                </div>

            </div>
        </div>
    </div>
<?php
}

$stmt->close();
?>

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