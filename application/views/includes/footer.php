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
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
     <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/plug-ins/1.10.24/sorting/absolute.js"> </script>
  </body>
</html>
<script>
$(document).ready(function() {
   
   
    //var table = $('#datatable').dataTable(order: [[1, "desc"]]);
   // var nameType = $.fn.dataTable.absoluteOrder( 'pending' );
    $('#example').DataTable({
  "ordering": false
});
    $('#example1').DataTable();
    $('#exampleMine').DataTable({
  "ordering": false
});
    
    $('#exampleFeedback').DataTable();
    $('#exampleAppointment').DataTable({
        /* No ordering applied by DataTables during initialisation */
        "order": []
    });
    
    $('#exampleGlossary').DataTable();
    
} );
function declineTransaction(transaction_id, consignee_id, transaction_number) {
		$('#transaction_id').val(transaction_id);
		$('#consignee_id').val(consignee_id);
		$('#transac_number').val(transaction_number);
		$('#declineModal').modal('show');

	}

  $(document).ready(function() {
    //var table = $('#datatable').dataTable(order: [[1, "desc"]]);
    $('#exampleReport').DataTable({
  "ordering": false
});
} );
	
	function changeStatus(transaction_id, consignee_id, transaction_number, status, transaction_type){
    if(status != 'accepted' && status != 'declined'){
      $('#statusChange').val(status);
    }

    if(status == "documentation"){
      $(".destination_select").css("display", "block");
    }else{
      $(".destination_select").css("display", "none");
    }
    
    $('#transaction_numbers').val(transaction_number);
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
    function rate(transaction_id, transaction_number, firstname, lastname){

      $('#transaction_id1').val(transaction_id);
      $('#transaction_number').val(transaction_number);
      $('#processor_name').val(firstname + ' ' + lastname);
      $('#rate').modal('show');
    }
    function uploadFile(transaction_id){
      $('#transaction_id').val(transaction_id);
      $("#uploadModal").modal("show");
    }
    function viewStatus(status, destination, origin, time_of_departure, time_of_arrival,transaction_type,transaction_id, reason){
      
      $('#transaction_id').val(transaction_id);
      $('#transaction_number').val(transaction_number);
      $('#transaction_type').val(transaction_type);
      
    var html = '';
    if(status == 'pending'){
      html =  
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivered (Done)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Cash Division</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Assessment Division</div>'+
                '</div>'+
              '</div>'+
            
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>';

                if(transaction_type == 'import'){
                  html +=  '<div class="title">Submission of Import Entry</div>';
                }else{
                  html +=  '<div class="title">Submission of Export Entry</div>';
                }
                 

                html += '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
              //     '<div class="circle">3</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documentation</div>'+
              //   '</div>'+
              // '</div>'+
              // '<div class="step">'+
              //   '<div>'+
              //     '<div class="circle">2</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documents has been approved</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documents (pending for approval)</div>'+
                '</div>'+
              '</div>';
    }else if(status == 'accepted'){
      html =  
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivered  (Done)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Cash Division</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Assessment Division</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>';

                if(transaction_type == 'import'){
                  html +=  '<div class="title">Submission of Import Entry</div>';
                }else{
                  html +=  '<div class="title">Submission of Export Entry</div>';
                }
                 

                html +=  '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
              //     '<div class="circle">3</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documentation</div>'+
              //   '</div>'+
              // '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">2</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documents has been approved</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Document are Approved </div>'+
                '</div>'+
              '</div>';
    }else if(status == 'submission of entry'){
      html =  
              //   '<div class="step">'+
              //   '<div>'+
              //     '<div class="circle">10</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Done</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivered (Done)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Cash Division</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Assessment Division</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>';

                if(transaction_type ==  'import'){
                  html +=  '<div class="title">Submission of Import Entry</div>';
                }else{
                  html +=  '<div class="title">Submission of Export Entry</div>';
                }
                 

                html +=  '<div class="caption">- Entry Processing Unit</div></div>'+
                 
              '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">3</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documentation</div>'+
              //   '</div>'+
              // '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">2</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documents has been approved</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documents are Approved</div>'+
                '</div>'+
              '</div>';
    }else if(status == 'documentation'){
      html =  
              // '<div class="step">'+
              //   '<div>'+
              //     '<div class="circle">10</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Done</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivered (Done)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Cash Division</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Assessment Division</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>';

                if(transaction_type = 'import'){
                  html +=  '<div class="title">Submission of Import Entry</div>';
                }else{
                  html +=  '<div class="title">Submission of Export Entry</div>';
                }
                 

                html +=  '</div>'+
              '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">3</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documentation</div>'+
              //   '</div>'+
              // '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">2</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documents has been approved</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documents are Approved</div>'+
                '</div>'+
              '</div>';
    }
    else if(status == 'declined'){
      html =  '<div class="step step-declined step-active">'+
                '<div>'+
                  '<div class="circle" style="background-color: red;">2</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Declined</div>'+
                  '<div class="caption">Pleae Contact Admin</div>'+
                  '<div class="caption">Reason: '+reason+'</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documents pending for approval</div>'+
                '</div>'+
              '</div>';
    }else if(status == 'assessment division'){
      html =  
              // '<div class="step">'+
              //   '<div>'+
              //     '<div class="circle">10</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Done</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivered  (Done)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Cash Division</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Assessment Division</div>'+
                  '<div class="caption">- Examiner</div>'+
                  '<div class="caption">- Appraiser</div>'+
                  '<div class="caption">- Chief Division</div>'+
                  '<div class="caption">- Issue Final Assessment Notice</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>';

                if(transaction_type = 'import'){
                  html +=  '<div class="title">Submission of Import Entry</div>';
                }else{
                  html +=  '<div class="title">Submission of Export Entry</div>';
                  
                }
                 

                html +='<div class="caption">- Entry Processing Unit</div></div>'+ 
                '</div>'+
              '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">3</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documentation</div>'+
              //   '</div>'+
              // '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">2</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documents has been approved</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documents are Approved</div>'+
                '</div>'+
              '</div>';
    }
    else if(status == 'cash division'){
      html =  
              // '<div class="step">'+
              //   '<div>'+
              //     '<div class="circle">10</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Done</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivered  (Done)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Cash Division</div>'+
                  '<div class="caption">For import - Issuance of statement of settlement of duties and taxes</div>'+
                  '<div class="caption">For export - Exempted duties/taxes, stamps and processing fee</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Assessment Division</div>'+
                  '<div class="caption">- Examiner</div>'+
                  '<div class="caption">- Appraiser</div>'+
                  '<div class="caption">- Chief Division</div>'+
                  '<div class="caption">- Issue Final Assessment Notice</div>'+
                  '</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>';

                if(transaction_type = 'import'){
                  html +=  '<div class="title">Submission of Import Entry</div>';
                }else{
                  html +=  '<div class="title">Submission of Export Entry</div>';
                }
                 

                html += '<div class="caption">- Entry Processing Unit</div></div>'+ 
              '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">3</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documentation</div>'+
              //   '</div>'+
              // '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">2</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documents has been approved</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documents (Approved by the Broker)</div>'+
                '</div>'+
              '</div>';
    }
    else if(status == 'releasing'){
      html = 
              //  '<div class="step">'+
              //   '<div>'+
              //     '<div class="circle">10</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Done</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivered  (Done)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivering</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Cash Division</div>'+
                  '<div class="caption">For import - Issuance of statement of settlement of duties and taxes</div>'+
                  '<div class="caption">For export - Exempted duties/taxes, stamps and processing fee</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Assessment Division</div>'+
                  '<div class="caption">- Examiner</div>'+
                  '<div class="caption">- Appraiser</div>'+
                  '<div class="caption">- Chief Division</div>'+
                  '<div class="caption">- Issue Final Assessment Notice</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>';

                if(transaction_type = 'import'){
                  html +=  '<div class="title">Submission of Import Entry</div>';
                }else{
                  html +=  '<div class="title">Submission of Export Entry</div>';
                }
                 

                html += '<div class="caption">- Entry Processing Unit</div></div>'+ 
              '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">3</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documentation</div>'+
              //   '</div>'+
              // '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">2</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documents has been approved</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documents (Approved by the Broker)</div>'+
                '</div>'+
              '</div>';
    }

    else if(status == 'delivering'){
      html = 
              //  '<div class="step">'+
              //   '<div>'+
              //     '<div class="circle">10</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Done</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivered  (Done)</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">6</div>'+
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
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Cash Division</div>'+
                  '<div class="caption">For import - Issuance of statement of settlement of duties and taxes</div>'+
                  '<div class="caption">For export - Exempted duties/taxes, stamps and processing fee</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Assessment Division</div>'+
                  '<div class="caption">- Examiner</div>'+
                  '<div class="caption">- Appraiser</div>'+
                  '<div class="caption">- Chief Division</div>'+
                  '<div class="caption">- Issue Final Assessment Notice</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>';

                if(transaction_type = 'import'){
                  html +=  '<div class="title">Submission of Import Entry</div>';
                }else{
                  html +=  '<div class="title">Submission of Export Entry</div>';
                }
                 

                html += '<div class="caption">- Entry Processing Unit</div></div>'+ 
              '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">3</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documentation</div>'+
              //   '</div>'+
              // '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">2</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documents has been approved</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documents (Approved by the Broker)</div>'+
                '</div>'+
              '</div>';
    }

    else if(status == 'delivered'){
      html = 
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivered (Done)</div>';
                  if(time_of_arrival != ''){
                    html += '<div class="caption">Time of Arrival : ' + time_of_arrival +'</div>';
                  }
                  html +=  '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">6</div>'+
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
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Cash Division</div>'+
                  '<div class="caption">For import - Issuance of statement of settlement of duties and taxes</div>'+
                  '<div class="caption">For export - Exempted duties/taxes, stamps and processing fee</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">3</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Assessment Division</div>'+
                  '<div class="caption">- Examiner</div>'+
                  '<div class="caption">- Appraiser</div>'+
                  '<div class="caption">- Chief Division</div>'+
                  '<div class="caption">- Issue Final Assessment Notice</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">2</div>'+
                '</div>'+
                '<div>';

                if(transaction_type = 'import'){
                  html +=  '<div class="title">Submission of Import Entry</div>';
                }else{
                  html +=  '<div class="title">Submission of Export Entry</div>';
                }
                 
                html += '<div class="caption">- Entry Processing Unit</div></div>'+ 
                
              '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">3</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documentation</div>'+
              //   '</div>'+
              // '</div>'+
              // '<div class="step step-active">'+
              //   '<div>'+
              //     '<div class="circle">2</div>'+
              //   '</div>'+
              //   '<div>'+
              //     '<div class="title">Documents has been approved</div>'+
              //   '</div>'+
              // '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documents (Approved by the Broker)</div>'+
                '</div>'+
              '</div>';
    }
    
    else if(status == 'done'){
      html =  '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">10</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Done</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">9</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Delivered (Done)</div>';
                  if(time_of_arrival != ''){
                    html += '<div class="caption">Time of Arrival : ' + time_of_arrival +'</div>';
                  }
                  html +=  '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">8</div>'+
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
                  '<div class="circle">7</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Releasing</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">6</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Cash Division</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">5</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Assessment Division</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">4</div>'+
                '</div>'+
                '<div>';

                if(transaction_type = 'import'){
                  html +=  '<div class="title">Submission of Import Entry</div>';
                }else{
                  html +=  '<div class="title">Submission of Export Entry</div>';
                }
                 

                html += '<div class="caption">- Entry Processing Unit</div></div>'+ 
              '</div>'+
              '<div class="step step-active">'+
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
                  '<div class="title">Documents has been approved</div>'+
                '</div>'+
              '</div>'+
              '<div class="step step-active">'+
                '<div>'+
                  '<div class="circle">1</div>'+
                '</div>'+
                '<div>'+
                  '<div class="title">Documents pending for approval</div>'+
                '</div>'+
              '</div>';
    }
    $('#transaction_id').val(transaction_id);
    $('#stepper').html(html);
    $('#status').modal('show');
  }
  var grandtotal = 0;
    $('.amount').each(function(i, obj) {
        if(obj.value){
            grandtotal = grandtotal + parseFloat(obj.value);
        }
        
    });
    $("#grandtotal").html("Total: " + grandtotal);
</script>