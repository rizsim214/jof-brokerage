

<div class="container col-md-6 mt-2 message__container">
    <h2 class="text-center mt-3 box__name">Update Predefined Question</h2>
    <hr>
<?php foreach($this_question as $question) :?>
    <?php echo form_open('update_question/'.$question->question_ID);?>
        <div class="message__subject row ml-1 ">
            <h3>Question:</h3> <input type="text" class="form-control text-center mr-3" name="question" value="<?= $question->question_content?>">
        </div>
        <hr>

            <div class="text-center">
                <button  type="submit" class="btn btn-md btn-danger mt-3" >Submit Update</button>
            </div>
      <?php echo form_close();?>
<?php endforeach;?>
    
</div>

