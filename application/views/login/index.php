<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <a class="nav-brand" href="<?php echo base_url();?>" title="<?php echo $_site_title;?>"><?php echo $_site_title;?></a>
    <div class="row m-n">
      <div class="col-md-4 col-md-offset-4 m-t-lg">
        <section class="panel">
          <header class="panel-heading text-center">
            Sign in
          </header>
            <form action="<?php echo base_url().'login/validation';?>" method="post" class="panel-body">                
            <div class="form-group">
              <label class="control-label">Email</label>
              <input type="email" id="user_email" name="user_email" placeholder="test@example.com" 
                     class="form-control" required maxlength="50" value="<?php echo $this->session->flashdata('email');?>">
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input type="password" id="user_pass" name="user_pass" placeholder="Password" 
                     class="form-control" required maxlength="50">
            </div>
                
            <div class="checkbox">
              <label>
                <input type="checkbox"> Keep me logged in
              </label>
            </div>
            <a href="#" class="pull-right m-t-xs"><small>Forgot password?</small></a>
            <button type="submit" class="btn btn-info"><i class="icon-signin"></i> Sign in</button>
            
          </form>
        </section>
      </div>
    </div>
  </section>  