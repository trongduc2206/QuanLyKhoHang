<style>
    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>
<div class="table">
        <h2>Partner</h2>
        <hr class="solid">
        <!-- <?php if($partner) ?> -->
        <div class='table-content'>
        <table border="1" id="good">
        <tbody><tr><th>ID</th><th>Name</th><th>Status</th><th>Relation</th></tbody>
        <?php
          foreach($partner as $key=>$partner){
            echo '<tr><td>'.$partner['id'].'</td><td>'.$partner['name'].'</td><td>'.$partner['status'].'</td><td>'.$partner['relation'].'</td></tr>';
          }
        ?>
        </table>
        </div>
        
        <button class="button" id="myBtn">ADD PARTNER</button>

        <div id="myModal" class="modal" <?php if($invalid) echo "style='display: block;'" ?> >

  <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New Partner</h2>
<?php require_once '../core/form/Form.php';
$form =  Form::begin('',"post") 
?>

    <?php 
        echo $form -> field($model, 'name')
    ?>

    <label>Relation</label>
    <select name="relation">
        <option>Nhập</option>
        <option>Xuất</option>
    </select>
    </br>
    <button type="submit-register">Submit</button>

<?php require_once '../core/form/Form.php';
 Form::end() ?>
        </div>

        </div>

        <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<div>




