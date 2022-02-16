<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url() . '/assets/image/logo_dqs.PNG' ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>
    DQS
  </title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard">
  <!--  Social tags      -->
  <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, material dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, free dashboard, free admin dashboard, free bootstrap 4 admin dashboard">
  <meta name="description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="Material Dashboard by Creative Tim">
  <meta itemprop="description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
  <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/50/opt_md_thumbnail.jpg">
  <!-- Twitter Card data -->
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@creativetim">
  <meta name="twitter:title" content="Material Dashboard by Creative Tim">
  <meta name="twitter:description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
  <meta name="twitter:creator" content="@creativetim">
  <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/50/opt_md_thumbnail.jpg">
  <!-- Open Graph data -->
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="Material Dashboard by Creative Tim">
  <meta property="og:type" content="article">
  <meta property="og:url" content="https://demos.creative-tim.com/material-dashboard/examples/dashboard.html">
  <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/50/opt_md_thumbnail.jpg">
  <meta property="og:description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
  <meta property="og:site_name" content="Creative Tim">
  <!--     Fonts and icons     -->
  <script src="bower_components/bootstrap-material-design/scripts/material.js"></script>
  <script src="bower_components/bootstrap-material-design/scripts/ripples.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/css/mat_css.css?"<?php echo date('l jS \of F Y h:i:s A'); ?> />


  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link href="<?php echo base_url() . 'assets/template/material-dashboard-master' ?>/assets/demo/demo.css" rel="stylesheet">
  <!-- Google Tag Manager -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" >
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Sarabun&display=swap');
    *{
        font-family: 'Sarabun', sans-serif;
    }
  </style>

  <nav class="navbar navbar-expand-lg bg-dark_blue" style="z-index: 6; position: fixed; width: 100%; top:0;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <img src="<?php echo base_url() . '/assets/image/logo_dqs.PNG' ?>" height="50" width="50">
      <a class="navbar-brand" href="<?php echo base_url() . 'Qrcode/Qrcode_generator/show_qrcode' ?>"><b>Document QR</b></a>
      <form class="form-inline ml-auto">

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url() . '/Qrcode/Qrcode_generator/show_qrcode' ?>" style="font-size:18px">สร้างคิวอาร์โค้ด </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url() . '/Member/Member_register/show_member_register' ?>" style="font-size:18px">สมัครสมาชิก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url() . '/Member/Member_login/show_member_login' ?>" style="font-size:18px">เข้าสู่ระบบ</a>
          </li>
        </ul>

      </form>
    </div>

  </nav>
</head>

<body style="background-color:#F0F3F6;font-family:TH sarabun new;">