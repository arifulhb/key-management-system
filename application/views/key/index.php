<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Key List</div>
            <div class="panel-body">                
            
        <table class="table table-bordered table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th>Key No</th>
                    <th>Location</th>
                    <th>Status</th>                    
                    <th>Remark</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($_list as $row): ?>
                  <tr>
                    <td><?php echo $row['key_no'];?></td>
                    <td><?php echo $row['location'];?></td>
                    <td><?php echo ucfirst($row['status']);?></td>
                    <td><?php echo $row['remarks'];?></td>
                                        
                    <td><a href="<?php echo base_url().'key/edit/'.$row['ksn'];?>" class="btn btn-primary btn-sm"><i class="icon-pencil"></i> Edit</a>
                        <a href="<?php echo base_url().'key/delete/'.$row['ksn'];?>" class="btn btn-danger btn-sm"><i class="icon-trash"></i> Delete</a>
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