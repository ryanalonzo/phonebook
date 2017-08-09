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
        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user->first_name;?></td>
                <td><?php echo $user->last_name;?></td>
                <td><?php echo $user->mobile_number;?></td>
                <td><?php echo $user->home_number;?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>