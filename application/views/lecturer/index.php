<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Lecturer List</div>
            <div class="panel-body">                
            
        <table class="table table-bordered table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th>Staff No</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Join Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($_list as $row): ?>
                  <tr>
                    <td><?php echo $row['staff_id'];?></td>
                    <td><?php echo $row['staff_name'];?></td>
                    <td><?php echo $row['department'];?></td>
                    <td><?php echo ucfirst($row['status']);?></td>
                    <td><?php echo date('d M Y',$row['start_date']);?></td>
                    <td><a href="<?php echo base_url().'lecturer/edit/'.$row['lsn'];?>" class="btn btn-primary btn-sm"><i class="icon-pencil"></i> Edit</a>
                        <a href="<?php echo base_url().'lecturer/delete/'.$row['lsn'];?>" class="btn btn-danger btn-sm"><i class="icon-trash"></i> Delete</a>
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