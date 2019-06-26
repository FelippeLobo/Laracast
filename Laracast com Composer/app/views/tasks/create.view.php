<?php require 'app/views/partials/head.php' ?>

<h1 align="center">Felippe's Tasks </h1>


    <a href="/tasks">Back</a>

    <form action="/tasks/store" method="post">
        <input type="text" name="description" placeholder="put here your task">
        <input type="checkbox" name="completed">
        <button type="submit">Create</button>
    </form>
    

<?php require 'app/views/partials/footer.php' ?>
