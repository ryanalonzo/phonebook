<?php

require_once('../vendor/autoload.php');

$vivid = new Vivid('localhost', 'phonebook', 'root', 'password');
$users = $vivid->table('users')
               ->get();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phonebook</title>
</head>
<body>
    <form action="#" method="POST">
        <table>
            <thead>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile Number</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </thead>
            <tbody>
            <?php foreach($users as $user): ?>
                <?php $id = $user->id;?>
                <tr>
                    <td><?php echo $user->first_name;?></td>
                    <td><?php echo $user->last_name;?></td>
                    <td><?php echo $user->mobile_number;?></td>
                    <td><?php echo $user->home_number;?></td>
                    <td>
                        <input type="submit" name="update<?php echo $id;?>" value="Update">
                        <input type="submit" name="delete<?php echo $id;?>" value="Delete">
                    <td>
                </tr>
                <?php
                    if(isset($_POST['delete'.$id])) {
                        $vivid->delete('users',$id);
                        header('Location: index.php');
                    }
                ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </form>
    <button><a href="createContact.php">Add new Contact</a></button>
</body>
</html>