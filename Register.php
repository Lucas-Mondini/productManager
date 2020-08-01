<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="./CSS/index.css">
        <?php
            include("./DB/manager.php");
            include("./classes/product.php");
        ?>
    </head>
    <body>
        <!-- menu  -->
        <label class="menu">
        <a class="selection_button_I" href="index.php">Menu Principal</a>
        <a class="selection_button_I" href="List.php">ver produtos cadastrados</a>
        </label>
        <!-- menu -->

        <!-- campos -->
        <form action="Register.php" method="get" id="registration_form">
        <label>Nome: <input type="text" name="name" placeholder="Ex: banana"></label>
        <label>Tipo: <input type="text" name="type" placeholder="Ex: futa"></label>
        <label>Preço: <input type="number" step="0.01"  name="price" min="1" placeholder="Ex: 35"></label>
        <label>Quantidade: <input type="number" step="1" name="amount" min="1" placeholder="Ex: 1"></label>
        <label>Imposto: <input type="number" step="0.001" name="tax" min="0" max="100" placeholder="em porcentagem"></label>
        <button type="submit" id="Register">Register Product</button>
        <!-- campos -->

        </form>
        <?php 
            $product = new Product($_GET["name"], $_GET["type"], $_GET["price"], $_GET["amount"], $_GET["tax"]);
            if($product->is_initializated()){
                $p = $product->get_query();
                    DB_func('INSERT INTO products (name, type, price, amount, tax) VALUES (' . $p . ')', $pdo);

            }


            

            
        ?>
        
    </body>
</html>