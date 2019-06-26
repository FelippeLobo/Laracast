<?php require 'app/views/partials/head.php' ?>

<h1 align="center">Felippe's Tasks </h1>


    <a href="tasks/create">Create a task</a>

    <table>
            <tr>
                <th>Description</th>
                <th>Completed</th>   
                <th></th> 
                <th></th>
            <tr>  

    <?php foreach($tasks as $task){ ?>
     
            <tr>

                <td><?php echo utf8_encode($task->description) ?></td>

            <?php if($task->completed == true) { ?>

                <td>Yes</td> 

            <?php }else { ?> 

                <td>No</td> 

            <?php } ?>

            <td><a href="tasks/edit?id=<?php echo $task->id ?>">Edit</a></td>
            <td><a href="tasks/show?id=<?php echo $task->id ?>">Show</a></td>
            <td><a href="tasks/delete?id=<?php echo $task->id ?>">Delete</td>

            <tr>  

      
    
    <?php } ?>   

    </table>
    

<?php require 'app/views/partials/footer.php' ?>
