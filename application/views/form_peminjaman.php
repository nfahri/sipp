  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker2" ).datepicker();
  });
  </script>

<h2>Detail PC</h2>
<table class="table">
<?php
echo "<thead>
       <tr class=\"center aligned\"><th>ID PC</th>
       <th>CPU</th>
       <th>RAM</th>
       <th>Memori</th>
       <th>Status</th>
     </tr></thead>
     <tbody>";

      echo "<tr>";
      echo "<td>".$info_pc[0]["dp_id_pc_pk"]."</td>";
      echo "<td>".$info_pc[0]["dp_cpu"]."</td>";
      echo "<td>".$info_pc[0]["dp_ram"]."</td>";
      echo "<td>".$info_pc[0]["dp_memori"]."</td>";
      echo "<td>".$info_pc[0]["dp_status"]."</td>";
      echo "<tr>";
?>
</table>
<h2>Form Peminjaman PC</h2>
<form class="form-horizontal" role="form" action="<?php echo base_url()?>peminjaman/action" method="POST">
<input type="hidden" value="<?php echo $info_pc[0]["dp_id_pc_pk"]?>" name="id_pc">
<input type="hidden" value="<?php echo $id_lab?>" name="id_lab">
  <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left; padding-left: 80px" >Nama:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama" placeholder="Nama lengkap">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left; padding-left: 80px">NRP:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name="nrp" placeholder="NRP">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left; padding-left: 80px">No. HP:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name="no_telp" placeholder="Nomor HP yang dapat dihubungi">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left; padding-left: 80px">Keperluan:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name="keperluan" placeholder="Masukkan keperluan peminjaman PC">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left; padding-left: 80px">Keterangan Tambahan:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name="keterangan_tambahan" placeholder="Masukkan judul TA apabila digunakan untuk mengerjakan TA">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left; padding-left: 80px">Tanggal mulai:</label>
      <div class="col-sm-10">          
        <input type="text" id="datepicker" class="form-control" name="tgl_mulai" placeholder="Masukkan tanggal mulai penggunaan PC">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left; padding-left: 80px">Tanggal selesai:</label>
      <div class="col-sm-10">          
        <input type="text" id="datepicker2"  class="form-control" name="tgl_selesai" placeholder="Masukkan tanggal selesai penggunaan PC">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
</form>