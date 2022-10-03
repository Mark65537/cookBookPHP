<?php
    include 'opendb.php';
    include 'layout.php';

    if(!empty($_GET) && isset($_GET['id'])) {
        $id = $_GET['id'];
        $data = $pdo->query('SELECT * FROM recipe_models WHERE id=' . $id);
        $result = $data->fetch(PDO::FETCH_OBJ);
        $foto = $result->foto;
        $name = $result->name;
        $ingredients = $result->ingredients;
        $steps = $result->steps;
        echo "
            <h1>Detile Recipe</h1>
    
    
    
            <div class='bg-light shadow-sm mx-auto' style='width: 80%; height: 200px; border-radius: 21px 21px 0 0;'>
                        <image class='recipeImg' src='/images/$foto'>
                        <span>
                            <label>Recipe name: <b>$name</b>
                            <br>Ingredients: $ingredients
                            <br>Steps: $steps</label>
                        </span>
            </div><p>
        ";

    }else{
        echo "Error to show detiles";
    }
?>



