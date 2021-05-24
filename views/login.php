<div class='out-wrapper'>
<div class="row">
<div class="column left">    
<h2>Login</h2>

<?php require_once '../core/form/Form.php';
$form =  Form::begin('',"post") 
?>
    <div class="container">
    <?php 
        echo $form -> field($model, 'username')
    ?>
    <?php 
        echo $form -> field($model, 'password')->passwordField()
    ?>
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    </div>
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
</div>

<!-- <form method="POST">
    <label>User Name</label>
    <input type = 'text' name = 'username'>
    <label>Password</label>
    <input type = 'password' name = 'password'>
    <button name='submit-login'>Submit</button>
    
</form> -->