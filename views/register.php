<h1>Register</h1>
<?php require_once '../core/form/Form.php';
$form =  Form::begin('',"post") 
?>

    <?php 
        echo $form -> field($model, 'username')
    ?>
    <?php 
        echo $form -> field($model, 'password')->passwordField()
    ?>
    <?php 
        echo $form -> field($model, 'confirmPassword')->passwordField()
    ?>
    <?php 
        echo $form -> field($model, 'name')
    ?>
    <button type="submit-register">Submit</button>

<?php require_once '../core/form/Form.php';
 Form::end() ?>
<!-- <form action='' method='POST'>
<table>
    <tr>
    <td><label>User Name</label></td>
    <td><input type = 'text' name = 'username' <?php echo $model->hasError('username') ? 'is-invalid' :'' ?>></td>
    </tr>
    <div>
        <?php echo $model->getFirstError('username') ?>
    </div>
    <tr>
    <td><label>Password</label></td>
    <td><input type = 'password' name = 'password'></td>
    </tr>
    <tr>
    <td><label>Confirm Password</label></td>
    <td><input type = 'password' name = 'confirmPassword' ></td>
    </tr>
    <tr>
    <td><label>Name</label></td>
    <td><input type = 'text' name = 'name'></td>
    </tr>
    <tr>
    <td><button type="submit-register">Submit</button></td>
    </tr>
</table>
</form> -->