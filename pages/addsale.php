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
        <?php require_once("../config/db.php"); ?>
         <div class="card shadow-sm border-0 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 fw-bold">ADD SALES</h4>
        </div>
        <form id="saleForm">
        <div class="row">

            <!-- Client Dropdown -->
            <div class="col-md-6 mb-2">
            <select name="client_id" id="clientSelect" class="form-control custom-input">
                <option value="">Select Client *</option>
                <?php
                $clients = $conn->query("SELECT id, name FROM clients");
                while($row = $clients->fetch_assoc()){
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
            </div>

            <!-- Plot Dropdown -->
            <div class="col-md-6 mb-2">
            <select name="plot_id" id="plotSelect" class="form-control custom-input">
                <option value="">Select Plot *</option>
                <?php
                $plots = $conn->query("SELECT id, project_name, unit_no, total_price FROM plots WHERE status = 'available'");
                while($row = $plots->fetch_assoc()){
                    echo "<option value='{$row['id']}' data-price='{$row['total_price']}'>{$row['project_name']} - Unit {$row['unit_no']}</option>";
                }
                ?>
            </select>
            </div>

            <!-- Total Amount auto -->
            <div class="col-md-6 mb-2">
            <input type="number" name="total_amount" id="totalAmount" 
                    class="form-control custom-input" placeholder="Total Amount" readonly>
            </div>

            <!-- Payment Method -->
            <div class="col-md-6 mb-2">
            <select name="payment_method" id="paymentMethod" class="form-control custom-input">
                <option value="">Payment Method *</option>
                <option value="Cash">Cash</option>
                <option value="Cheque">Cheque</option>
                <option value="Pay Order">Pay Order</option>
            </select>
            </div>

            <!-- Down Payment -->
            <div class="col-md-4 mb-2">
            <input type="number" name="down_payment" id="downPayment" 
                    class="form-control custom-input" placeholder="Down Payment">
            </div>

            <!-- Plan -->
            <div class="col-md-4 mb-2">
            <select name="payment_plan" id="paymentPlan" class="form-control custom-input">
                <option value="0">Full Payment</option>
                <option value="6">6 Months</option>
                <option value="12">12 Months</option>
                <option value="24">24 Months</option>
            </select>
            </div>

            <!-- Monthly Installment auto -->
            <div class="col-md-4 mb-2">
            <input type="number" name="monthly_installment" id="monthlyInstallment" 
                    class="form-control custom-input" placeholder="Monthly Installment" readonly>
            </div>

            <!-- Sale Date -->
            <div class="col-md-6 mb-2">
            <input type="date" name="sale_date" class="form-control custom-input">
            </div>

            <div class="col-12 d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-save px-4">Save Sale</button>
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
    // Plot select hone par price auto aaye
    $('#plotSelect').on('change', function(){
        var price = $(this).find(':selected').data('price');
        $('#totalAmount').val(price);
        calculateInstallment();
    });

    // Auto calculate
    function calculateInstallment(){
        var total = parseFloat($('#totalAmount').val()) || 0;
        var down  = parseFloat($('#downPayment').val()) || 0;
        var plan  = parseInt($('#paymentPlan').val()) || 0;

        if(plan > 0){
            var monthly = (total - down) / plan;
            $('#monthlyInstallment').val(Math.round(monthly));
        } else {
            $('#monthlyInstallment').val(0);
        }
    }

    $('#downPayment, #paymentPlan').on('input change', function(){
        calculateInstallment();
    });

    // Form Submission
    $('#saleForm').on('submit', function(e){
    e.preventDefault();

    $.ajax({
        url: '../ajax/addsales.php',
        method: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success: function(response){
            if(response.status){
                alert(response.message);
                $('#saleForm')[0].reset();
                $('#totalAmount').val('');
                $('#monthlyInstallment').val('');
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(err){
            console.log(err.responseText);
        }
    });
});
</script>
</body>

</html>