<?php
    include "layout.php";
    include "opendb.php";

    $data = $pdo->query("SELECT * FROM ingredient_models");
    $ingrs = $data->fetchAll(PDO::FETCH_OBJ);
?>

<h1>Add Recipe Form</h1>
    <form method="post" action="addRecipeCheck.php" id="formRecipe">

        <label for="file">Foto</label><br>
        <input type="file" name="foto" id="r_foto" value="Add Foto" class="form-control">

        <label for="">Recipe name</label></p>
        <input type="text" name="name" id="r_name" class="form-control">

        <label for="">Ingredients</label></p>
        <div>
            <div>
                <select id="select">
                    <?php foreach ($ingrs as $obj): ?>
                        <p><option value="<?php echo $obj->id;?>"> <?php echo $obj->name; ?> </option></p>
                    <?php endforeach; ?>
                </select>
                <label id="measure" for="">measure</label>
                <input id="num" type="number" min="1" max="9000" step="1" value="1"/>
                <button type="button" name="ingrAdd" id="ingrAdd">ADD</button>
            </div></p>

            <input name='ingredients' id='ingrInp' type='hidden' />
            <div id="ingrDiv" style="background:lightgrey">

            </div>
        </div>
<!--        <textarea type="text" name="ingredients" id="r_ingr" class="form-control"></textarea>-->

        <label for="">Steps</label></p>
        <textarea type="text" name="steps" id="r_steps" class="form-control"></textarea></p>

        <button type="submit" class="btn btn-success">CREATE</button>
    </form>