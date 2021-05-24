<div class="row">
<div class="column left">
<h2>Register</h2>
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
     <hr>
    
    <button type="submit-register">Submit</button>
    <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" onclick="window.location.href='/'">Cancel</button>
    
  </div>

<?php require_once '../core/form/Form.php';
 Form::end() ?>
</div>
<div class="column right">
<img src="login.jpg" class="image">
</div>
</div>
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