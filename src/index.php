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
                    <form action="updateContact.php" method = "POST">
                        <input type = "submit" name = "update" value="Update">
                        <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <input type = "submit" name = "delete<?php echo $id; ?>" value="Delete">
                    </form>
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
    <button>
        <a href="createContact.php">Add new Contact</a>
    </button>
</body>
</html>