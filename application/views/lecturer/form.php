<?php

if(isset($_record)){
    //print_r($_record);
    $staff_id=$_record[0]['staff_id'];
    $name=$_record[0]['staff_name'];
    $department=$_record[0]['department'];
    $status=$_record[0]['status'];
    $join_date=date('d-m-Y',$_record[0]['start_date']);
    $end_date=date('d-m-Y',$_record[0]['end_date']);
    $remark=$_record[0]['remark'];
}else{
    $staff_id='';
    $name='';
    $department='';
    $status='';
    $join_date='';
    $end_date='';
    $remark='';
}

?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Add New Lecturer</div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url().'lecturer/saveLecturer'?>" method="post">
                    <?php
                    if(isset($_record)){ ?>
                    <input type="hidden" id="lsn" name="lsn" value="<?php echo $_record[0]['lsn'];?>">
                    <input type="hidden" id="action" name="action" value="update">    
                        <?php                        
                    }//end if
                    ?>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="staff_id">Staff ID</label>
                            <div class="col-sm-9">
                            <?php 
                            if(isset($_record)){ ?>
                                <label class="col-sm-3 control-label" for="staff_id"><?php echo $staff_id; ?></label>
                                <input type="hidden" id="staff_id" name="staff_id" 
                                   value="<?php echo $staff_id; ?>">
                                <?php
                            }else{ ?>
                                
                            <input type="text" class="form-control" id="staff_id" name="staff_id" 
                                   value="<?php echo $staff_id; ?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="Staff No">
                            
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="name">Name</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name"
                                   value="<?php echo $name;?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>                        
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="department">Department</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="department" name="department" 
                                   value="<?php echo $department; ?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="Department">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="status">Status</label>
                            <div class="col-sm-9">
                                <select id="status" name="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>                        
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="join_date">Join Date</label>
                            <div class="col-sm-9">
                            <input class="input-sm datepicker-input form-control" id="join_date"
                                       size="16" type="text" value="<?php echo $join_date;?>" name="join_date"
                                       max="12" parsley-maxlength="12" parsley-trigger="focusout"
                                       data-date-format="dd-mm-yyyy" placeholder="Join Date">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="end_date">End Date</label>
                            <div class="col-sm-9">
                                <input class="input-sm datepicker-input form-control" id="end_date"
                                       size="16" type="text" value="<?php echo $end_date;?>" name="end_date"
                                       max="12" parsley-maxlength="12" parsley-trigger="focusout"
                                       data-date-format="dd-mm-yyyy" placeholder="End Date">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>                        
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="remark">Remark</label>
                            <div class="col-sm-9">
                            <textarea class="input-sm form-control" id="remark"
                            size="16" type="text" name="remark"><?php echo $remark;?></textarea>
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
