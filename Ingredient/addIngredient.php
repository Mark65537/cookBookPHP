<?php
include "layout.php";
//header('Content-type: application/json');
?>
<h1>Add Ingredient Form</h1>
<form method="post" action="addIngredientCheck.php">

    <label for="name">Ingredient name</label></p>
    <input type="text" name="name" id="i_name" class="form-control">

    <label for="">Measure</label></p>
    <input type="text" name="measure" id="r_meas" class="form-control"></p>

    <button type="submit" class="btn btn-success">ADD</button>
</form>
