<table class="ui celled table">
<?php
if($this->session->flashdata('status_hapus_peminjaman')=='berhasil')
  echo "<div class=\"alert alert-success\">
        <strong>Data peminjaman berhasil dihapus.</strong>
        </div>";
echo "<thead>
       <tr class=\"center aligned\"><th>PC</th>
       <th>Nama</th>
       <th>NRP</th>
       <th>No. Telp</th>
       <th>Keperluan</th>
       <th>Keterangan Tambahan</th>
       <th>Tgl. Mulai</th>
       <th>Tgl. Selesai</th>
       <th>Konfirmasi</th>
       <th>Aksi</th>
     </tr></thead>
     <tbody>";
   foreach($daftar_peminjam as $peminjam){
    // echo "<pre>";
    // var_dump($peminjam);
    // exit();
      echo "<tr>";
      echo "<td>".$peminjam["pp_id_pc_fk"]."</td>";
      echo "<td>".$peminjam["pp_nama_peminjam"]."</td>";
      echo "<td>".$peminjam["pp_nrp_peminjam"]."</td>";
      echo "<td>".$peminjam["pp_no_telp"]."</td>";
      echo "<td>".$peminjam["pp_keperluan"]."</td>";
      echo "<td>".$peminjam["pp_keterangan_tambahan"]."</td>";
      echo "<td>".$peminjam["pp_tanggal_mulai"]."</td>";
      echo "<td>".$peminjam["pp_tanggal_selesai"]."</td>";
      echo "<td>".$peminjam["pp_konfirmasi"]."</td>";
      echo "<td><a href=\"".base_url()."peminjaman/hapusPeminjaman/".$peminjam["pp_id_peminjaman_pk"]."\"><button type=\"button\" class=\"btn btn-danger\">Hapus</button></a></td>";
      echo "<tr>";
   }
?>
</table>