<div class="jumbotron">
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
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>index.php/welcome/register" role="button">Sign up</a></p>
      </div>
    </div>