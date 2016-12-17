
<section class="login_form">
    <div class="container">
        
        <h1>Sign up</h1>
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
