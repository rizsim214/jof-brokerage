

<br>
<br>
<br>
<div class="container">



<h2 class="text-dark display-3" style="text-align:center"> Reports </h2>
<br>

<br>

<h2 class="text-dark 5"> List of completed transactions </h2>
<hr>



<table id="exampleReport" class="table table-striped table-bordered table-light" style="width:100%">
        <thead>
            <tr>
                <th>Transaction Number</th>
                <th>Consignee Name</th>
                <th>Processor's Name</th>
                <th>Transaction Type</th>
                <th>Date Started</th>
                <th>Date Ended</th>
                <th>Status</th>
               
            </tr>
        </thead>
        <tbody>
                              <?php  foreach($done as $row)
                                       : $processor = getProcessor($row->processor_id) ?> 
                                  
                                      
                                
                               
                                    <tr>
                                    <td><?php echo $row->transaction_number; ?></td>
                                    <td><?php echo ucfirst($row->first_name) . ' ' . ucfirst($row->last_name);?></td>
                                    <td><?php echo empty($processor->first_name) ? 'waiting' : ucfirst($processor->first_name) . ' ' . ucfirst($processor->last_name); ?></td>
                                    <td><?php echo ucfirst($row->transaction_type); ?></td>
                                    <td><?php echo $row->date_started; ?></td>
                                    <td><?php echo $row->date_ended; ?></td>
                                    <?php if($row->status == 'delivered')?>
                                        
                                                 <td><?php echo ucfirst($row->status);  ?> (Done)</td>   
                                        
                                </tr>              
        
            </tr>
            <?php  endforeach; ?>   

        </tbody>
        <tfoot>
            <tr>
            <th>Transaction Number</th>
                <th>Consignee Name</th>
                <th>Processor's Name</th>
                <th>Transaction Type</th>
                <th>Date Started</th>
                <th>Date Ended</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>


</div>

<br>
<br>
<br>