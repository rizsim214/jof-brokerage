<div class="main">
 <?php if($this->session->flashdata('error')) {?>
                 <div class="alert alert-danger mt-5 col-md-8 mx-auto " role="alert">
                       <?php echo $this->session->flashdata('error');?>
                            </div>
                              <?php } elseif($this->session->flashdata('success')) {?>
                                 <div class="alert alert-success mt-5 col-md-8 mx-auto " role="alert">
                                    <?php echo $this->session->flashdata('success');?>
                                         </div>
                         <?php }?>
    <div class="container " id="contains">
        <center><h2 class="my-5">BILLING FORM</h2></center>
       

        <table class="table">
            <thead>
                <tr>
                <th scope="col">Quantity</th>
                <th scope="col">Item</th>
                <th scope="col">Description</th>
                <th scope="col">GL Account</th>
                <th scope="col">Unit Price</th>
                <th scope="col" width="10%">Tax (%)</th>
                
                <th scope="col" >Update</th>
                <th scope="col" >Delete</th>
                </tr>
            </thead>
            <tbody>
            
             <?php 
            //  $counter= 0;
             foreach($billing_form as $row){

                 ?>
                  
                <tr>
                <input type="hidden" name="billing_item_id" value="<?php echo $row->billing_items_id; ?>">
                    <td width="10"><input type="text"  class="form-control"  name="quantity" disabled></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->description; ?></td>
                    <td><?php echo $row->gl_account; ?></td>
                    <td>₱ <?php echo number_format($row->unit_price, 2); ?></td>

                    <td width="10"><?php echo $row->billing_tax * 100;?> %</td>
                    
                    <td><a href="<?php echo base_url('view_this_bill');?>/<?php echo $row->billing_items_id;?>"  class="btn btn-md btn-info mr-2" id="pass_data" ><i class="fas fa-pen mr-2"></i>Update Item</a></td>
                    <td><a onclick="return confirm('Removing Billing Item. Proceed?')" href="<?php echo base_url('delete_billing_item')?>/<?php echo $row->billing_items_id;?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>

                </tr>
                 
            <?php 
        // $counter++;
        } ?>
            </tbody>
            </table>
            <div class="row" style="float:right">
                <a href="#" class="btn btn-md btn-primary mr-2" data-toggle="modal" data-target="#addbillItemModal"><i class="fas fa-plus-circle mr-2"></i>Billing Item</a>
                 
            </div>
            </form>
            <br>
            <br>
            <br>
       
    </div>
</div>

 <div class=" modal fade" id="addbillItemModal" tabindex="-1" role="dialog" aria-labelledby="addbillItemModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

                 <h4 class="modal-title mx-auto" id="addAccountModalLAbel">ADD BILLING ITEM</h4>   
            </div>
            
              <hr>
             <div class="modal-body">
                 <div class="container">
                        <?php echo form_open('add_billing_item');?>

                        
                            <div class="form-group ">
                                <label for="billingItem">Item Name*</label>
                                <input type="text" class="form-control" name="billingItem"  required >
                            </div>
                            <div class="form-group ">
                                <label for="billingDesc">Item Description* </label>
                                <input type="text" class="form-control" name="billingDesc"  required >
                            </div>
                             <div class="form-group ">
                                <label for="gl_account">GL Account</label>
                                <input type="text" class="form-control" name="gl_account"  required >
                            </div>
                            <div class="form-group ">
                                <label for="unit_price">Unit Price*</label>
                                <input type="number" class="form-control" name="unit_price"  required >
                            </div>
                            <div class="form-group ">
                                <label for="unit_tax">Tax*</label>
                                <input type="text" class="form-control" name="unit_tax"  required >
                            </div>

                        <div class="text-center">
                           <button  type="submit" class="btn btn-md btn-danger mt-3" >ADD Billing Item </button>
                        </div>
                        <?php echo form_close();?>
                 </div> 
             </div>
                <div class="modal-footer mx-auto">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
          </div>
      </div>
    </div> 

    <!-- UPDATE BILLING TAX/UNIT PRICE -->


<script>






// function compute(counter){
//     var total = 0;
//     var quantity = $("#quantity"+counter+"").val();
//     var price = $("#price"+counter+"").html();
//     var tax = 0;
//     price = price.replace('₱ ', '');
//     price = price.replace(',', '');
//     price = parseFloat(price);

//     tax = $("#tax"+counter+"").val();

//     if(tax && quantity){
//         tax = parseFloat(tax) / 100;
//         tax = price * tax;
   
//         total = (quantity * price) + tax;
//     }else{
//         total = quantity * price;
//     }
   

//     $("#amount"+counter+"").val(total.toFixed(2));
// }


</script> 