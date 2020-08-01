<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>List</title>
        <link rel="stylesheet" href="./CSS/index.css">
        <?php 
            include("./DB/manager.php");
            include("./classes/product.php");
        ?>
    </head>
    <body>
        <label class="menu">
        <a class="selection_button_I" href="index.php">Menu Principal</a>
        <a class="selection_button_I" href="Register.php">Cadastrar Produto</a>
        </label>

        <table>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>imposto</th>
                <th>Preço total do item</th>
                <th>Imposto total do item</th>
                <th>Deletar</th>
            </tr>
            <?php 
                $SQuery = "SELECT * FROM products";
                $DQuery = "DELETE FROM products WHERE id=".$_GET["id"];
                $pgsqlD = $pdo->prepare($DQuery);
                $pgsqlD->execute();
                $pgsqlD->fetch(PDO::FETCH_ASSOC);

                $pgsql = $pdo->prepare($SQuery);
                $pgsql->execute();
                $total_price;
                $total_tax;
                while($data = $pgsql->fetch(PDO::FETCH_ASSOC)){?>
            <tr>
                <td><?php echo $data["id"]; ?></td>
                <td><?php echo $data["name"]; ?></td>
                <td><?php echo $data["type"]; ?></td>
                <td><?php echo $data["price"]; ?></td>
                <td><?php echo $data["amount"]; ?></td>
                <td><?php echo $data["tax"]; ?>%</td>
                <td><?php echo $data["price"]*$data["amount"]; ?></td>
                <td><?php echo $data["tax"]*($data["price"]*$data["amount"])/100; ?></td>
                <?php   $total_price += $data["price"]*$data["amount"];
                        $total_tax += (($data["price"]*$data["amount"])*$data["tax"])/100;
                 ?>
                 
                <?php echo '<td>
                    <a class="selection_button" href="List.php?id='.$data["id"].'">Deletar item</a>
                </td>';
                ?>
            </tr>

            <?php }?>

            <br><br>
            <tr>
                <th>Valor total</th>
                <th>Imposto Total</th>
            </tr>
            <tr>
                <td><?php echo $total_price; ?></td>
                <td><?php echo $total_tax; ?></td>
            </tr>        

        </table>





    </body>


</html>