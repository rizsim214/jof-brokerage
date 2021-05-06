<div class="main">
    <div class="container " id="contains">
        <center><h2>Billing Statement</h2></center>
        <form method="post" action="<?php echo base_url("AccountingController/billingSubmit"); ?>">
        <input type="hidden" name="transaction_id" value="<?php echo $transaction_id; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Transaction Number: </label>
                    <input type="text" name="transaction_number" value="<?php echo $transaction_number; ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                    <label>Date Created: </label>
                    <input type="date" name="date" value="<?php echo date("Y-m-d", strtotime( $transaction_details['date_posted'])); ?>"  class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Bill to: </label>
                    <input type="text" name="bill_to" value="<?php echo $name; ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                    <label>Invoice No: </label>
                    <input type="text" name="invoice_no" value="<?php echo !empty($transaction_billing['invoice_no']) ? $transaction_billing['invoice_no']: ''; ?>" class="form-control">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Customer PO: </label>
                    <input type="text" name="customer_po" value="<?php echo !empty($transaction_billing['customer_po']) ? $transaction_billing['customer_po'] : ''; ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                 <div class="form-group">
                    <label>Shipping Method: </label>
                    <input type="text" name="shipping_method" value="<?php echo !empty($transaction_billing['shipping_method']) ? $transaction_billing['shipping_method']: ''; ?>" class="form-control">
                </div>
            </div>
             <div class="col-md-4">
                 <div class="form-group">
                    <label>Payment Term: </label>
                    <input type="text" name="payment_term" value="<?php echo !empty($transaction_billing['payment_term']) ? $transaction_billing['payment_term']: ''; ?>" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ship Date: </label>
                    <input type="date" name="ship_date" value="<?php echo !empty($transaction_billing['shipping_date']) ? $transaction_billing['shipping_date']: ''; ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                    <label>Due Date: </label>
                   <input type="date" name="ship_date" value="<?php echo !empty($transaction_billing['due_date']) ? $transaction_billing['due_date']: ''; ?>" class="form-control">
                </div>
            </div>
        </div>


        <table class="table">
            <thead>
                <tr>
                <th scope="col">Quantity</th>
                <th scope="col">Item</th>
                <th scope="col">Description</th>
                <th scope="col">GL Account</th>
                 <th scope="col">Unit Price</th>
                  <th scope="col" width="10%">Tax (%)</th>
                   <th scope="col" width="20%">Amount</th>
                </tr>
            </thead>
            <tbody>
            
             <?php 
             $counter= 0;
             foreach($billing_items as $row){

                $CI =& get_instance();
                $CI->load->model('AdminModel');
                if(!empty($transaction_billing['transaction_billing_id'])){
                    $rowResult = $CI->AdminModel->getTransactionItem($row->billing_items_id, $transaction_billing['transaction_billing_id']);
                    
                }
              

                 ?>
                <tr>
                <input type="hidden" name="billing_item_id[]" value="<?php echo $row->billing_items_id; ?>">
                    <td width="10"><input type="text" id="quantity<?php echo $counter; ?>"  value="<?php echo !empty($rowResult['quantity']) ? $rowResult['quantity'] : ''; ?>" class="form-control" oninput="compute('<?php echo $counter; ?>')" name="quantity[]"></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->description; ?></td>
                    <td><?php echo $row->gl_account; ?></td>
                    <td id="price<?php echo $counter; ?>">₱ <?php echo number_format($row->unit_price, 2); ?></td>
                    <td width="10">
                    <input type="checkbox" style="width: 26px;height: 26px;" id="tax<?php echo $counter ?>" oninput="compute('<?php echo $counter; ?>', '<?php echo !empty($row->billing_tax) ? $row->billing_tax : ''; ?>')" <?php echo ($rowResult['tax']) ? 'checked' : ''; ?>  name="tax[]" class="form-control">
                    
                    </td>
                    <td width="10">
                        <input type="text"  value="<?php echo !empty($rowResult['amount']) ? $rowResult['amount'] : ''; ?>" id="amount<?php echo $counter ?>" class="form-control amount" name="amount[]" readonly>
                    </td>
                </tr>
            <?php 
        $counter++;
        } ?>
            </tbody>
            </table>
            <h1 style="text-align: end;margin-right:100px" id="grandtotal"></h1>
            <button class="btn btn-success" style="float:right" type="submit">Submit</button>
            </form>
            <br>
            <br>
            <br>
    </div>
</div>
<script>

function compute(counter, billing_tax){
    var total = 0;
    var quantity = $("#quantity"+counter+"").val();
    var price = $("#price"+counter+"").html();
    var tax = 0;
    price = price.replace('₱ ', '');
    price = price.replace(',', '');
    price = parseFloat(price);

    if($('#tax'+counter+':checkbox:checked').length > 0){
        tax = billing_tax;
    }
   

    if(tax && quantity){
        tax = parseFloat(tax) / 100;
        tax = (quantity * price) * tax;
   
        total = (quantity * price) + tax;
    }else{
        total = quantity * price;
    }
 

    $("#amount"+counter+"").val(total.toFixed(2));

    var grandtotal = 0;
    $('.amount').each(function(i, obj) {
        if(obj.value){
            grandtotal = grandtotal + parseFloat(obj.value);
        }
        
    });
    $("#grandtotal").html("Total: " + grandtotal.toFixed(2));
}

</script>