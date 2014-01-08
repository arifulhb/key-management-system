<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">User List</div>
            <div class="panel-body">                
            
        <table class="table table-bordered table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th>Staff No</th>
                    <th>Name</th>
                    <th>Email</th>                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($_list as $row): ?>
                  <tr>
                    <td><?php echo $row['staff_no'];?></td>
                    <td><?php echo $row['user_name'];?></td>
                    <td><?php echo $row['user_email'];?></td>
                    <td><a href="<?php echo base_url().'user/edit/'.$row['usn'];?>" class="btn btn-primary btn-sm"><i class="icon-pencil"></i> Edit</a>
                        <a href="<?php echo base_url().'user/delete/'.$row['usn'];?>" class="btn btn-danger btn-sm"><i class="icon-trash"></i> Delete</a>
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