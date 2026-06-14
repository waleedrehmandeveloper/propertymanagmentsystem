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
    .seo-table thead th{
    border: none;
    color: #94a3b8;
    font-size: 13px;
    font-weight: 600;
    padding-bottom: 18px;
    white-space: nowrap;
}

.seo-table tbody td{
    border-top: 1px solid #295c45;
    padding: 18px 15px;
    vertical-align: middle;
    white-space: nowrap;
    color: #334155;
}

.seo-table tbody tr{
    transition: .2s;
}

.seo-table tbody tr:hover{
    background: #f8fafc;
}

.status-badge{
    background: #dcfce7;
    color: #16a34a;
    padding: 7px 14px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
}

.table-btn{
    border: none;
    background: #f8fafc;
    width: 36px;
    height: 36px;
    border-radius: 10px;
    color: #64748b;
    transition: .2s;
}

.table-btn:hover{
    background: #213b2e;
    color: white;
}

.btn-save{
    background: linear-gradient(to right,#213b2e,#2f5a45);
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
       <?php require_once("../config/db.php"); ?>

<div class="container-fluid" id="container-wrapper">
    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0 font-weight-bold">Sales</h5>
                <button class="btn btn-save">
                    <i class="fas fa-plus mr-1"></i> Add Sale
                </button>
            </div>

            <div class="table-responsive">
                <table class="table seo-table mb-0">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Client</th>
                            <th>Project</th>
                            <th>Unit</th>
                            <th>Total</th>
                            <th>Down</th>
                            <th>Monthly</th>
                            <th>Paid</th>
                            <th>Remaining</th>
                            <th>Method</th>
                            <th>Plan</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT 
                                s.id,
                                s.invoice_no,
                                s.total_amount,
                                s.down_payment,
                                s.payment_plan,
                                s.monthly_installment,
                                s.paid_amount,
                                s.remaining_amount,
                                s.payment_method,
                                s.sale_date,
                                s.status,
                                c.name AS client_name,
                                c.cnic,
                                p.project_name,
                                p.unit_no
                              FROM sales s
                              JOIN clients c ON s.client_id = c.id
                              JOIN plots p ON s.plot_id = p.id
                              ORDER BY s.id DESC";

                    $result = $conn->query($query);

                    if($result->num_rows > 0):
                        while($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?= $row['invoice_no'] ?></td>

                            <td>
                                <div>
                                    <h6 class="mb-0"><?= $row['client_name'] ?></h6>
                                    <small><?= $row['cnic'] ?></small>
                                </div>
                            </td>

                            <td><?= $row['project_name'] ?></td>

                            <td><?= $row['unit_no'] ?></td>

                            <td><?= number_format($row['total_amount']) ?></td>

                            <td><?= number_format($row['down_payment']) ?></td>

                            <td>
                                <?= $row['payment_plan'] == 0 
                                    ? 'Full' 
                                    : number_format($row['monthly_installment']) 
                                ?>
                            </td>

                            <td><?= number_format($row['paid_amount']) ?></td>

                            <td><?= number_format($row['remaining_amount']) ?></td>

                            <td><?= $row['payment_method'] ?></td>

                            <td>
                                <?= $row['payment_plan'] == 0 
                                    ? 'Full Payment' 
                                    : $row['payment_plan'] . ' Months' 
                                ?>
                            </td>

                            <td><?= date('d-m-Y', strtotime($row['sale_date'])) ?></td>

                            <td>
                                <span class="status-badge <?= $row['status'] == 'complete' ? 'badge-success' : 'badge-warning' ?>">
                                    <?= ucfirst($row['status']) ?>
                                </span>
                            </td>

                            <td class="text-center">
                                <button class="table-btn" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="table-btn" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="table-btn print-receipt" 
                                        data-id="<?= $row['id'] ?>" title="Receipt">
                                    <i class="fas fa-print"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
                        endwhile;
                    else:
                    ?>
                        <tr>
                            <td colspan="14" class="text-center">Koi sale nahi mili</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
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
  
  <script>
    $(document).ready(function(){
        $(".print-receipt").click(function(){
            var saleId = $(this).data("id");
            window.open("http://localhost/demosoftware/pages/receipt.php?sale_id=" + saleId, "_blank");
        });
    });
  </script>
</body>

</html>