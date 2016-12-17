
<section class="login_form">
    <div class="container">
       <?php
       if(validation_errors() != false) 
        { 
            echo '<div class="form-group alert alert-danger alert-box has-error">';
                echo'<ul>';
                    echo validation_errors('<li class="control-label">', '</li>');
                echo'</ul>';
            echo '</div>';   
        }
       ?>
       
        <div class="col-md-8 col-md-offset-4">
            <h1>Add Cash </h1>
            
            <p>Adding cash on <?php echo $name ?> account</p>
            
        <?php
        
        
        
        /* form-horizontal */
        
       echo form_open('welcome/addCashToUserChildAcc/'.$childID); 
        
        ?>
     
    
           
           </div> 
            <div class="col-md-8 col-md-offset-1">
                <div class="form-group">
                    <input type="text" name="amountofchild" class="form-control input-lg" placeholder="$50">
                </div>
            </div>
            
            <div class="col-md-8 col-md-offset-1">
                <div class="form-group">
                    <button type='submit' class="btn btn-primary btn-lg btn-block">ADD</button>
                </div>
            </div>
        </form>
         <div class="col-md-8 col-md-offset-1">
            <a style=" color : #fff;"href="<?php echo base_url(); ?>index.php/welcome/Admin"><button class="btn btn-primary btn-lg btn-block">Back</button></a>
        </div>
        </div>
</section>
