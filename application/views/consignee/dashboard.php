<div class="container-fluid ml-2 pr-n3">
<br>
<br>
 <button type="button" class="btn btn-primary" style="margin-right:15px" data-toggle="modal" data-target="#importModal">Import</button>
 <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exportModal">Export</button>

 <form method="post" action="<?php echo base_url('ConsigneeController/sendFiles')?>" enctype="multipart/form-data">
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4> Bureau of Custom</h4>
        <input type="file"  name="bureau" id="import" required>
        <h4> Packing List</h4>
        <input type="file"  name="packing" id="import" required>
        <h4> Bill of Lading</h4>
        <input type="file"  name="bill" id="import" required>
        <h4> Commercial Invoice</h4>
        <input type="file"  name="commercial" id="import" required>

        <br>
        <br>
        <p class="text-dark"> Please Submit <u>genuine</u> and <u>complete</u> Documents.</p>

          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="import" value="Submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>
<div class="modal fade" id="status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transaction status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="stepper">

      </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<form method="post" action="<?php echo base_url('ConsigneeController/rate_transaction')?>">
<div class="modal fade" id="rate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" name="transaction_id" id="transaction_id">
      <h6> Transaction Number</h6>
         <input type="text" class="form-control" id="transaction_number" readonly>
         <h6> Processor's Name</h6>
         <input type="text" class="form-control" id="processor_name" readonly>
      <h6> Rating Number (1.0 - lowest , 5.0 - highest) </h6>
         <input type="number" class="form-control" name="rating_number" step=".01" min="1.0" max="5.0" required>
         <h6>Message</h6>
         <textarea class="form-control" name="message"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="rate" value="submit" class="btn btn-success">Rate</button>
      </div>
    </div>
  </div>
</div>
</form>

<form method="post" action="<?php echo base_url('ConsigneeController/sendFiles')?>" enctype="multipart/form-data">
<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Export</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <h4> Bureau of Custom</h4>
         <input type="file"  name="bureau"  id="export"  required>
         <h4> Packing List</h4>
        <input type="file"  name="packing" id="import" required>
        <h4> Commercial Invoice</h4>
        <input type="file"  name="commercial" id="import" required>

        <br>
        <br>
        <p class="text-dark"> Please Submit <u>genuine</u> and <u>complete</u> Documents.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="export" value="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>

 <br><br><br>

 <table class="table table-striped " id="example">
  <thead>
    <tr>
      <th scope="col">Transaction Number</th>
      <th scope="col">Processor Name</th>
      <th scope="col">Processor Company Name</th>
      <th scope="col">Transaction type</th>
      <th scope="col">Bureau</th>
      <th scope="col">Packing</th>
      <th scope="col">Commercial</th>
      <th scope="col">Bill of Lading</th>
      <th scope="col">Date Started</th>
      <th scope="col">Date Ended</th>
      <th scope="col">Billing</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($transactions as $row) : 
           
            ?>
   <tr>
      <th><?php echo $row->transaction_number; ?></th>
      <td><?php echo empty($row->first_name) ? 'waiting' : $row->first_name . ' ' . $row->last_name; ?></td>
      <td><?php echo empty($row->company_name) ? 'waiting' : $row->company_name; ?></td>
      <td><?php echo $row->transaction_type; ?></td>
      <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->bureau; ?>" target="_blank"><?php echo $row->bureau; ?></a></td>
      <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->packing; ?>" target="_blank"><?php echo $row->packing; ?></a></td>
      <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->commercial; ?>" target="_blank"><?php echo $row->commercial; ?></a></td>
      <td>
      <?php if(!empty($row->bill)){ ?>
      <a href="<?php echo base_url() . 'assets/uploads/files/' . $row->bill; ?>" target="_blank"><?php echo $row->bill; ?></a>
      <?php } ?>
      </td>
      <td><?php echo empty($row->date_started) ? 'waiting' : $row->date_started; ?></td>
      <td><?php echo empty($row->date_ended) ? 'waiting' : $row->date_ended; ?></td>
      <td><a href="<?php echo base_url() . 'ConsigneeController/billing/' . $row->transaction_id  .'/' . $row->transaction_number; ?>" class="btn btn-info">View Billing</a></td>
      <td><a href="#" onclick="viewStatus('<?php echo $row->transaction_status ?>', '<?php echo $row->destination; ?>', '<?php echo $row->origin; ?>', '<?php echo $row->time_of_departure; ?>', '<?php echo $row->time_of_arrival; ?>')" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
  View
</a>
        <?php if($row->transaction_status == 'done'){ ?>
          <a href="#" onclick="rate('<?php echo $row->transaction_id ?>', '<?php echo $row->transaction_number ?>', '<?php echo $row->first_name ?>', '<?php echo $row->last_name ?>')" class="btn btn-success" >
   Rate
</a>
        <?php } ?>
      </td>
    </tr>
    <?php endforeach; ?> 
   
  </tbody>
</table>
</div>
