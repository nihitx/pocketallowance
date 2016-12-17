
<section class="login_form">
    <div class="container">
        
       
        <div class="col-md-12">
    <div class="row text-center">
        <div class="col-md-4 col-sm-12">
            <button type="button" class="btn btn-primary btn-block">Facebook</button>
        </div>
        <div class="col-md-4 col-sm-12">
            <button type="button" class="btn btn-info btn-block">Twitter</button>
        </div>
        <div class="col-md-4 col-sm-12">
            <button type="button" class="btn btn-danger btn-block">Google+</button>
        </div>
    </div>
    <hr />
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
        
       echo form_open('welcome/insertInformation'); 
        
        ?>
     
    <div class="form-group">
        <input type="text" name="name" class="form-control input-lg" placeholder="Name">
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control input-lg" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="text" name="phone" class="form-control input-lg" placeholder="Phone">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control input-lg" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="password" name="password_confirm" class="form-control input-lg" placeholder="Confirm Password">
    </div>
    <div class="form-group">
        <button type='submit' class="btn btn-primary btn-lg btn-block">Sign In</button>
    </div>
</div>
    </div>
</section>
