<div style="margin-top : 50px;" class="jumbotron">
      <div class="container">
          <?php if(validation_errors() != false) 
        { 
            echo '<div class="form-group alert alert-danger alert-box has-error">';
                echo'<ul>';
                    echo validation_errors('<li class="control-label">', '</li>');
                echo'</ul>';
            echo '</div>';   
        }
         ?>
        <h1>Welcome to Pocket Allowance</h1>
        <p>Where you can transfer money easily between your family memebers internationally without any transaction costs.</p>
        <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>index.php/welcome/register" role="button">Sign up</a></p>
      </div>
    </div>