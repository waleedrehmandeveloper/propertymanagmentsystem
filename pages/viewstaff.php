<?php
require("../config/db.php");

$query = "SELECT id, username, email, phone, status, created_at, role 
          FROM login  WHERE role='sales'
          ORDER BY created_at DESC";

$result = $conn->query($query);
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
                                <h5 class="mb-0 font-weight-bold">Users</h5>

                                <a href="addseller.php" class="btn btn-save btn-success">
                                    <i class="fas fa-plus mr-1"></i>
                                    Add User
                                </a>
                            </div>

                            <div class="table-responsive">

                                <table class="table seo-table mb-0">

                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Status</th>
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
                                                            <small>
                                                                <?= htmlspecialchars($row['id']) ?>
                                                            </small>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <h6 class="mb-0">
                                                                <?= htmlspecialchars($row['username']) ?>
                                                            </h6>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <small>
                                                            <?= htmlspecialchars($row['email']) ?>
                                                        </small>
                                                    </td>

                                                    <td>
                                                        <?= htmlspecialchars($row['phone']) ?>
                                                    </td>

                                                    <td>
                                                        <?= ucfirst($row['role']) ?>
                                                    </td>

                                                    <td>
                                                        <span class="badge bg-danger text-white" id="status<?= $row['id'] ?>">
                                                            Active
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <?= date("d M Y", strtotime($row['created_at'])) ?>
                                                    </td>
                                                    <td class="text-center">

                                                        <button
                                                            data-id="<?= $row['id'] ?>"
                                                            data-status="<?= $row['status'] ?>"
                                                            class="table-btn blockBtn">

                                                            <?php if ($row['status'] == "active") { ?>
                                                                <i class="fas fa-user-slash text-danger"></i>
                                                            <?php } else { ?>
                                                                <i class="fas fa-user-check text-success"></i>
                                                            <?php } ?>

                                                        </button>

                                                    </td>

                                                </tr>

                                            <?php } ?>

                                        <?php } else { ?>

                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    No Users Found
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
        <script src="vendor/jquery/jquery.min.js"></script>
        <script>
            $(document).on("click", ".blockBtn", function() {

                let btn = $(this);
                let id = btn.attr("data-id");
                let status = $("#status" + id);

                $.ajax({
                    url: "../ajax/updateStatus.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        id: btn.attr("data-id"),
                        status: btn.attr("data-status")
                    },

                    success: function(response) {

                        if (response.success) {

                            btn.attr("data-status", response.newStatus);

                            if (response.newStatus == "active") {
                                btn.html('<i class="fas fa-user-slash text-danger"></i>');
                                status.html('<span class="badge badge-danger">Inactive</span>');
                            } else {
                                btn.html('<i class="fas fa-user-check text-success"></i>');
                                status.html('<span class="badge badge-success">Active</span>');
                            }

                        } else {
                            alert(response.message);
                        }

                    }
                });

            });
        </script>
</body>

</html>