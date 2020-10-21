
<div class="container mx-auto my-2">
<h1 class="text-center">FEEDBACKS</h1>
 <?php if($this->session->flashdata('error')) {?>
                 <div class="alert alert-danger mt-5 col-md-8 mx-auto " role="alert">
                       <?php echo $this->session->flashdata('error');?>
                            </div>
                              <?php } elseif($this->session->flashdata('success')) {?>
                                 <div class="alert alert-success mt-5 col-md-8 mx-auto " role="alert">
                                    <?php echo $this->session->flashdata('success');?>
                                         </div>
                         <?php }?>
    <table class="table table-bordered mx-auto">
        <thead class="table-info">
            <tr>
                 <th scope="col">Name</th>
                 <th scope="col">Message</th>
                 <th scope="col">Ratings</th>
                 <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach($feedbacks as $feedback) : ?>

                <th class="text-center"><?php echo ucfirst($feedback->first_name).' '. ucfirst($feedback->last_name);?></th>
                <th><?php echo $feedback->message;?></th>
                <th class="text-center"><?php echo $feedback->rating;?></th>
                <th class="text-center"><a onclick="return confirm('Removing Feedback. Proceed?')" href="<?php echo base_url('delete_feedback')?>/<?php echo $feedback->feedback_ID?>" class="btn btn-danger">Delete</a></th>
            <?php endforeach;?>
        </tbody>
    </table>
            <div class="pagination fa-pull-right">
            <?php echo $this->pagination->create_links();?>
            </div>
</div>
