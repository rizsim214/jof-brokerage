

<div class="container col-md-6 mt-2 message__container">
    <h2 class="text-center mt-3 box__name">Update Glossary</h2>
    <hr>
<?php foreach($this_glossary as $glossary) :?>
    <?php echo form_open('update_glossary/'.$glossary->glossary_ID);?>
        <div class="message__subject row ml-1 ">
            <h3>Term:</h3> <input type="text" class="form-control text-center" name="glossary_term" value="<?= $glossary->glossary_term?>">
        </div>
        <hr>
        <div class="message__subject row ml-1">
            <h3>Definition:</h3><textarea name="glossary_meaning"  class="form-control" rows="3" value="<?= $glossary->glossary_meaning?>"></textarea>
        </div>    
            <div class="text-center">
                <button  type="submit" class="btn btn-md btn-danger mt-3" >Submit Update</button>
            </div>
      <?php echo form_close();?>
<?php endforeach;?>
    
</div>

