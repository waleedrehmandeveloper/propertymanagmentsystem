<?php
  session_start();
  require_once("config/db.php");
  require_once("auth/auth.php");

  alreadyLoggedIn();
?>  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="assets/img/logo/logo.png" rel="icon">
  <title>Managment Software</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/ruang-admin.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'DM Sans', sans-serif;
      background: #EFF0EC;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
    }

    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image: radial-gradient(circle, #C8CCC0 1px, transparent 1px);
      background-size: 28px 28px;
      opacity: 0.45;
      pointer-events: none;
      z-index: 0;
    }

    .card {
      position: relative;
      z-index: 1;
      background: #ffffff;
      border-radius: 16px;
      border: 0.5px solid #D4D8CE;
      box-shadow: 0 2px 24px rgba(28,43,35,0.07);
      width: 100%;
      max-width: 480px;
      padding: 2.5rem 2.25rem;
      animation: fadeUp 0.4s ease both;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(16px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 2rem;
    }

    .logo {
      width: 40px;
      height: 40px;
      background: #1C2B23;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .logo i { font-size: 20px; color: #8FBC9A; }

    .brand-text { line-height: 1.2; }
    .brand-name {
      font-family: 'DM Serif Display', serif;
      font-size: 18px;
      color: #1C2B23;
    }
    .brand-tagline {
      font-size: 11px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: #7A9A82;
      font-weight: 500;
    }

    .heading { font-family: 'DM Serif Display', serif; font-size: 24px; color: #1C2B23; margin-bottom: 4px; }
    .subheading { font-size: 13.5px; color: #7A8A80; margin-bottom: 2rem; }

    .field { margin-bottom: 1.1rem; }

    .field label {
      display: block;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 0.07em;
      text-transform: uppercase;
      color: #4A6B54;
      margin-bottom: 6px;
    }

    .input-wrap {
      position: relative;
      display: flex;
      align-items: center;
    }

    .input-wrap .icon {
      position: absolute;
      left: 12px;
      font-size: 17px;
      color: #A8C0B0;
      pointer-events: none;
    }

    .input-wrap input {
      width: 100%;
      padding: 10px 12px 10px 38px;
      font-family: 'DM Sans', sans-serif;
      font-size: 14px;
      color: #1C2B23;
      background: #F8F9F7;
      border: 1px solid #D4DAD0;
      border-radius: 9px;
      outline: none;
      transition: border-color 0.18s, box-shadow 0.18s, background 0.18s;
    }

    .input-wrap input::placeholder { color: #B4C0B8; }

    .input-wrap input:focus {
      border-color: #4A7C59;
      background: #ffffff;
      box-shadow: 0 0 0 3px rgba(74,124,89,0.13);
    }

    .toggle-btn {
      position: absolute;
      right: 10px;
      background: none;
      border: none;
      cursor: pointer;
      color: #A8C0B0;
      font-size: 17px;
      padding: 4px;
      line-height: 1;
      transition: color 0.15s;
    }
    .toggle-btn:hover { color: #4A7C59; }

    .options-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 0.25rem 0 1.5rem;
    }

    .remember {
      display: flex;
      align-items: center;
      gap: 7px;
      font-size: 13px;
      color: #5A6E62;
      cursor: pointer;
      user-select: none;
    }

    .remember input[type="checkbox"] {
      width: 15px;
      height: 15px;
      accent-color: #4A7C59;
      cursor: pointer;
    }

    .forgot {
      font-size: 13px;
      color: #4A7C59;
      font-weight: 500;
      text-decoration: none;
      transition: color 0.15s;
    }
    .forgot:hover { color: #2E5A3A; text-decoration: underline; }

    .btn-submit {
      width: 100%;
      padding: 11.5px;
      background: #1C2B23;
      color: #D6EAD9;
      border: none;
      border-radius: 9px;
      font-family: 'DM Sans', sans-serif;
      font-size: 14.5px;
      font-weight: 500;
      cursor: pointer;
      letter-spacing: 0.02em;
      transition: background 0.18s, transform 0.1s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    .btn-submit:hover { background: #2E4A38; }
    .btn-submit:active { transform: scale(0.985); }

    .divider {
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 1.25rem 0;
      font-size: 12px;
      color: #B0BEB6;
    }
    .divider::before, .divider::after {
      content: '';
      flex: 1;
      height: 0.5px;
      background: #DDE4DA;
    }

    .btn-sso {
      width: 100%;
      padding: 10.5px;
      background: #F8F9F7;
      border: 1px solid #D4DAD0;
      border-radius: 9px;
      font-family: 'DM Sans', sans-serif;
      font-size: 13.5px;
      color: #4A6B54;
      font-weight: 500;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: background 0.15s, border-color 0.15s;
    }
    .btn-sso:hover { background: #EEF2EC; border-color: #B8C8B4; }
    .btn-sso i { font-size: 17px; }

    .footer-row {
      margin-top: 1.5rem;
      text-align: center;
      font-size: 13px;
      color: #8A9E90;
    }
    .footer-row a {
      color: #4A7C59;
      font-weight: 500;
      text-decoration: none;
    }
    .footer-row a:hover { text-decoration: underline; }

    .security-note {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 5px;
      margin-top: 1.5rem;
      font-size: 11.5px;
      color: #B0BEB6;
    }
    .security-note i { font-size: 13px; }
  </style>
</head>

<body>

  <div class="card">

    <div class="brand">
      <div class="logo">
        <i class="ti ti-building-estate"></i>
      </div>
      <div class="brand-text">
        <div class="brand-name">EstateOS</div>
        <div class="brand-tagline">Property Management</div>
      </div>
    </div>

    <h1 class="heading">Welcome back</h1>
    <p class="subheading">Sign in to your management portal</p>
  
    <form id="loginform" method="POST">
    <div class="field">
        <label for="email">Email address</label>
        <div class="input-wrap">
            <i class="ti ti-mail icon"></i>
            <input name="email" type="email" id="email" placeholder="you@company.com" autocomplete="email" />
        </div>
    </div>

    <div class="field">
        <label for="password">Password</label>
        <div class="input-wrap">
            <i class="ti ti-lock icon"></i>
            <input name="password" type="password" id="password" placeholder="Enter your password" autocomplete="current-password" />
            <button type="button" class="toggle-btn"><i class="ti ti-eye"></i></button>
        </div>
    </div>

    <div class="options-row">
        <label class="remember">
            <input name="remember" type="checkbox" /> Remember me
        </label>
        <a href="#" class="forgot">Forgot password?</a>
    </div>

    <button type="submit" class="btn-submit mb">
        <i class="ti ti-login"></i> Sign in to portal
    </button>
</form>

  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/js/ruang-admin.min.js"></script>

  <script src="pages/vendor/jquery/jquery.min.js"></script>
 <script>
    $("#loginform").submit(function(e){
        e.preventDefault();

        $.ajax({
            url: "ajax/loginform.php",
            type: "POST",
            dataType: "json",
            data: {
                email:    $("#email").val(),
                password: $("#password").val(),
            },
            success: function(response){
                if(response.status){
                    window.location.href = "pages/dashboard.php";
                } else {
                    alert(response.message);
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