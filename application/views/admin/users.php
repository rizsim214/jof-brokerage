<div class="container mt-5">
<div class="row">


        <div class="col-md-6">
        <h1>Employees</h1>
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($employees as $employee) : ?>           
                <tr>
                    <td><?php echo ucfirst($employee->first_name).' '.ucfirst($employee->last_name);?></td>
                    <td><?php 
				      if($employee->user_role == '4'){
				      		echo "Admin";
				      }elseif($employee->user_role == '2'){
				      		echo "Processor";
				      }elseif($employee->user_role == '3'){
				      		echo "Accounting";
				      } ?></td>
                    <td><a href="#" class="btn btn-success mr-2"><i class="fas fa-glass"></i></a> <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                </tr>
                    <?php endforeach;?>

            </tbody>
        </table>
                      
        </div>

        <div class="col-md-6">
        <h1>Clients</h1>
        <table class="table table-bordered table-hover">
            <thead class="table-info">
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($clients as $client) {?>           
                <tr>
                    <td><?php echo ucfirst($client->first_name).' '.ucfirst($client->last_name);?></td>
                    <td><?php echo $client->active_status;?></td>
                    <td><a href="#" class="btn btn-success mr-2"><i class="fas fa-glass"></i></a> <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
                    
                </div>
            </div>
        </div>
</div>