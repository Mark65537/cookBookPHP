<?php
include "layout.php";
include 'opendb.php';

    if(!empty($_GET) && isset($_GET['id'])) {
        $id=$_GET['id'];
        $data = $pdo->query('SELECT * FROM ingredient_models WHERE id=' . $id);
        $result = $data->fetch(PDO::FETCH_OBJ);
        $name = $result->name;
        $measure = $result->measure;
echo <<< END
<h1>Update Ingredient Form</h1>
<form method="post" action="updateIngredientCheck.php">

    <input type="hidden" name="id" value="$id">
    
    <label for="name">Ingredient name</label></p>
    <input type="text" name="name" id="i_name" class="form-control" value="$name">

    <label for="">Measure</label></p>
    <input type="text" name="measure" id="i_meas" class="form-control" value="$measure"></p>

    <button type="submit" class="btn btn-success">UPDATE</button>
</form>
END;

    }else{
        echo "<span>Ingredient is not exist   </span><a href='ingredients.php'>Back</a>";
    }
?>

