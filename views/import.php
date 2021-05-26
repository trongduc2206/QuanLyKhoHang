<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<style>
  .modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
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

  .pagination {
    display: inline-block;
    width: 100%;
  }

  .pagination a {
    color: #187ce0;
    float: right;
    padding: 8px 16px;
    text-decoration: none;
    border-style: groove ;
    border-width: 1px;
    background-color: #f4f4b7 ;
    margin-top : 5px ;
  }

  .pagination a.active {
    background-color: #4CAF50;
    color: white;
    border-radius: 10px;
  }

  .pagination a:hover:not(.active) {
    background-color: #ddd;
    border-radius: 5px;
  }
  .table{
    margin-top : 50px ;
  }
  .table h1{
    font-family : serif ;
    color : #ff0000 ;
  }

  .table h2{
    color : #0909f2 ;
  }
</style>
</head>
<div class="table">
  <h2>Import Good</h2>
  <hr class="solid">
  <!-- <?php if ($good) ?> -->
  <div class='table-content'>
  <?php if($importGoodNum[0]['COUNT'] != 0) : ?>
    <table border="1" id="good">
      <tbody>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Type</th>
          <th>Quantity</th>
          <th>Description</th>
          <th>Import Date</th>
          <th>Partner Name</th>
      </tbody>
      <?php
      if($importGoodNum[0]['COUNT'] != 0){
      $page = $query["page"];
      $goodList = $good[$page];
      foreach ($goodList as $key => $good) {
        echo '<tr><td>' . $good['id'] . '</td><td>' . $good['name'] . '</td><td>' . $good['type'] . '</td><td>' . $good['quantity'] . '</td>
            <td>' . $good['description'] . '</td><td>' . $good['import_date'] . '</td><td>' . $good['partnername'] . '</td></tr>
            ';
      }
    } 
      ?>
    </table>
    <?php else : ?>
    <h1>You have 0 imported good</h1>
    <h2>If you have a partner, add a new good here</h2>
    <a href="/partner">Else add a new partner first</a>
    <?php endif; ?>
    <div class="pagination">
      <?php
      // var_dump($importGoodNum);
      if($importGoodNum[0]['COUNT'] != 0){
      $numOfPage = ceil($importGoodNum[0]['COUNT'] / 10);
      for ($i = 1; $i <= $numOfPage; $i++) {
        echo "<a href='" . $path . "?page=$i'>" . $i . "</a>";
      }
      }
      ?>
    </div>
  </div>

  <button class="button" id="myBtn">ADD</button>

  <div id="myModal" class="modal" <?php if ($invalid) echo "style='display: block;'" ?>>

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Add New Good</h2>
      <?php require_once '../core/form/Form.php';
      $form =  Form::begin('', "post")
      ?>

      <?php
      echo $form->field($model, 'name')
      ?>
      <?php
      echo $form->field($model, 'type')
      ?>
      <!-- <?php
            echo $form->field($model, 'status')
            ?> -->
      <?php
      echo $form->field($model, 'description')
      ?>
      <!-- <?php
            echo $form->field($model, 'import_date')
            ?> -->
      <?php
      echo $form->field($model, 'quantity')
      ?>
      <label>Partner</label>
      <select name="partner_id">
        <?php
        foreach ($partner as $key => $partner) {
          echo "<option>" . $partner['name'] . "</option>";
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
  </html>