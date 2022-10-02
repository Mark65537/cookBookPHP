<?php
include 'opendb.php';
include 'layout.php';

$data=$pdo->query('SELECT * FROM recipe_models');
# выбираем режим выборки
$data->setFetchMode(PDO::FETCH_OBJ);

?>

   <a href="Recipe/addRecipe.php">Add new recipe</a>
    <h1>Recipes</h1>

<?php
    while($obj = $data->fetch()) {
        echo "<div class='bg-light shadow-sm mx-auto' style='width: 80%; height: 200px; border-radius: 21px 21px 0 0;'>
                    <image class='recipeImg' src='images/$obj->foto'>
                    <span>
                        <a href='Recipe/detileRecipe.php?id=$obj->id'>$obj->name</a>
                        <a href='Recipe/updateRecipe.php?id=$obj->id'>Update</a> <a href='Recipe/deleteRecipe.php?id=$obj->id'>Delete</a>
                    </span>
               </div><p>";
    }


