

<div class="container col-md-10 mt-5 ">
    <h2 class="text-center mt-3 box__name">Update Logs</h2>
   
     <table class="table table-bordered table-hover" id="example1">
                    <thead class="table-info">
                        <tr>
                            
                            <th>Name of Editor</th>
                            <th>Description</th>
                            <th>Date Updated</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach ($update_logs as $report) : ?>         
                    <tr>  
                            <td><h5><?=$report->updater_name;?></h5></td>
                            <td><h5><?= $report->update_desc;?></h5></td>   
                            <td><h5><?= $report->date_updated;?></h5></td>       
                    </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
    
</div>

