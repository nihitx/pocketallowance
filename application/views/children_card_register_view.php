<section class="login_form">
   <div class="container">
      <div class="col-md-8 col-md-offset-3">
         <h1>Enter your debit/credit card details</h1>
         <?php
            if(validation_errors() != false) 
            { 
                echo '<div class="form-group alert alert-danger alert-box has-error">';
                    echo'<ul>';
                        echo validation_errors('<li class="control-label">', '</li>');
                    echo'</ul>';
                echo '</div>';   
            }
            
            /* form-horizontal */
            
            echo form_open('welcome/insertUserChildrenCard'); 
            
            ?>
         <div class="col-md-8">
            <div class="form-group">
               <select class="form-control" id="Spouse" name="daugtherOrSon">
                  <option>Son</option>
                  <option>daughter</option>
               </select>
            </div>
            <div class="form-group">
               <input type="text" name="name" class="form-control input-lg" placeholder="Name">
            </div>
            <div class="form-group">
               <input type="text" name="iban" class="form-control input-lg" placeholder="iban">
            </div>
            <div class="form-group">
               <input type="text" name="cc" class="form-control input-lg" placeholder="cc">
            </div>
            <div class="form-group">
                <p>Notice - This amount will be cut off from the amount your card, we recommend
                to start off with 10 to 15 Euro</p>
               <input type="text" name="amount" class="form-control input-lg" placeholder="Amount">
            </div>
            <div class="form-group">
               <button type='submit' class="btn btn-primary btn-lg btn-block">ADD</button>
            </div>
         </div>
      </div>
   </div>
</section>