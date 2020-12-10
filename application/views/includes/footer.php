</div>
   <footer>

   </footer>
   
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url();?>assets/js/jquery-3.5.1.slim.min.js" ></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js" ></script>
     <script src="<?php echo base_url();?>assets/js/font_awesome.js" ></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" ></script>
     <script src="<?php echo base_url();?>assets/js/jof_javascript.js" ></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
     <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  </body>
</html>
<script>
$(document).ready(function() {
    $('#example').DataTable();
    $('#example1').DataTable();
    $('#exampleFeedback').DataTable();
    $('#exampleAppointment').DataTable();
    $('#exampleGlossary').DataTable();
} );
function declineTransaction(transaction_id, consignee_id, transaction_number) {
		$('#transaction_id').val(transaction_id);
		$('#consignee_id').val(consignee_id);
		$('#transac_number').val(transaction_number);
		$('#declineModal').modal('show');

	}
	
	function changeStatus(transaction_id, consignee_id, transaction_number){

		$('#transaction').val(transaction_id);
		$('#consignee').val(consignee_id);
		$('#transaction_number').val(transaction_number);
		$('#changeModal').modal('show');
	}
    function checkPassword(){
         var pass = $('#pass').val();
         var conf_pass = $('#conf_pass').val();
         
         if(pass != conf_pass){
            $("#password_message").css("display", "block");
         }else{
            $("#password_message").css("display", "none");
         }
    }
    function viewStatus(status, destination, origin, time_of_departure, time_of_arrival){
    var html = '';
    if(status == 'pending'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step ">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }else if(status == 'accepted'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }else if(status == 'declined'){
      html =  '<div class="step step-declined step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Declined</div>'+
                  '<div class="caption">Pleae Contact Admin</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }else if(status == 'documentation'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }
    else if(status == 'processing (Entry Processing unit number)'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }
    else if(status == 'processing (Examiner)'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }

    else if(status == 'processing (Appraiser)'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }

    else if(status == 'processing (Chief Division)'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }
    else if(status == 'processing (Payments of customs TAX)'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }
    else if(status == 'processing (Final assestment Notice)'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }
    else if(status == 'processing (Duties and Taxes paid)'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }
    else if(status == 'releasing'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }
    else if(status == 'delivering'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>';
                  if(destination != ''){
                    html += '<div class="caption">Destination : ' + destination +'</div>'+
                  '<div class="caption">Origin : '+ origin +'</div>'+
                  '<div class="caption">Time of Departure : '+ time_of_departure +'</div>';
                  }
                  html += '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }

    else if(status == 'arrived'){
      html =  '<div class="step">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>';
                  if(time_of_arrival != ''){
                    html += '<div class="caption">Time of Arrival : ' + time_of_arrival +'</div>';
                  }
                  html +=  '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>';
                  if(destination != ''){
                    html += '<div class="caption">Destination : ' + destination +'</div>'+
                  '<div class="caption">Origin : '+ origin +'</div>'+
                  '<div class="caption">Time of Departure : '+ time_of_departure +'</div>';
                  }
                  html += '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }
    else if(status == 'done'){
      html =  '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">14</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">13</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Arrived</div>';
                  if(time_of_arrival != ''){
                    html += '<div class="caption">Time of Arrival : ' + time_of_arrival +'</div>';
                  }
                  html +=  '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">12</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>';
                  if(destination != ''){
                    html += '<div class="caption">Destination : ' + destination +'</div>'+
                  '<div class="caption">Origin : '+ origin +'</div>'+
                  '<div class="caption">Time of Departure : '+ time_of_departure +'</div>';
                  }
                  html += '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">11</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Duties and Taxes paid)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Final assestment Notice)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Payments of customs TAX)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Chief Division)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Appraiser)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Examiner)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Processing (Entry Processing unit number)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step  step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documentation</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Accepted</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Pending</div>'+
                '</div>'+
              '</div>';
    }
   
    $('#stepper').html(html);
    $('#status').modal('show');
  }
</script>