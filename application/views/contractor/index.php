<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Contractor List</div>
            <div class="panel-body">                
            
        <table class="table table-bordered table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th>IC No</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Status</th>
                    <th>Join Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($_list as $row): ?>
                  <tr>
                    <td><?php echo $row['ic_no'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['company'];?></td>
                    <td><?php echo ucfirst($row['status']);?></td>
                    <td><?php echo date('d M Y',$row['start_date']);?></td>
                    <td><a href="<?php echo base_url().'contractor/edit/'.$row['csn'];?>" class="btn btn-primary btn-sm"><i class="icon-pencil"></i> Edit</a>
                        <a href="<?php echo base_url().'contractor/delete/'.$row['csn'];?>" class="btn btn-danger btn-sm"><i class="icon-trash"></i> Delete</a>
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