
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
    <table class="table table-striped " id="example">
          <thead>
            <tr>
             <th >Transaction Number</th>
              <th>Consignee Name</th>
              <th>Processor Name</th>
              <th>Status</th>
              <th>Transaction Type</th>
              <th>Bureau</th>
              <th>Packing</th>
               <th>Commercial</th>
               <th>Bill of Lading</th>
               <th>Billing File </th>
              <th>Date Started</th>
              <th>Date Ended</th>
              <th>Date Created</th>
            <th>Options</th>
            </tr>
          </thead>
          <tbody>


          <?php foreach ($transactions as $row) : 
            $processor = getProcessor($row->processor_id);
          ?>
            <tr>
              <td scope="row"><?php echo $row->transaction_number;?></td>
              <td><?php echo $row->first_name . ' ' . $row->last_name;?></td>
              <td><?php echo  empty($processor->first_name) ? 'waiting' : $processor->first_name . ' ' . $processor->last_name; ?></td>
              <td><?php echo $row->transaction_status;?></td>
              <td><?php echo $row->transaction_type;?></td>
            <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->bureau; ?>" target="_blank"><?php echo $row->bureau; ?></a></td>
            <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->packing; ?>" target="_blank"><?php echo $row->packing; ?></a></td>
            <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->commercial; ?>" target="_blank"><?php echo $row->commercial; ?></a></td>
            <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->bill; ?>" target="_blank"><?php echo $row->bill; ?></a></td>
            <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->billing_file; ?>" target="_blank"><?php echo $row->billing_file; ?></a></td>
           
              <td><?php echo empty($row->date_started) ? 'waiting' : $row->date_started;?></td>
              <td><?php echo empty($row->date_ended) ? 'waiting' : $row->date_ended;?></td>
             
            <td><?php echo $row->date_posted;?></td>
            <td>
        
           <a href="<?php echo base_url("AccountingController/bill/"); ?><?php echo $row->transaction_id; ?>/<?php echo $row->transaction_number ?>/<?php echo $row->first_name;?>/<?php echo $row->last_name;?>" style="padding:15px;"  class="btn btn-sm btn-info">Bill</a>
            <!-- <a href=""     class="btn btn-sm btn-success text-white">Balances</a> -->
            <a href="#" onclick="uploadFile('<?php echo $row->transaction_id; ?>')" style="padding:15px;margin-top:5px"  class="btn btn-sm btn-info">Upload Billing File</a>
           
          </td>
            </tr>
        <?php endforeach; ?> 
          </tbody>
        </table>

   <form method="post" action="<?php echo base_url('AccountingController/uploadFile');  ?>" enctype="multipart/form-data">
		<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Billing File</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<div class="form-group">
			    <input type="hidden" value="" name="transaction_id" id="transaction_id"> 
          <input type="file" class="form-control" name="billingfile" required>
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
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