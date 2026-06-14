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
    border-radius:10px;
    padding:10px 12px;
    border:1px solid #e5e5e5;
    box-shadow:none;
    font-size:14px;
    }

    .custom-input:focus{
        border-color:#213b2e;
        box-shadow:0 0 0 0.15rem rgba(33,59,46,0.15);
    }

    .btn-save{
    background:linear-gradient(to right,#213b2e,#2f5a45);
    color:#fff;
    border:none;
    border-radius:10px;
    font-weight:500;
    }

    .btn-save:hover{
    opacity:0.9;
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

            
            <div class="card shadow mb-4">
            <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0 font-weight-bold">ADD SELLERS</h4>
            </div>

            <form id="userForm">
                <div class="row">

                    <!-- Username -->
                    <div class="col-md-6 mb-3">
                        <input type="text" name="username"
                            class="form-control custom-input"
                            placeholder="Username *">
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <input type="email" name="email"
                            class="form-control custom-input"
                            placeholder="Email *">
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6 mb-3">
                        <input type="text" name="phone"
                            class="form-control custom-input"
                            placeholder="Phone Number *">
                    </div>

                    <!-- Password -->
                    <div class="col-md-6 mb-3">
                        <input type="password" name="password"
                            class="form-control custom-input"
                            placeholder="Password *">
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <select name="status" class="form-control custom-input">
                            <option value="">Select Status *</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <!-- Role -->
                    <div class="col-md-6 mb-3">
                        <select name="role" class="form-control custom-input">
                            <option value="">Select Role *</option>
                            <option disabled value="admin">Admin</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-save px-4">
                            Save User
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
  <script src="pages/vendor/jquery/jquery.min.js"></script>

    <script>
        $("#userForm").submit(function(e){
            e.preventDefault();
    
            var formData = $(this).serialize();
    
            $.ajax({
                url: '../ajax/addstaff.php',
                type: 'POST',
                data: formData,
                success: function(response){
                    alert("User added successfully!");
                    $("#userForm")[0].reset();
                },
                error: function(){
                    alert("An error occurred while adding the user.");
                }
            });
        });
    </script>
</body>

</html>