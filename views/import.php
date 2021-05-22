<div class="table">
        <h2>Stock Data</h2>
        <!-- <?php if($good) ?> -->
        <table border="1">
        <tbody><tr><td>ID</td><td>Name</td><td>Type</td><td>Quantity</td><td>Description</td><td>Import Date</td><td>Partner Name</td></tbody>
        <?php
          foreach($good as $key=>$good){
            echo '<tr><td>'.$good['id'].'</td><td>'.$good['name'].'</td><td>'.$good['type'].'</td><td>'.$good['quantity'].'</td>
            <td>'.$good['description'].'</td><td>'.$good['import_date'].'</td><td>'.$good['partnername'].'</td></tr>
            ';
          }
        ?>
        </table>
        
        
</div> 
<div class="table" >
<h2>Add New Good</h2>
<?php require_once '../core/form/Form.php';
$form =  Form::begin('',"post") 
?>

    <?php 
        echo $form -> field($model, 'name')
    ?>
    <?php 
        echo $form -> field($model, 'type')
    ?>
    <!-- <?php 
        echo $form -> field($model, 'status')
    ?> -->
    <?php 
        echo $form -> field($model, 'description')
    ?>
    <!-- <?php 
        echo $form -> field($model, 'import_date')
    ?> -->
    <?php 
        echo $form -> field($model, 'quantity')
    ?>
    <label>Partner</label>
    <select name="partner_id">
          <?php
          foreach($partner as $key=>$partner){
            echo "<option>".$partner['name'] ."</option>";
          }
          ?>
    </select>
    </br>
    <label>Import Date</label>
    <input type='date' name='import_date'>
    </br>
    <button type="submit-register">Submit</button>

<?php require_once '../core/form/Form.php';
 Form::end() ?>
</div>

