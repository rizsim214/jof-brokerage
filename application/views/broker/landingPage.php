
  

  
    <br><br>
    <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <?php } ?>
            <?php if($this->session->flashdata('error')){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>


                


            
            <?php } ?>
            
            
            <h2 class="text-dark" style="text-align:center;"> Active Transactions </h2>
            <hr>
            
            <br>
            <br>
    <table class="table table-hover table-striped  table-light" id="example">
          <thead>
            <tr>
             <th >Transaction Number</th>
              <th>Consignee Name</th>
              <th>Processor Name</th>
              <th>Status</th>
              <th>Transaction Type</th>
              <th>Bureau of Customs Registration</th>
              <th>Packing List</th>
               <th>Commercial Invoice</th>
               <th>Bill of Lading</th>
              <!-- <th scope="col" span="3">Files</th> -->
      
              <!-- <th scope="col"></th> -->
              <th>Date Started</th>
              <th>Date Ended</th>
              <th>Date Created</th>
              <th>Billing</th>
            <th>Options</th>
            </tr>
          </thead>
          <tbody>


          <?php foreach ($transactions as $row) : 
            $processor = getProcessor($row->processor_id);
          ?>
            <tr>
              <td scope="row"><?php echo $row->transaction_number;?></td>
              <td><?php echo ucfirst($row->first_name) . ' ' . ucfirst($row->last_name);?></td>
              <td><?php echo  empty($processor->first_name) ? 'waiting' : $processor->first_name . ' ' . $processor->last_name; ?></td>
              <td><?php echo ucfirst($row->transaction_status)?></td>
              <td><?php echo ucfirst($row->transaction_type);?></td>
            <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->bureau; ?>" target="_blank"><?php echo $row->bureau; ?></a></td>
            <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->packing; ?>" target="_blank"><?php echo $row->packing; ?></a></td>
            <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->commercial; ?>" target="_blank"><?php echo $row->commercial; ?></a></td>
            <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->bill; ?>" target="_blank"><?php echo $row->bill; ?></a></td>
           
              <td><?php echo empty($row->date_started) ? 'waiting' : $row->date_started;?></td>
              <td><?php echo empty($row->date_ended) ? 'waiting' : $row->date_ended;?></td>
             
            <td><?php echo $row->date_posted;?></td>
            <td><a href="<?php echo base_url("BrokerController/bill/"); ?><?php echo $row->transaction_id; ?>/<?php echo $row->transaction_number ?>/<?php echo $row->first_name;?>/<?php echo $row->last_name;?>"  class="btn btn-sm btn-info">View Billing</a>  </td>
            <td>
          <?php if($row->transaction_status == 'pending' || $row->transaction_status == 'declined'){ ?>
           <a href="<?php echo base_url() . 'BrokerController/acceptTransaction/' . $row->transaction_id . '/' . $row->consignee_id . '/' . $row->transaction_number; ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-success">Accept</a>
            <a href="#" onclick="declineTransaction('<?php echo  $row->transaction_id; ?>', '<?php echo  $row->consignee_id; ?>', '<?php echo  $row->transaction_number; ?>')"    class="btn btn-sm btn-danger text-white">Decline</a>
          <?php }else{ ?>
            <a href="#" onclick="changeStatus('<?php echo  $row->transaction_id; ?>', '<?php echo  $row->consignee_id; ?>', '<?php echo  $row->transaction_number; ?>', '<?php echo  $row->status; ?>')" class="btn btn-sm btn-info text-white">Change Status</a>
          <?php } ?>
          </td>
            </tr>
        <?php endforeach; ?> 
          </tbody>
        </table>

     

<form method="post" action="<?php echo base_url('BrokerController/changeStatus');  ?>">

		<div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
			
        <h5 class="modal-title text-dark"> Change status </h5>
        <input type="text" class="form-control" id="transaction_numbers" readonly>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<div class="form-group">
			<input type="hidden" value="" name="transaction_number" id="transaction_number"> 
			<input type="hidden" value="" name="transaction_id" id="transaction"> 
			<input type="hidden" value="" name="consignee_id" id="consignee"> 
			<select  class="form-control" name="status" onchange="statusOnChange()" id="statusChange">
      <option value="" >Choose status</option>
            <option value="documentation">1. Documentation</option>
            <option value="submission of entry">2. Submission of Entry </option>
            <option value="assessment division">3. Assessment Division </option>
            <option value="cash division">4. Cash Division</option>
             <option value="releasing">5. Releasing</option>
            <option value="delivering">6. Delivering</option>
            <option value="delivered">7. Delivered</option>
            <!-- <option value="done">Done</option> -->
			</select>
      
			</div>
      <div style="<?php ?>" class="destination_select">
      <div class="form-group">
      <label class="text-dark">Destination</label>
      <input type="text" class="form-control" name="destination" id="destination" required>
      </div>
      
      <div class="form-group">
      <label class="text-dark">Origin</label>
      <input type="text" class="form-control" name="origin" id="origin" required>
      </div>

      </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</div>
		</div>
		</div>
</form> 



<form method="post" action="<?php echo base_url('BrokerController/declineTransaction');  ?>">
		<div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Reason</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<div class="form-group">
			    <input type="hidden" value="" name="transaction_id" id="transaction_id"> 
				<input type="hidden" value="" name="consignee_id" id="consignee_id"> 
        <input type="hidden" value="" name="transaction_number" id="transac_number"> 
				<textarea class="form-control" name="reason"></textarea>
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</div>
		</div>
		</div>
    
  
		</form>

    <style>
    #example_wrapper{
      margin-right: 50px;
      margin-left: 50px;
    }
    </style>
    <script>
  
      function statusOnChange(){
          if($("#statusChange").val() == "documentation"){
              $(".destination_select").css("display", "block");
              $("#destination").prop('required', true);
            $("#origin").prop('required', true);
          }else{
            $(".destination_select").css("display", "none");
            $("#destination").prop('required', false);
            $("#origin").prop('required', false);
          }
      }
    </script>