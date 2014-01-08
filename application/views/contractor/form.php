<?php

if(isset($_record)){
    //print_r($_record);
    $ic_no=$_record[0]['ic_no'];
    $name=$_record[0]['name'];
    $company=$_record[0]['company'];
    $status=$_record[0]['status'];
    $join_date=date('d-m-Y',$_record[0]['start_date']);
    $end_date=date('d-m-Y',$_record[0]['end_date']);
    $description=$_record[0]['description'];
}else{
    $ic_no='';
    $name='';
    $company='';
    $status='';
    $join_date='';
    $end_date='';
    $description='';
}

?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Add New Contractor</div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url().'contractor/saveContractor'?>" method="post">
                    <?php
                    if(isset($_record)){ ?>
                    <input type="hidden" id="csn" name="csn" value="<?php echo $_record[0]['csn'];?>">
                    <input type="hidden" id="action" name="action" value="update">    
                        <?php                        
                    }//end if
                    ?>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="ic_no">IC No</label>
                            <div class="col-sm-9">
                            <?php 
                            if(isset($_record)){ ?>
                                <label class="col-sm-3 control-label" for="ic_no"><?php echo $ic_no; ?></label>
                                <input type="hidden" id="ic_no" name="ic_no" 
                                   value="<?php echo $ic_no; ?>">
                                <?php
                            }else{ ?>
                                
                            <input type="text" class="form-control" id="ic_no" name="ic_no" 
                                   value="<?php echo $ic_no; ?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="IC No">
                            
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
                            <label class="col-sm-3 control-label" for="company">Company</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="company" name="company" 
                                   value="<?php echo $company; ?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="Company">
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
                            <label class="col-sm-3 control-label" for="description">Description</label>
                            <div class="col-sm-9">
                            <textarea class="input-sm form-control" id="description"
                            size="16" type="text" name="description"><?php echo $description;?></textarea>
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
