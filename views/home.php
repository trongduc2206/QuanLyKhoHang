<!-- <div class="search">
      <h2>Search</h2>
      <form method="POST">
      <input type="text" name="stock">
      <input type="submit" value="submit">
      </form>
</div> -->
<div class="table">
        <h2>Stock Data</h2>
        <table border="1">
        <tbody><tr><td>Name</td><td>Type</td><td>Status</td><td>Description</td></tbody>
        <?php
          foreach($good as $key=>$good){
            echo '<tr><td>'.$good['name'].'</td><td>'.$good['type'].'</td><td>'.$good['status'].'</td>
            <td>'.$good['description'].'</td></tr>
            ';
          }
        ?>
        </table>
</div> 