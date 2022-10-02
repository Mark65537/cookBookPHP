<?php
    include "layout.php";
    include "opendb.php";

    $data = $pdo->query("SELECT * FROM ingredient_models");
    $ingrs = $data->fetchAll(PDO::FETCH_OBJ);
    $firstMeas=$ingrs[0]->measure;
?>

<h1>Add Recipe Form</h1>
    <form method="post" action="addRecipeCheck.php" id="formRecipe" enctype="multipart/form-data">

        <label for="">Foto</label><br>
        <input type="file" name="foto" id="fotoInp" class="form-control" multiple accept=".jpg,.jpeg,.png,.gif,.bmp">

        <label for="">Recipe name</label></p>
        <input type="text" name="name" id="r_name" class="form-control">

        <label for="">Ingredients</label></p>
        <div>
            <div>
                <select id="ingrSel">
                    <?php foreach ($ingrs as $obj): ?>
                        <p><option value="<?php echo $obj->measure;?>"> <?php echo $obj->name; ?> </option></p>
                    <?php endforeach; ?>
                </select>

                <label id="measureLab" for=""><?php echo $firstMeas?></label>
                <input id="num" type="number" min="1" max="9000" step="1" value="1"/>
                <button type="button" name="ingrAdd" id="ingrAdd">ADD</button>

            </div></p>

            <input name='ingredients' id='ingrInp' type='hidden' />
            <div id="ingrDiv" style="background:lightgrey">

            </div>
        </div>

        <label for="">Steps</label></p>
        <textarea type="text" name="steps" id="r_steps" class="form-control"></textarea></p>

        <button type="submit" class="btn btn-success">CREATE</button>
    </form>