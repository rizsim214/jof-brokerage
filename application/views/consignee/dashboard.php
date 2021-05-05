<style>
          
        .myButtons li{
            display: inline-block;
            overflow: hidden;
            padding: 0px 4px 0px 6px;
        }
          
    </style>

<div class="container-fluid ml-3 pr-n3">
<br>
<br>

<ul class="myButtons">
<li><h3 class="text-dark"> Please choose to start a Transaction: </h3></li>
<li> <button type="button" class="btn btn-primary" style="margin-right:15px " data-toggle="modal" data-target="#importModal">Import</button></li>
<li><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exportModal">Export</button></li>
 </ul>


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
          <h4 class="text-dark"> Bureau of Customs Registration</h4>
          <p class="text-dark"> This document is a proof of Registration to the Bureau of Customs. </p>
        <input type="file"  name="bureau" id="import" required>
        <br>
        <br>
        <h4 class="text-dark"> Packing List</h4>
        <p class="text-dark"> This document provides information about the shipment, including how it's packed. </p>
        <input type="file"  name="packing" id="import" required>
        <br>
        <br>
        <h4 class="text-dark"> Bill of Lading</h4>
        <p class="text-dark"> This document provides evidence of shipment, and this will serve as a 'Title' to the owner of the cargo </p>
        <input type="file"  name="bill" id="import" required>
        <br>
        <br>
        <h4 class="text-dark"> Commercial Invoice</h4>
        <p class="text-dark"> This document is a proof of Registration to the Bureau of Customs. </p>
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
      
      <!-- <input type="text" name="transaction_id" id="transaction_id"> -->
        <h5 class="modal-title" id="exampleModalLabel">Transaction status</h5>
        <input type="hidden" class="form-control" id="transaction_id" readonly>
        <h5 class="modal-title" id="transaction_type"> </h5>
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
      <input type="hidden" name="transaction_id" id="transaction_id1">
      <h6 style="color: black"> Transaction Number</h6>
         <input style="color: black" type="text" class="form-control" id="transaction_number" readonly>
         <h6 style="color: black"> Processor's Name</h6>
         <input style="color: black" type="text" class="form-control" id="processor_name" readonly>
         <br>
      <h6 style="color: black"> Rating Number (1.0 - lowest , 5.0 - highest) </h6>
      <div class="form-check">
  <input class="form-check-input" type="radio" value="1" required name="rating_number" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1" style="color: black">
  1 - Very Poor
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="2" required name="rating_number" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1" style="color: black">
   2 - Poor
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="3" required name="rating_number" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1" style="color: black">
  3 -  Fair
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="4" required name="rating_number" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1" style="color: black">
  4 - Good
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="5" required name="rating_number" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1" style="color: black">
 5 -Excellent
  </label>
</div>
<br>
         <!-- <input type="number" class="form-control" name="rating_number" step=".01" min="1.0" max="5.0" required> -->

         <!-- <input type="text" class="form-control" id="processor_name" readonly> -->
         <h6 style="color: black">Message</h6>
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
         <h4 class="text-dark"> Bureau of Custom Registration</h4>
         <p class="text-dark"> This document is a proof of Registration to the Bureau of Customs. </p>
         <input type="file"  name="bureau"  id="export"  required>
         <br>
         <br>
         <h4 class="text-dark"> Packing List</h4>
         <p class="text-dark"> This document provides information about the shipment, including how it's packed. </p>
        <input type="file"  name="packing" id="import" required>
        <br>
         <br>
        <h4 class="text-dark"> Commercial Invoice</h4>
        <p class="text-dark"> A legal document that provides evidence of the sold goods between the buyer and seller.</p>
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
<div  style="float:left; margin-right:40px;">
 <table class="table table-striped "  id="example">
  <thead>
    <tr>
      <th scope="col">Transaction Number</th>
      <th scope="col">Processor Name</th>
      <th scope="col">Processor Company Name</th>
      <th scope="col">Transaction type</th>
      <th scope="col">Bureau of Customs</th>
      <th scope="col">Packing List</th>
      <th scope="col">Commercial Invoice</th>
      <th scope="col">Bill of Lading</th>
      <th scope="col">Billing File</th>
      <th scope="col">Date Started</th>
      <th scope="col">Date Ended</th>
      <th scope="col">Rating</th>
      <th scope="col">Billing</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($transactions as $row) : 
            $ratingCheck = checkRate($row->transaction_id);
            $ratingWord = '';
            if(!empty($ratingCheck)){
              if($ratingCheck->rating == 1){
                $ratingWord = 'Very Poor';
              }else if($ratingCheck->rating == 2){
                $ratingWord = 'Poor';
              }
              else if($ratingCheck->rating == 3){
                $ratingWord = 'Fair';
              }
              else if($ratingCheck->rating == 4){
                $ratingWord = 'Good';
              }
              else if($ratingCheck->rating == 5){
                $ratingWord = 'Excellent';
              }
            }
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
      <td><a href="<?php echo base_url() . 'assets/uploads/files/' . $row->billing_file; ?>" target="_blank"><?php echo $row->billing_file; ?></a></td>
      <td><?php echo empty($row->date_started) ? 'waiting' : $row->date_started; ?></td>
      <td><?php echo empty($row->date_ended) ? 'waiting' : $row->date_ended; ?></td>
      <td><?php echo empty($ratingCheck) ? 'not yet' : $ratingWord; ?></td>
      <td><a href="<?php echo base_url() . 'ConsigneeController/billing/' . $row->transaction_id  .'/' . $row->transaction_number; ?>" class="btn btn-info">View Billing</a></td>
      <td><a href="#" onclick="viewStatus('<?php echo $row->transaction_status ?>', '<?php echo $row->destination; ?>', '<?php echo $row->origin; ?>', '<?php echo $row->time_of_departure; ?>', '<?php echo $row->time_of_arrival;?> ', ' <?php echo $row->transaction_type;?> ','<?php echo $row->transaction_id;?>')" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
  View
</a>
        <?php if($row->transaction_status == 'delivered'){ 
          if(empty($ratingCheck)){
          ?>
          <a href="#" onclick="rate('<?php echo $row->transaction_id ?>', '<?php echo $row->transaction_number ?>', '<?php echo $row->first_name ?>', '<?php echo $row->last_name ?>', ' <?php echo $row->transaction_type;?>')" class="btn btn-success" >
   Rate
</a>
        <?php }else{ ?>
          <!-- <a href="#" onclick="rate('<?php echo $row->transaction_id ?>', '<?php echo $row->transaction_number ?>', '<?php echo $row->first_name ?>', '<?php echo $row->last_name ?>', ' <?php echo $row->transaction_type;?>')" class="btn btn-success" >
   View my rating
</a> -->

    <?php    }} ?>
      </td>
    </tr>
    <?php endforeach; ?> 
   
  </tbody>
</table>
</div>
</div>
