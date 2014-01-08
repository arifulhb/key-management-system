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
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($_list as $row): ?>
                  <tr>
                    <td><a href="<?php echo base_url().'request/edit/'.$row['rsn'];?>"><?php echo $row['rsn'];?></a></td>
                    <td><a href="<?php echo base_url().'request/edit/'.$row['rsn'];?>"><?php echo date('d M Y',$row['request_date']);?></a></td>
                    <td><?php echo $row['lecturer'];?></td>
                    <td><?php echo $row['contractor'];?></td>
                    <td><?php echo date('d M Y',$row['from_date']);?></td>
                    <td><?php echo date('d M Y',$row['to_date']);?></td>
                    <td><?php echo $row['status'];?></td>
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