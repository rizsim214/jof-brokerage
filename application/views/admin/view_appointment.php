

<div class="container col-md-6 mt-5 message__container">
    <h2 class="text-center mt-3 box__name">Message Content</h2>
    <hr>
<?php foreach($message_data as $message) :?>
    <div class="message__sender row ml-1 ">
         <h2>From:</h2><h3 class="pt-1 ml-2"><?php echo ucwords($message->firstname.' '.$message->lastname);?></h3>
    </div>
    <hr>
   

    <div class="message__box ml-1">
         <h3>Predefined Questions:</h3>
         <ul>
         <?php
        
         $arr = explode(',',$message->message);
         for($i =0; $i < count($arr); $i++){
            echo "<li>".ucwords($arr[$i]) ."</li>";
         }
         
         
         ?> </ul>
    </div>  
    <hr>
    <div class="message__box ml-1">
         <h3>Message:</h3><p><?php echo $message->other_message;?> </p>
    </div>  
<?php endforeach;?>
    
</div>
<div class="container text-center mt-2">
    <a href="<?php echo base_url('back_to_appointments');?>" class="btn btn-lg btn-secondary mx-auto"><i class="fa fa-step-backward mr-2"></i>Go back</a>
</div>
