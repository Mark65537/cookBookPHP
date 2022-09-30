<?php
    include 'opendb.php';

    if(!empty($_GET) && isset($_GET['id'])) {
        $id=$_GET['id'];
        $data = $pdo->query('SELECT * FROM recipe_models WHERE id=' . $id);
        $name=$data->fetch(PDO::FETCH_OBJ)->name;
echo <<< END
<form  action="deleteRecipeCheck.php" method="post">
    <div>Do you really want to delete <b>$name</b> ?</div>
        <input type="hidden" name="id" value="$id">
        <input type="submit" value="Delete" />
        <a href='../recipes.php'>Back</a>
</form>
END;
    }else{
       echo "<span>Delete error   </span><a href='../recipes.php'>Back</a>";
    }
?>


