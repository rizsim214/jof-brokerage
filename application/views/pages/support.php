<div class="container-fluid">
    <div class="card__container__box ">
    <hr>
    <h1 class="section__title">Documents</h1>
        <div class="row ">
            <div class="col-md-8 text-center">
                <p class="label download__title">Samples</p>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <hr class="divider">
        <div class="row">
            <div class="col-md-8 text-center">
                <p class="label text-dark">Commercial Invoice</p>
            </div>
            <div class="col-md-4">
            <a href="<?php echo base_url()?>assets/uploads/files/commercial-invoice-sample.jpg" class="btn btn-md btn-danger" download>Download</a>
            </div>
        </div>
        <hr class="divider">
        <div class="row">
            <div class="col-md-8 text-center">
                <p class="label text-dark">Packing List</p>
            </div>
            <div class="col-md-4">
            <a href="<?php echo base_url()?>assets/uploads/files/packing-list-sample.jpg" class="btn btn-md btn-danger" download>Download</a>
            </div>
        </div>
        <hr class="divider">
        <div class="row">
            <div class="col-md-8 text-center">
                <p class="label text-dark">Bill of Lading</p>
            </div>
            <div class="col-md-4">
            <a href="<?php echo base_url()?>assets/uploads/files/bill-of-lading-sample.jpg" class="btn btn-md btn-danger" download>Download</a>
            </div>
        </div>
        <hr class="divider div__bot">
        
       <hr>
        <h1 class="section__title">References</h1>
        <div class=" row col-lg-12 text-center mb-5 ">
           <div class="col-md-6">
                <a href="#" class="resource">BUREAU OF CUSTOMS</a><br>
                <a href="#" class="resource">Cebu Port Authority</a><br>
                <a href="#" class="resource">Department of Trade and Industry</a><br>
           </div>
              <div class="col-md-6">
                <a href="#" class="resource">Philippine Economic Zone Authority (PEZA)</a><br>
                <a href="#" class="resource">Food and Drug Authority (FDA)</a><br>
           </div>
              
 
        </div>
        <hr>
        <h1 class="section__title">Customer Support</h1>
            <div class="row col-lg-12 text-center mb-5  cu__supt">
                <div class="col-md-4 text-dark">
                    <h3>Email Support</h3>
                    <p> jessie@jofcustomsbrokerage.com </p>
                </div>
                  <div class="col-md-4 text-dark">
                    <h3>Mobile Support</h3>
                     <p>(0916) 660 1514 </p>
                     <p>+63 932 877 2192 </p>
                     <p>032 - 340 5549 </p>
                     
                </div>
                <div class="col-md-4 text-dark ">
                    <h3>Company Information</h3>
                         <p>Igot Compound, M.L. Quezon National Highway,<br> Lapu-Lapu City, Cebu 6015</p>
                         <p>Business Hours: 9:00 AM - 5:00 PM <i class="fas fa-clock-o ml-1"></i></p>
                </div>

            </div>
        <hr>
         <h1 class="section__title">FAQs</h1>
         
            <div class=" container-fluid mb-5 glossary_container ">
              
                <div class="faqs">
                    <h4 >What are the possible expenses for importation?</h4>
                    <p >Duty/Tax <br>
                                          Shipping charges <br>
                                          Trucking  <br>
                                          Brokerage fee & Processing</p>
                </div>
                <div class="faqs">
                    <h4 >What are the requirements for accreditation in customs? The requirements are the following: <br> </h4>
                    <p > BCOR evidencing payment of application fee <br>
                         BIR Importer Clearance Certificate (BIR-ICC) <br>
                         Corporate Secretary Certificate or Special Power of Attorney (SPA) for designated signatories (with sample original signatures) in the import entries <br>
                         Original copy of NBI Clearance issued within three (3) months prior to the date of application of responsible officers/majority stockholders <br>
                         Two (2) valid government issued I.D., with picture <br>
                         Printed copy of CPRS profile of applicant <br>
                         Personal profile of responsible officers/majority stockholders <br>
                         Company profile with picture of premises <br>
                         License/permit/accreditation from concerned agency, when applicable, i.e., food (LTO & CPR), rice (NFA), sugar (SRA), etc.</p>
                </div>
                <div class="faqs">
                    <h4 >What are the requirements for applying the Certificate Of Exemption for Import Clearance Certificate (ICC)? The requirements are the following: <br> </h4>
                    <p > Application Form <br>
                         Packing list; Invoice <br>
                         Import Entry <br>
                         Bill of Lading <br>
                         Summary of Batch Nos./Serial number of Products <br>
                         SEC Certificate <br>
                         Board Resolutions <br>
                         Importer’s Certificate of Accreditation</p>
                </div>
            </div>
    <hr>
         <h1 class="section__title">Glossary of Terms</h1>
         <div class="container-fluid col-md-12 glossary_container">
          <?php foreach($all_glossary as $glossary) : ?>
         <div class=" row mx-auto my-4 pb-3  glossary">
            <div class="col-md-4">
               <h3 class="mt-2"><?php echo ucwords($glossary->glossary_term);?></h3>
            </div>
            <div class="col-md-8">
                <p class="mt-2" style="color:red;"><?php echo ucfirst($glossary->glossary_meaning);?></p>
            </div>
            
        </div>
        <?php endforeach;?>
                <!-- <div class="pagination mx-auto">
                   <?php echo $this->pagination->create_links();?>
                </div> -->
     </div>
            
    </div>
   <hr>
        <div class="copyright text-center mb-2 ">Copyright: JOF CUSTOMS BROKERAGE 2020</div>
</div>