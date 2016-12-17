
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
        
       echo form_open('welcome/insertUserCard'); 
        
        ?>
     
    
            <div class="col-md-8">
                <div class="form-group">
        <select class="form-control" id="card" name="cardname">
        <option>Visa</option>
        <option>Master</option>
        <option>Visa Electron</option>
        <option>American Express</option>
      </select>
    </div>
            </div>
                
            
            <div class="col-md-8">
                <div class="form-group">
        <input type="text" name="iban" class="form-control input-lg" placeholder="iban">
    </div>
                <div class="form-group">
        <input type="text" name="cc" class="form-control input-lg" placeholder="cc">
    </div>
            </div>
            
            <div class="col-md-8">
                <p class="text-center">Amount withdrawn from card</p>
              <div class="form-group">
        <input type="text" name="amount" class="form-control input-lg" placeholder="$100">
    </div>  
                
                <div class="form-group">
        <button type='submit' class="btn btn-primary btn-lg btn-block">ADD</button>
    </div>
            </div>
            
            
                
            
    
   
       
   
    
            </div>
       
    </div>
</section>
