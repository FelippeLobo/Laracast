<?php require 'app/views/partials/head.php' ?>

<h1 align="center">Felippe's Tasks </h1>


<a href="/tasks">Back</a>

<p>Description = <?php echo $task[0]->description ?></p>
<p>Completed =  <?php if( $task[0]->completed == true) { ?>

                Yes 

                <?php }else { ?> 

                No 

                <?php } ?></p>

  
           
            
     
           
      
    
      

<?php require 'app/views/partials/footer.php' ?>
