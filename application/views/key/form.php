<?php

if(isset($_record)){
    //print_r($_record);
    $key_no=$_record[0]['key_no'];
    $location=$_record[0]['location'];    
    $status=$_record[0]['status'];    
    $remark=$_record[0]['remarks'];
}else{
    $key_no='';
    $location='';    
    $status='';    
    $remark='';
}

?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Add New Key</div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url().'key/save'?>" method="post">
                    <?php
                    if(isset($_record)){ ?>
                    <input type="hidden" id="ksn" name="ksn" value="<?php echo $_record[0]['ksn'];?>">
                    <input type="hidden" id="action" name="action" value="update">    
                        <?php                        
                    }//end if
                    ?>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="key_no">Key No</label>
                            <div class="col-sm-9">
                            <?php 
                            if(isset($_record)){ ?>
                                <label class="col-sm-3 control-label" for="key_no"><?php echo $key_no; ?></label>
                                <input type="hidden" id="key_no" name="key_no" 
                                   value="<?php echo $key_no; ?>">
                                <?php
                            }else{ ?>
                                
                            <input type="text" class="form-control" id="key_no" name="key_no" 
                                   value="<?php echo $key_no; ?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="Key No">
                            
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="location">Location</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="location" name="location"
                                   value="<?php echo $location;?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="Location">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>                        
                    <div class="form-group">                        
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="status">Status</label>
                            <div class="col-sm-9">
                                <select id="status" name="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="remark">Remark</label>
                            <div class="col-sm-9">
                            <textarea class="input-sm form-control" id="remark"
                            size="16" type="text" name="remark"><?php echo $remark;?></textarea>
                            </div>
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
