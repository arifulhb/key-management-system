<div class="row">
    <div class="col-sm-12">
<form method="post" action="<?php echo base_url().'user/change_password_validation'?>">
                              
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Create New Plan</header>
            <section class="panel-body">                
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <label class="col-sm-2 control-label" for="new_pass">New Password</label>
                        <div class="col-sm-4"><input type="password" required id="new_pass" name="new_pass" class="form-control"></div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
                
                <?php
                if($this->session->flashdata('pc_message')!=''){
                    ?>
                <div class="line line-dashed line-lg pull-in"></div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                        <div class="alert alert-warning fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Notice!</strong> <?php echo $this->session->flashdata('pc_message');?>
                        </div>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                        <?php
                }//end if flashdata
                ?>                                
            </section>
        </section>
            
        <!-- Submit & Cancel Buttons -->
        <div class="col-sm-3"></div>
        <div class="col-sm-6">

            <div class="col-sm-3"></div>
            <div class="col-md-6">

                <div class="col-sm-5 m-b-xs" style="padding-left:0px;">
                    <button class="btn btn-primary" type="submit"><i class="icon-edit"></i> Change</button>                    
                </div>                

            </div>
        </div>
        </form><!--end form-->        
    </div>
</div>
