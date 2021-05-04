<div class="main">
    <div class="container " id="contains">
        <center><h2>Billing Statement</h2></center>
     
        <input type="hidden" name="transaction_id" value="<?php echo $transaction_id; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Transaction Number: </label>
                    <input type="text" name="transaction_number" readonly value="<?php echo $transaction_number; ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                    <label>Date Created: </label>
                    <input type="date" name="date" readonly value="<?php echo date("Y-m-d", strtotime( $transaction_details['date_posted'])); ?>" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Bill to: </label>
                    <input type="text" name="bill_to" readonly value="<?php echo $name; ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                    <label>Invoice No: </label>
                    <input type="text" name="invoice_no" readonly value="<?php echo $transaction_billing['invoice_no']; ?>" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Customer PO: </label>
                    <input type="text" name="customer_po" readonly value="<?php echo $transaction_billing['customer_po']; ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                 <div class="form-group">
                    <label>Shipping Method: </label>
                    <input type="text" name="shipping_method" readonly value="<?php echo $transaction_billing['shipping_method']; ?>" class="form-control">
                </div>
            </div>
             <div class="col-md-4">
                 <div class="form-group">
                    <label>Payment Term: </label>
                    <input type="text" name="payment_term" readonly value="<?php echo $transaction_billing['payment_term']; ?>" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ship Date: </label>
                    <input type="date" name="ship_date" readonly value="<?php echo $transaction_billing['shipping_date']; ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                    <label>Due Date: </label>
                    <input type="date" name="due_date" readonly value="<?php echo $transaction_billing['due_date']; ?>" class="form-control">
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
                $rowResult = $CI->AdminModel->getTransactionItem($row->billing_items_id, $transaction_billing['transaction_billing_id']);


                 ?>
                <tr>
                <input type="hidden" name="billing_item_id[]" value="<?php echo $row->billing_items_id; ?>">
                    <td width="10"><input type="text" readonly id="quantity<?php echo $counter; ?>" value="<?php echo $rowResult['quantity'] ?>" class="form-control" oninput="compute('<?php echo $counter; ?>')" name="quantity[]"></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->description; ?></td>
                    <td><?php echo $row->gl_account; ?></td>
                    <td id="price<?php echo $counter; ?>">₱ <?php echo number_format($row->unit_price, 2); ?></td>
                    <td width="10"><input type="number" readonly id="tax<?php echo $counter ?>" oninput="compute('<?php echo $counter; ?>')" value="<?php echo $rowResult['tax'] ?>" name="tax[]" class="form-control"></td>
                    <td width="10"><input type="text" value="<?php echo $rowResult['amount'] ?>" id="amount<?php echo $counter ?>" class="form-control" name="amount[]" readonly></td>
                </tr>
            <?php 
        $counter++;
        } ?>
            </tbody>
            </table>
       
            <br>
            <br>
            <br>
    </div>
</div>
<script>

function compute(counter){
    var total = 0;
    var quantity = $("#quantity"+counter+"").val();
    var price = $("#price"+counter+"").html();
    var tax = 0;
    price = price.replace('₱ ', '');
    price = price.replace(',', '');
    price = parseFloat(price);

    tax = $("#tax"+counter+"").val();

    if(tax && quantity){
        tax = parseFloat(tax) / 100;
        tax = price * tax;
   
        total = (quantity * price) + tax;
    }else{
        total = quantity * price;
    }
   

    $("#amount"+counter+"").val(total.toFixed(2));
}

</script>