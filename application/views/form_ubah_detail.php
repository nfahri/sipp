  <h2>Form Ubah Deskripsi PC</h2>
<form class="form-horizontal" role="form" action="<?php echo base_url()?>beranda/ubahDetail/<?php echo $this->session->userdata("lab")?>" method="POST">
<input type="hidden" value="<?php echo $info_pc[0]["dp_id_pc_pk"]?>" name="id_pc">
  <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left; padding-left: 80px" >CPU:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="cpu" value="<?php echo $info_pc[0]["dp_cpu"]?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left; padding-left: 80px">RAM:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name="ram" value="<?php echo $info_pc[0]["dp_ram"]?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left; padding-left: 80px">Memori:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name="memori" value="<?php echo $info_pc[0]["dp_memori"]?>">
      </div>
    </div>    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
</form>