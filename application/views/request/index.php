<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Request List</div>
            <div class="panel-body">                
            
        <table class="table table-bordered table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th>Request No</th>
                    <th>Date</th>
                    <th>Lecturer</th>                    
                    <th>Contractor</th>                    
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($_list as $row): ?>
                  <tr>
                    <td><?php echo $row['rsn'];?></td>
                    <td><?php echo date('d M Y',$row['request_date']);?></td>
                    <td><?php echo $row['lecturer'];?></td>
                    <td><?php echo $row['contractor'];?></td>
                    <td><?php echo date('d M Y',$row['from_date']);?></td>
                    <td><?php echo date('d M Y',$row['to_date']);?></td>
                    <td><?php echo $row['status'];?></td>
                                        
                    <td><a href="<?php echo base_url().'request/edit/'.$row['rsn'];?>" class="btn btn-primary btn-sm"><i class="icon-pencil"></i> Edit</a>
                        <a href="<?php echo base_url().'request/delete/'.$row['rsn'];?>" class="btn btn-danger btn-sm"><i class="icon-trash"></i> Delete</a>
                    </td>
                </tr>  
                    <?php                    
                endforeach;
                ?>                
            </tbody>
        </table>
                <?php echo $this->pagination->create_links();?>
            </div>
        </div>   
    </div>
</div>