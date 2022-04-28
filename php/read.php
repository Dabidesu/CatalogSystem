<?php
    include 'db.php';
    if(isset($_GET['search']))
    {
        $filtervalues = $_GET['search'];
        $sql = "select * from catalog where CONCAT(prod_name, prod_price, prod_desc) like '%$filtervalues%' ";
        $result = $con->query($sql);
        $id = (isset($_GET['id']) ? $_GET['id'] : '');
        while($row = $result->fetch_assoc()) {
            if (isset($id) && $row['id'] == $id) {
                echo '<form class="form-inline m-2" action="php/update.php" method="POST">';
                echo '<td><input type="text" class="form-control" name="prod_name" value="'.$row['prod_name'].'"></td>';
                echo '<td><input type="number" class="form-control" name="prod_price" value="'.$row['prod_price'].'"></td>';
                echo '<td><input type="text" class="form-control" name="prod_image" value="'.$row['prod_image'].'"></td>';
                echo '<td><input type="text" class="form-control" name="prod_desc" value="'.$row['prod_desc'].'"></td>';
                echo '<td><input type="number" class="form-control" name="prod_stock" value="'.$row['prod_stock'].'"></td>';
                echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
                echo '<input type="hidden" name="id" value="'.$row['id'].'">';
                echo '</form>';
            }
            else {
                echo "<tr>";
                echo "<td>" . $row['prod_name'] . "</td>";
                echo "<td>" . $row['prod_price'] . "</td>";
                echo "<td>" . $row['prod_image'] . "</td>";
                echo "<td>" . $row['prod_desc'] . "</td>";
                echo "<td>" . $row['prod_stock'] . "</td>";
                echo '<td><a class="btn btn-success" href="admin.php?id=' . $row['id'] . '" role="button">Update</a></td>';
                echo '<td><a class="btn btn-danger" href="php/delete.php?id=' . $row['id'] . '" role="button">Delete</a></td>';
                echo "</tr>";
            }
        
        }
    }
    else
    {
        $sql = "select * from catalog";
        $result = $con->query($sql);
        $id = (isset($_GET['id']) ? $_GET['id'] : '');
        while($row = $result->fetch_assoc()) {
            if (isset($id) && $row['id'] == $id) {
                echo '<form class="form-inline m-2" action="php/update.php" method="POST">';
                echo '<td><input type="text" class="form-control" name="prod_name" value="'.$row['prod_name'].'"></td>';
                echo '<td><input type="number" class="form-control" name="prod_price" value="'.$row['prod_price'].'"></td>';
                echo '<td><input type="text" class="form-control" name="prod_image" value="'.$row['prod_image'].'"></td>';
                echo '<td><input type="text" class="form-control" name="prod_desc" value="'.$row['prod_desc'].'"></td>';
                echo '<td><input type="number" class="form-control" name="prod_stock" value="'.$row['prod_stock'].'"></td>';
                echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
                echo '<input type="hidden" name="id" value="'.$row['id'].'">';
                echo '</form>';
            }
            else {
                echo "<tr>";
                echo "<td>" . $row['prod_name'] . "</td>";
                echo "<td>" . $row['prod_price'] . "</td>";
                echo "<td>" . $row['prod_image'] . "</td>";
                echo "<td>" . $row['prod_desc'] . "</td>";
                echo "<td>" . $row['prod_stock'] . "</td>";
                echo '<td><a class="btn btn-success" href="admin.php?id=' . $row['id'] . '" role="button">Update</a></td>';
                echo '<td><a class="btn btn-danger" href="php/delete.php?id=' . $row['id'] . '" role="button">Delete</a></td>';
                echo "</tr>";
            }
        
        }
    }
    
    $con->close();
?>