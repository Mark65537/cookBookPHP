<?php
include "layout.php";
include 'opendb.php';

if(!empty($_GET) && isset($_GET['id'])) {
    $id=$_GET['id'];
    $data = $pdo->query('SELECT * FROM recipe_models WHERE id=' . $id);
    $result = $data->fetch(PDO::FETCH_OBJ);
    $name = $result->name;
    $steps = $result->steps;

    $data = $pdo->query("SELECT * FROM ingredient_models");
    $ingrs = $data->fetchAll(PDO::FETCH_OBJ);
    echo <<< END
<h1>Add Recipe Form</h1>
    <form method="post" action="addRecipeCheck.php">

        <label for="file">Foto</label><br>
        <input type="file" name="foto" id="r_foto" value="Add Foto" class="form-control">

        <label for="">Recipe name</label></p>
        <input type="text" name="name" id="r_name" class="form-control" value="$name">

        <label for="">Ingredients</label></p>
        <div>
            <div>
                <select id="select">
END;
                    foreach ($ingrs as $obj)
                        echo "<p><option value='$obj->id'> $obj->name </option></p>";

                 echo '
                </select>
                <label id="measure" for="">measure</label>
                <input id="num" type="number" min="1" max="9000" step="1" value="1"/>
                <button type="button" name="ingrAdd" id="ingrAdd">ADD</button>
            </div></p>

            <div id="ingrDiv"  name="ingredients[]" style="background:lightgrey">

            </div>
        </div>

        <label for="">Steps</label></p>
        <textarea type="text" name="steps" id="r_steps" class="form-control">$steps</textarea></p>

        <button type="submit" class="btn btn-success">UPDATE</button>
    </form>
';
} else {
    echo "<span>Recipe is not exist   </span><a href='../recipes.php'>Back</a>";
}
?>

