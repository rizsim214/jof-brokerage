<div class="container">
<br>
<br>
 <button type="button" class="btn btn-primary" style="margin-right:15px" data-toggle="modal" data-target="#importModal">Import</button>
 <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exportModal">Export</button>

 <form method="post" action="<?php echo base_url('ConsigneeController/sendFiles')?>" enctype="multipart/form-data">
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4> Bureau of Custom</h4>
        <input type="file"  name="bureau" id="import" >
        <h4> Packing List</h4>
        <input type="file"  name="packing" id="import" >
        <h4> Bill of Lading</h4>
        <input type="file"  name="bill" id="import" >
        <h4> Commercial Invoice</h4>
        <input type="file"  name="commercial" id="import" >

          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="import" value="Submit" class="btn btn-primary">Submit</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Export</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <h4> Bureau of Custom</h4>
         <input type="file"  name="bureau"  id="export"  >
         <h4> Packing List</h4>
        <input type="file"  name="packing" id="import" >
        <h4> Commercial Invoice</h4>
        <input type="file"  name="commercial" id="import" >
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
      <th scope="col">Bill</th>
      <th scope="col">Date Started</th>
      <th scope="col">Date Ended</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th></th>
      <td></td>
      <td></td>
      <td></td>
      <td><a href="" target="_blank">Image</a></td>
      <td><a href="" target="_blank">Image</a></td>
      <td><a href="" target="_blank">Image</a></td>
      <td>
     
      <a href="" target="_blank">Image</a>
     
      </td>
      <td></td>
      <td></td>
      <td><a href="#" onclick="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
  View
</a>
      </td>
    </tr>

    

   
   
  </tbody>
</table>
</div>
