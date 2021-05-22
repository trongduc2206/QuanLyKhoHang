<h1>Login</h1>

<?php require_once '../core/form/Form.php';
$form =  Form::begin('',"post") 
?>

    <?php 
        echo $form -> field($model, 'username')
    ?>
    <?php 
        echo $form -> field($model, 'password')->passwordField()
    ?>
    <button type="submit-register">Submit</button>

<?php require_once '../core/form/Form.php';
 Form::end() ?>


<!-- <form method="POST">
    <label>User Name</label>
    <input type = 'text' name = 'username'>
    <label>Password</label>
    <input type = 'password' name = 'password'>
    <button name='submit-login'>Submit</button>
    
</form> -->