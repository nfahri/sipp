<table class="ui celled table">
<?php
if($this->session->flashdata('status_peminjaman')=='berhasil'){
  $kepala_lab = $this->session->flashdata('kepala_lab')[0];
  echo "<div class=\"alert alert-success\">
        <strong>Reservasi berhasil dilakukan, silakan melakukan konfirmasi ke Bp/Ibu $kepala_lab[kl_nama_kepala_lab] dengan nomor hp $kepala_lab[kl_nomor_tlp] dan email $kepala_lab[kl_email]</strong>
        </div>";
}
if($this->session->flashdata('status_ganti_detail')=='berhasil'){
  echo "<div class=\"alert alert-success\">
        <strong>Penggantian detail PC berhasil dilakukan.
        </div>";
}
if($this->session->flashdata('status_peminjaman')=='gagal')
  echo "<div class=\"alert alert-danger\">
        <strong>Reservasi gagal dilakukan, silakan menghubungi administrator lab yang bersangkutan.</strong>
        </div>";
echo "<thead>
       <tr class=\"center aligned\"><th>ID PC</th>
       <th>CPU</th>
       <th>RAM</th>
       <th>Memori</th>
       <th>Status</th>
     </tr></thead>
     <tbody>";
   foreach($daftar_pc as $pc){
      // var_dump($pc);
      // exit();
      echo "<tr>";
      echo "<td>".$pc["dp_id_pc_pk"]."</td>";
      echo "<td>".$pc["dp_cpu"]."</td>";
      echo "<td>".$pc["dp_ram"]."</td>";
      echo "<td>".$pc["dp_memori"]."</td>";
      
      if($this->session->userdata('akses')==2)
          echo "<td><a href=\"".base_url()."beranda/ubahDetail/".$pc["dp_id_pc_pk"]."\"><button type=\"button\" class=\"btn btn-primary\">Ubah</button></a></td>";      
      else
        echo "<td><a href=\"".base_url()."peminjaman/formPeminjaman/".$id_lab."/".$pc["dp_id_pc_pk"]."\"><button type=\"button\" class=\"btn btn-success\">Pinjam</button></a></td>";

      echo "<tr>";
   }
?>
</table>