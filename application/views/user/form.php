<?php

if(isset($_record)){
    //print_r($_record);
    $staff_no=$_record[0]['staff_no'];
    $user_name=$_record[0]['user_name'];
    $user_email=$_record[0]['user_email'];
    
}else{
    $staff_no='';
    $user_name='';
    $user_email='';    
}

?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Add New User</div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url().'user/save'?>" method="post">
                    <?php
                    if(isset($_record)){ ?>
                    <input type="hidden" id="usn" name="usn" value="<?php echo $_record[0]['usn'];?>">
                    <input type="hidden" id="action" name="action" value="update">    
                        <?php                        
                    }//end if
                    ?>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="staff_no">Staff No</label>
                            <div class="col-sm-9">
                            <?php 
                            if(isset($_record)){ ?>
                                <label class="col-sm-3 control-label" for="staff_no"><?php echo $staff_no; ?></label>
                                <input type="hidden" id="staff_no" name="staff_no" 
                                   value="<?php echo $staff_no; ?>">
                                <?php
                            }else{ ?>
                                
                            <input type="text" class="form-control" id="staff_no" name="staff_no" 
                                   value="<?php echo $staff_no; ?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="Safft No">
                            
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="user_name">Name</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="user_name" name="user_name"
                                   value="<?php echo $user_name;?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="User Name">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>                        
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="user_email">User Email</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="user_email" name="user_email" 
                                   value="<?php echo $user_email; ?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="User Email">
                            </div>
                        </div>
                        <div class="col-sm-6">                            
                        </div>
                    </div>                                        
                    <div class="line line-dashed line-lg pull-in"></div>                        
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label"></label>
                            <button type="submit" class="btn btn-info btn-sm"><i class="icon-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
