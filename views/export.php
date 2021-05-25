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
</style>
<div class="table">
  <!-- <?php
        echo '<pre>';
        echo var_dump($good);
        echo '</pre>';
        ?> -->
  <h2>Exported Good</h2>
  <hr class="solid">
  <!-- <?php if ($good) ?> -->
  <div class='table-content'>
    <table border="1" id="good">
      <tbody>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Type</th>
          <th>Quantity</th>
          <th>Description</th>
          <th>Import Date</th>
          <th>Export Date</th>
          <th>Partner Name</th>
      </tbody>
      <?php
      foreach ($good as $key => $good_item) {
        if ($good_item['status'] == 'Đã xuất')
          echo '<tr><td>' . $good_item['id'] . '</td><td>' . $good_item['name'] . '</td><td>' . $good_item['type'] . '</td><td>' . $good_item['quantity'] . '</td>
              <td>' . $good_item['description'] . '</td><td>' . $good_item['import_date'] . '</td><td>' . $good_item['export_date'] . '</td><td>' . $good_item['partnername'] . '</td></tr>';
      }
      ?>
    </table>
  </div>

  <button class="button" id="myBtn">Export</button>

  <div id="myModal" class="modal" <?php if ($invalid) echo "style='display: block;'" ?>>

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Export Good</h2>

      <?php require_once '../core/form/Form.php';
      $form =  Form::begin('', "post")
      ?>
      <label>Good ID</label>
      <select name="id">
        <?php
        unset($good_item);
        foreach ($good as $key => $good_item) {
          if ($good_item['status'] == 'Đã nhập')
          echo "<option>" . $good_item['id'] . "</option>";
          // echo "<option>" . "<b>ID:</b> " . $good_item['id'] . "   |   <b>Name:</b> " . $good_item['name']."   |   <b>Import Date</b>: ". $good_item['import_date']. "</option>";
        }
        ?>
      </select>
      </br>
      <label>Export Date</label>
      <input type='date' name='export_date'>
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