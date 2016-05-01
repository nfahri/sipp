<h2>Login</h2>
<form class="form-horizontal" role="form" action="<?php echo base_url()?>beranda/login" method="POST">
  <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left; padding-left: 80px" >Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="username" placeholder="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left; padding-left: 80px">password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" name="password" placeholder="password">
      </div>
    </div>    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
</form>