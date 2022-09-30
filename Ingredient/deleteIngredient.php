<?php
    include 'opendb.php';

    if(!empty($_GET) && isset($_GET['id'])) {
        $id=$_GET['id'];
        $data = $pdo->query('SELECT * FROM ingredient_models WHERE id=' . $id);
        $name=$data->fetch(PDO::FETCH_OBJ)->name;
echo <<< END
<form  action="deleteIngredientCheck.php" method="post">
    <div>Do you really want to delete <b>$name</b> ?</div>
        <input type="hidden" name="id" value="$id">
        <input type="submit" value="Delete" />
        <a href='ingredients.php'>Back</a>
</form>
END;
    }else{
       echo "<span>Delete error   </span><a href='ingredients.php'>Back</a>";
    }
?>


