<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
      <a class="navbar-brand active" href="<?php echo base_url();?>">Key Management System</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">            
      <li><a href="<?php echo base_url().'request/add';?>">Add Request</a></li>      
      <li ><a href="<?php echo base_url().'request/report';?>">Report</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-key"></i> Key <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url().'key';?>">Key List</a></li>          
          <li><a href="<?php echo base_url().'key/add';?>">Add New Key</a></li>          
        </ul>
      </li>      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Lecturer <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url().'lecturer';?>">Lecturer List</a></li>          
          <li><a href="<?php echo base_url().'lecturer/addLecturer';?>">Add New Lecturer</a></li>          
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contractor <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url().'contractor';?>">Contractor List</a></li>          
          <li><a href="<?php echo base_url().'contractor/addContractor';?>">Add New Contractor</a></li>          
        </ul>
      </li>
    </ul>
      <?php /*
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form> */?>
    <ul class="nav navbar-nav navbar-right">
      
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> User <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url().'user/index';?>">User Management</a></li>          
          <li><a href="<?php echo base_url().'user/add';?>">Add User</a></li>          
          <li><a href="<?php echo base_url().'user/changepassword';?>">Change Password</a></li>          
          <li class="divider"></li>
          <li><a href="<?php echo base_url().'login/logout'?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>