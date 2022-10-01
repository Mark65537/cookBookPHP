<?php
include "layout.php";
include 'opendb.php';

if(!empty($_GET) && isset($_GET['id'])) {
    $id=$_GET['id'];
    $data = $pdo->query('SELECT * FROM recipe_models WHERE id=' . $id);
    $result = $data->fetch(PDO::FETCH_OBJ);
    $name = $result->name;
    $ingredients = $result->ingredients;
    $steps = $result->steps;

    $data = $pdo->query("SELECT * FROM ingredient_models");
    $ingrs = $data->fetchAll(PDO::FETCH_OBJ);
    $firstMeas=$ingrs[0]->measure;
    echo <<< END
<h1>Add Recipe Form</h1>
    <form method="post" action="updateRecipeCheck.php" id="formRecipe">

        <input type="hidden" name="id" value="$id">
        
        <label for="file">Foto</label><br>
        <input type="file" name="foto" id="r_foto" value="Add Foto" class="form-control">

        <label for="">Recipe name</label></p>
        <input type="text" name="name" id="r_name" class="form-control" value="$name">

        <label for="">Ingredients</label></p>
        <div>
            <div>
                <select id="ingrSel">
END;

    foreach ($ingrs as $obj)
        echo "<p><option value='$obj->measure'> $obj->name </option></p>";

    echo "
                </select>
                
                <input id='num' type='number' min='1' max='9000' step='1' value='1'/>
                <label id= 'measureLab' for=''>$firstMeas</label>
                <button type='button' name='ingrAdd' id='ingrAdd'>ADD</button>
                
            </div></p>
            
            <input name='ingredients' id='ingrInp' type='hidden' />
            <div id='ingrDiv' style='background:lightgrey'>
    ";

    if(!empty($ingredients)){
        $ingredients=explode('; ',$ingredients);
        foreach ($ingredients as $obj)
            if(!empty($obj))
                echo "<span><span id='ingrSpan' style='background:#966636'>$obj</span>
                        <button id='but_X' type='button'>X</button>&nbsp;</span>";
    }

    echo "
            </div>
            
        </div>

        <label for=''>Steps</label></p>
        <textarea type='text' name='steps' id='r_steps' class='form-control'>$steps</textarea></p>

        <button type='submit' class='btn btn-success'>UPDATE</button>
    </form>
    ";
} else {
    echo "<span>Recipe is not exist   </span><a href='../recipes.php'>Back</a>";
}
?>

