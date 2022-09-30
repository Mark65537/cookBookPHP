<?php
include 'opendb.php';
include 'layout.php';

$data=$pdo->query('SELECT * FROM ingredient_models');
# выбираем режим выборки
$data->setFetchMode(PDO::FETCH_OBJ);

?>

    <a href="Ingredient/addIngredient.php">Add new ingredient</a>
    <h1>Ingredients</h1>

<?php
while($obj = $data->fetch()) {
    echo '<div class="bg-light shadow-sm" style="width: 80%; height: 80px; border-radius: 21px 21px 0 0;"></p>';
    echo "<b>$obj->name</b> Measure: 1 $obj->measure</p>";
    echo "<a href='updateIngredient.php?id=$obj->id'>Update</a> <a href='deleteIngredient.php?id=$obj->id'>Delete</a>";
    echo '</div>';
}
?>


