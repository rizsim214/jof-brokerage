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
                
                <th scope="col">Item</th>
                <th scope="col">Description</th>
                <th scope="col">GL Account</th>
                <th scope="col">Unit Price</th>
                <th scope="col" width="10%">Tax (%)</th>
                <th scope="col">Action</th>
                
            
                </tr>
            </thead>
            <tbody>
            
             <?php 
            
             foreach($this_billing as $row) : ?>
                  <?php echo form_open('update_this_bill/'.$row->billing_items_id);?>
                <tr>
                <input type="hidden" name="billing_item_id" value="<?php echo $row->billing_items_id; ?>">
                    
                    <td width="25%"><input type="text" class="form-control" name="billing_form_name" value="<?php echo $row->name; ?>"></td>
                    <td width="30%"><input type="text" class="form-control" name="billing_form_desc" value="<?php echo $row->description; ?>"></td>
                    <td width="15%"><input type="text" class="form-control" name="billing_form_account" value="<?php echo $row->gl_account; ?>"></td>
                    <td width="15%"><input type="text" class="form-control" name="billing_form_price" value="<?php echo$row->unit_price;?>"></td>
                    <td width="15%"><input type="text" class="form-control" name="billing_form_tax" value="<?php echo $row->billing_tax; ?>"></td>

                    <td><button type="submit" value="submit" class="btn btn-outline-success">Submit</button></td> 
                </tr>

                   
                  <?php echo form_close();?>
            <?php  endforeach; ?>

            </tbody>
            </table>
            </form>
            <br>
            <br>
            <br>
       
    </div>
</div>

 

    <!-- UPDATE BILLING TAX/UNIT PRICE -->


<script>


// function amount(){
//     var amount = document.getElementById('price_amount').value;
//     console.log(amount);
// }



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