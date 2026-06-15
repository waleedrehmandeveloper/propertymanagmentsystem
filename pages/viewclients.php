<?php
session_start();
require_once("../config/db.php");
require_once("../auth/auth.php");
chekLogin();
sellerStatusChecked();

$query = "SELECT id, name, father_name, phone, cnic, created_at FROM clients ORDER BY id DESC";

$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->get_result();
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
            border-top: 1px solid #295c45;
            padding: 18px 15px;
            vertical-align: middle;
            white-space: nowrap;
            color: #334155;
        }

        .seo-table tbody tr {
            transition: .2s;
        }

        .seo-table tbody tr:hover {
            background: #f8fafc;
        }

        .status-badge {
            background: #dcfce7;
            color: #16a34a;
            padding: 7px 14px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
        }

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
            background: linear-gradient(to right, #213b2e, #2d694e);
            border: none;
            color: white;
            color: #fff;
            border: none;
            border-radius: 30px;
            font-weight: 500;
            padding: 10px 30px;
        }

        .view-btn:hover {
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

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0 font-weight-bold">Clients</h5>

                                <a href="addclients.php" class="btn btn-save">
                                    <i class="fas fa-plus mr-1"></i>
                                    Add Client
                                </a>
                            </div>

                            <div class="table-responsive">

                                <table class="table seo-table mb-0">

                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Phone</th>
                                            <th>CNIC</th>
                                            <th>Created At</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php if ($result && $result->num_rows > 0) { ?>

                                            <?php while ($row = $result->fetch_assoc()) { ?>

                                                <tr>
                                                    <td>
                                                        <div>
                                                            <h6 class="mb-0">
                                                                <?= htmlspecialchars($row['name']) ?>
                                                            </h6>
                                                            <small>
                                                                <?= htmlspecialchars($row['father_name']) ?>
                                                            </small>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <?= htmlspecialchars($row['phone']) ?>
                                                    </td>

                                                    <td>
                                                        <?= htmlspecialchars($row['cnic']) ?>
                                                    </td>

                                                    <td>
                                                        <?= date("d M Y", strtotime($row['created_at'])) ?>
                                                    </td>

                                                    <td class="text-center">

                                                        <button class="table-btn">
                                                            <i class="fas fa-eye"></i>
                                                        </button>

                                                        <button class="table-btn">
                                                            <i class="fas fa-edit"></i>
                                                        </button>

                                                    </td>
                                                </tr>

                                            <?php } ?>

                                        <?php } else { ?>

                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    No Clients Found
                                                </td>
                                            </tr>

                                        <?php } ?>

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