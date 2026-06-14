<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

  <!-- Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../pages/dashboard.php">
    <div class="sidebar-brand-icon">
      <img src="../img/logo/logo2.png">
    </div>
    <div class="sidebar-brand-text mx-3">EstateOS</div>
  </a>

  <hr class="sidebar-divider my-0">

  <!-- Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="../pages/dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <hr class="sidebar-divider">
  <div class="sidebar-heading">Main Modules</div>

  <!-- Projects -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProjects"
      aria-expanded="true" aria-controls="collapseProjects">
      <i class="fas fa-fw fa-building"></i>
      <span>Projects</span>
    </a>
    <div id="collapseProjects" class="collapse" aria-labelledby="headingProjects" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Projects</h6>
        <a class="collapse-item" href="../pages/addprojects.php">
          <i class="fas fa-plus-circle fa-sm mr-1"></i> Add Project
        </a>
        <a class="collapse-item" href="../pages/viewprojects.php">
          <i class="fas fa-list fa-sm mr-1"></i> View Projects
        </a>
      </div>
    </div>
  </li>

  <!-- Clients -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClients"
      aria-expanded="true" aria-controls="collapseClients">
      <i class="fas fa-fw fa-users"></i>
      <span>Clients</span>
    </a>
    <div id="collapseClients" class="collapse" aria-labelledby="headingClients" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Clients</h6>
        <a class="collapse-item" href="../pages/addclients.php">
          <i class="fas fa-user-plus fa-sm mr-1"></i> Add Client
        </a>
        <a class="collapse-item" href="../pages/viewclients.php">
          <i class="fas fa-user-friends fa-sm mr-1"></i> View Clients
        </a>
      </div>
    </div>
  </li>

  <!-- Sales -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSales"
      aria-expanded="true" aria-controls="collapseSales">
      <i class="fas fa-fw fa-file-contract"></i>
      <span>Sales</span>
    </a>
    <div id="collapseSales" class="collapse" aria-labelledby="headingSales" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Sales</h6>
        <a class="collapse-item" href="../pages/addsale.php">
          <i class="fas fa-plus-circle fa-sm mr-1"></i> Add Sale
        </a>
        <a class="collapse-item" href="../pages/viewsales.php">
          <i class="fas fa-list-alt fa-sm mr-1"></i> View Sales
        </a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider">
  <div class="sidebar-heading">Finance</div>

  <!-- Investment Plans -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvestment"
      aria-expanded="true" aria-controls="collapseInvestment">
      <i class="fas fa-fw fa-hand-holding-usd"></i>
      <span>Investment Plans</span>
    </a>
    <div id="collapseInvestment" class="collapse" aria-labelledby="headingInvestment" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Investment Plans</h6>
        <a class="collapse-item" href="../pages/addinstallment.php">
          <i class="fas fa-plus-circle fa-sm mr-1"></i> Add Plan
        </a>
        <a class="collapse-item" href="../pages/viewinstallmentplans.php">
          <i class="fas fa-list fa-sm mr-1"></i> View Plans
        </a>
      </div>
    </div>
  </li>

  <!-- Installments -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInstallments"
      aria-expanded="true" aria-controls="collapseInstallments">
      <i class="fas fa-fw fa-money-check-alt"></i>
      <span>Installments</span>
    </a>
    <div id="collapseInstallments" class="collapse" aria-labelledby="headingInstallments" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Installments</h6>
        <a class="collapse-item" href="../pages/paymentschedule.php">
          <i class="fas fa-calendar-alt fa-sm mr-1"></i> Payment Schedule
        </a>
        <a class="collapse-item" href="../pages/installments/record_payment.php">
          <i class="fas fa-check-circle fa-sm mr-1"></i> Record Payment
        </a>
        <a class="collapse-item" href="../pages/installments/overdue.php">
          <i class="fas fa-exclamation-circle fa-sm mr-1"></i> Overdue Payments
        </a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider">

  <!-- Certificates -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCerts"
      aria-expanded="true" aria-controls="collapseCerts">
      <i class="fas fa-fw fa-file-pdf"></i>
      <span>Certificates</span>
    </a>
    <div id="collapseCerts" class="collapse" aria-labelledby="headingCerts" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">PDF Certificates</h6>
        <a class="collapse-item" href="../pages/certificates/allotment.php">
          <i class="fas fa-file-alt fa-sm mr-1"></i> Allotment Certificate
        </a>
        <a class="collapse-item" href="../pages/certificates/transfer_cert.php">
          <i class="fas fa-file-alt fa-sm mr-1"></i> Transfer Certificate
        </a>
        <a class="collapse-item" href="../pages/certificates/receipt.php">
          <i class="fas fa-receipt fa-sm mr-1"></i> Payment Receipt
        </a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider">
  <div class="sidebar-heading">Staff Manage</div>
   <!-- Installments -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsestaff"
      aria-expanded="true" aria-controls="collapseInstallments">
      <i class="fas fa-fw fa-user"></i>
      <span>Add Staff</span>
    </a>
    <div id="collapsestaff" class="collapse" aria-labelledby="headingInstallments" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Add Staff</h6>
        <a class="collapse-item" href="../pages/addstaff.php">
          <i class="fas fa-user-plus fa-sm mr-1"></i> Add New Staff
        </a>
        <a class="collapse-item" href="../pages/viewstaff.php">
          <i class="fas fa-user-check fa-sm mr-1"></i> View Staff
        </a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider">
  <div class="sidebar-heading">Settings</div>

  <!-- Settings -->
  <li class="nav-item">
    <a class="nav-link" href="../pages/settings.php">
      <i class="fas fa-fw fa-cog"></i>
      <span>Settings</span>
    </a>
  </li>

  <hr class="sidebar-divider d-none d-md-block">
  <div class="version" id="version-ruangadmin"></div>

</ul>
<!-- End Sidebar -->