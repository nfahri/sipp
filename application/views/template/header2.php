<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
   <title>Lhander</title>
   <meta name="description" content="">  
   <meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="<?php echo base_url()?>static/css/base.css">  
   <link rel="stylesheet" href="<?php echo base_url()?>static/css/main.css">
   <link rel="stylesheet" href="<?php echo base_url()?>static/css/vendor.css">     

   <!-- script
   ================================================== -->
   <script src="<?php echo base_url()?>static/js/modernizr.js"></script>

   <!-- favicons
   ================================================== -->
   <link rel="icon" type="image/png" href="favicon.png">

   <link rel="stylesheet" href="<?php echo base_url()?>static/css/dropdown.css">
   <script src="<?php echo base_url()?>static/js/dropdown.js"></script>

</head>

<body id="top">

   <!-- header 
   ================================================== -->
   <header>

      <div class="row">

         <!-- <div class="logo">
            <a href="index.html">Lhander</a>
         </div> -->
         <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">Lab</button>
            <div id="myDropdown" class="dropdown-content">
               <?php
               // echo "<pre>";
               // var_dump($daftar_lab);               
                  foreach($daftar_lab as $lab){
                     echo "<a href=\"".base_url()."Beranda/lab/".$lab["lab_id_lab_pk"]."\">".$lab["lab_nama_lab"]."</a>";
                  }
               // exit();
               ?>
            </div>
            
         </div>

         <nav id="main-nav-wrap">
            <ul class="main-navigation">
               <li class="current"><a class="smoothscroll"  href="#intro" title="">Home</a></li>
               <li><a class="smoothscroll"  href="#process" title="">Process</a></li>
               <li><a class="smoothscroll"  href="#features" title="">Features</a></li>
               <li><a class="smoothscroll"  href="#pricing" title="">Pricing</a></li>
               <li><a class="smoothscroll"  href="#faq" title="">FAQ</a></li>             
               <li class="highlight with-sep"><a href="#" title="">Sign Up</a></li>             
            </ul>
         </nav>

         <a class="menu-toggle" href="#"><span>Menu</span></a>
         
      </div>      
      
   </header> <!-- /header -->