<?php

if(isset($_record)){
    //print_r($_record);
    $request_no=$_record[0]['rsn'];
    $lsn=$_record[0]['lsn'];    //lecturer
    $csn=$_record[0]['csn'];//contractor        
    $from_date=date('d-m-Y',$_record[0]['from_date']);;
    $to_date=date('d-m-Y',$_record[0]['to_date']);;
    $request_date=date('d-m-Y',$_record[0]['request_date']);
    $description=$_record[0]['description'];
    $status=$_record[0]['status'];
}else{
    $status='';
    $request_date='';
    $request_no='';        
    $lsn='';
    $csn='';
    $from_date='';
    $to_date='';
    $description='';
}

//print_r($_lecturer);
//print_r($_contractor);

?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Add New Key Request</div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url().'request/save'?>" method="post">
                    <?php
                    if(isset($_record)){ ?>
                    <input type="hidden" id="rsn" name="rsn" value="<?php echo $_record[0]['rsn'];?>">
                    <input type="hidden" id="action" name="action" value="update">    
                        <?php                        
                    }//end if
                    ?>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="request_no">Request No</label>
                            <div class="col-sm-9">
                            <?php 
                            if(isset($_record)){ ?>
                                <label class="col-sm-3 control-label" for="request_no"><?php echo $request_no; ?></label>
                                <input type="hidden" id="request_no" name="request_no" 
                                   value="<?php echo $request_no; ?>">
                                <?php
                            }
                            ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="request_date">Request Date</label>
                            <div class="col-sm-9">
                            <input class="input-sm datepicker-input form-control" id="request_date"
                                       size="16" type="text" value="<?php echo $request_date;?>" name="request_date"
                                       max="12" parsley-maxlength="12" parsley-trigger="focusout"
                                       data-date-format="dd-mm-yyyy" placeholder="End Date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="lsn">Lecturer</label>
                            <div class="col-sm-9">
                                <select id="lsn" name="lsn" class="form-control">
                                    <option>Not Applicable</option>
                                    <?php 
                                    foreach($_lecturer as $row): ?>
                                    <option <?php echo $lsn==$row['lsn']?'SELECTED':'' ;?> value="<?php echo $row['lsn'];?>"><?php echo $row['staff_name'];?></option>    
                                        <?php                                        
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="csn">Contractor</label>
                            <div class="col-sm-9">
                                <select id="csn" name="csn"  class="form-control">
                                    <option>Not Applicable</option>
                                    <?php 
                                    foreach($_contractor as $row): ?>
                                    <option <?php echo $csn==$row['csn']?'SELECTED':'' ;?>  value="<?php echo $row['csn'];?>"><?php echo $row['name'];?></option>    
                                        <?php                                        
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>                        
                    <div class="form-group">                        
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="from_date">Join Date</label>
                            <div class="col-sm-9">
                            <input class="input-sm datepicker-input form-control" id="from_date"
                                       size="16" type="text" value="<?php echo $from_date;?>" name="from_date"
                                       max="12" parsley-maxlength="12" parsley-trigger="focusout"
                                       data-date-format="dd-mm-yyyy" placeholder="Join Date">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="to_date">End Date</label>
                            <div class="col-sm-9">
                                <input class="input-sm datepicker-input form-control" id="to_date"
                                       size="16" type="text" value="<?php echo $to_date;?>" name="to_date"
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
                              <label class="col-sm-3 control-label" for="status">Status</label>
                            <div class="col-sm-9">
                                <select id="status" name="status" class="form-control">
                                    <option <?php echo $status=='New'?'SELECTED':'' ;?>  value="New">New</option>
                                    <option <?php echo $status=='Pending'?'SELECTED':'' ;?> value="Pending">Pending</option>
                                    <option <?php echo $status=='Approved'?'SELECTED':'' ;?> value="Approved">Approved</option>
                                    <option <?php echo $status=='Rejected'?'SELECTED':'' ;?> value="Rejected">Rejected</option>
                                    <option <?php echo $status=='Returned'?'SELECTED':'' ;?> value="Returned">Returned</option>
                                </select>
                            </div>
                        </div>
                    </div>
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
