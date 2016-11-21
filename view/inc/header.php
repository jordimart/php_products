<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Solar-spain |
        <?php if($_GET['module']){ echo $_GET['module'];}else{ echo "main";} ?>
    </title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <!-- Bootstrap css file-->
    <link href="<?php echo CSS_PATH ?>bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="<?php echo CSS_PATH ?>font-awesome.min.css" rel="stylesheet">
    <!-- Superslide css file-->
    <link  href="<?php echo CSS_PATH ?>superslides.css" rel="stylesheet">
    <!-- Slick slider css file -->
    <!--<link href="<?php echo CSS_PATH ?>slick.css" rel="stylesheet">-->
    <!-- Circle counter cdn css file -->
    <link href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'rel='stylesheet prefetch'>
    <!-- smooth animate css file -->
    <!--<link rel="stylesheet" href="view/css/animate.css">-->
    <!--se actualiza el jquery css, según Toni así funcionaba mejor-->
    <link href="<?php echo CSS_PATH ?>animate.min.css" rel="stylesheet">
    <!-- preloader -->
    <!--<link rel="stylesheet" href="view/css/queryLoader.css" type="text/css" />-->
    <!-- gallery slider css -->
    <link type="text/css" media="all" rel="stylesheet" href="<?php echo CSS_PATH ?>jquery.tosrus.all.css" />
    <!-- Default Theme css file -->
    <link id="switcher" href="<?php echo CSS_PATH ?>default-theme.css" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="<?php echo CSS_PATH ?>style.css" rel="stylesheet">

    <!-- Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>


    <!-- last year libs for datepicker-->
    <!--Se actualizan importaciones para que funcionen los efectos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



</head>

<body>

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
        <!-- BEGIN MENU -->
        <div class="menu_area">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                        <!-- LOGO -->
                        <!-- TEXT BASED LOGO -->
                        <a class="navbar-brand" href="index.html">Sp <span>Solar-Spain</span></a>
                        <!-- IMG BASED LOGO  -->
                        <!--<a class="navbar-brand" href="index.html"><img src="view/img/logo.png" alt="logo"></a> -->

                    </div>
                    <!--=========== END HEADER SECTION ================-->
                  
