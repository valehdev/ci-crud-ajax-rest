<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h2>User Create</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('user/create'); ?>
<table>
    <tr>
        <td><label for="title">Username</label></td>
        <td><input type="input" name="username" size="50" /></td>
    </tr>
    <tr>
        <td><label for="text">Password</label></td>
        <td><input type="password" name="password" size="50" /></td>
    </tr>
    <tr>
        <td><label for="text">Email</label></td>
        <td><input type="email" name="email" size="50" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Create new user" /></td>
    </tr>
</table>
</form>