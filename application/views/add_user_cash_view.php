<script type="text/javascript" src="//payment.paytrail.com/js/payment-widget-v1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/addCash.js" ></script>
<section class="login_form">
   <div class="container">
      <div class="col-md-8 col-md-offset-3">
          <h1>Add Cash </h1>
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
            
            echo form_open('welcome/addCashToUserAcc'); 
            
            ?>
      </div>
      <div class="col-md-8">
         <div class="form-group">
             <input type="text" name="amount" data-bind="value: cash " class="form-control input-lg" placeholder="$100">
             <span id="user_id" data-value="<?php echo $user_id ; ?>"></span>
         </div>
      </div>
      <div class="col-md-8">
         <div class="form-group">
            <button type='submit' class="btn btn-primary btn-lg btn-block">PAY WITHOUT PAYTRAIL</button>
            <p class="text-center">This method does not use bank transfer</p>
         </div>
      </div>
      </form>
      <div style="margin : 8px 0px 20px 0px "class="col-md-8">
         <a style=" color : #fff;"href="#" <a href="#" data-bind="click: $root.getPaytrailTokenWithAjax"><button class="btn btn-primary btn-lg btn-block">PAY WITH PAYTRAIL</button></a>
      </div>
      <div class="col-md-8">
         <a style=" color : #fff;"href="<?php echo base_url(); ?>index.php/welcome/Admin"><button class="btn btn-primary btn-lg btn-block">Back</button></a>
      </div>
   </div>
   </div>
</section>




