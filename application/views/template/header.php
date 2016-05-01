<!DOCTYPE html>
<head>
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <?php
      if(isset($styles)){
         foreach($styles as $style){
            echo $style;
         }
      }
   ?>
</head>

<header>
   <nav class="navbar navbar-inverse">
     <div class="container-fluid">
       <div class="navbar-header">
         <a class="navbar-brand" href="<?php echo base_url()?>Beranda">SIPP</a>
       </div>
       <?php if($this->session->userdata('username')==NULL){?>
         <ul class="nav navbar-nav">
           <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Daftar Lab<span class="caret"></span></a>
             <ul class="dropdown-menu">
                <?php
                    foreach($daftar_lab as $lab){
                       echo "<li><a href=\"".base_url()."Beranda/lab/".$lab["lab_id_lab_pk"]."\">".$lab["lab_nama_lab"]."</a></li>";
                    }      
                 ?>              
             </ul>
           </li>         
         </ul>
       <?php }       
       elseif($this->session->userdata('akses')==2){?>
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url()?>peminjaman/lab/<?php echo $this->session->userdata("lab")?>">Peminjaman</a></li>
            <li><a href="<?php echo base_url()?>Beranda/lab/<?php echo $this->session->userdata("lab")?>">Detail PC</a></li>
          </ul>
       <?php
        }
       ?>
       <ul class="nav navbar-nav navbar-right">
         <?php
            if($this->session->userdata('username')==NULL){
               echo "<li><a href=\"".base_url()."Beranda/login\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
            }
            else{
                echo "<li><a href=\"".base_url()."Beranda/logout\"><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a></li>";
            }
         ?>
       </ul>
     </div>
   </nav>
</header>
<?php
  if($this->session->flashdata('status_login')=="berhasil")
    echo "<div class=\"alert alert-success\">
        <strong>Selamat datang ".$this->session->userdata("username").".</strong>
        </div>";

?>