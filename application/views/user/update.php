<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h2>User Update</h2>

<?= validation_errors(); ?>

<?php echo form_open('user/update/' . $user->id); ?>
<table>
    <tr>
        <td><label for="username">Username</label></td>
        <td><input id="username" type="input" name="username" size="50" value="<?= $user->username ?>"/></td>
    </tr>
    <tr>
        <td><label for="password">Password</label></td>
        <td><input id="password" type="password" name="password" size="50" value="<?= $user->password ?>"/></td>
    </tr>
    <tr>
        <td><label for="email">Email</label></td>
        <td><input id="email" type="email" name="email" size="50" value="<?= $user->email ?>"/></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Update user"/></td>
    </tr>
</table>
</form>