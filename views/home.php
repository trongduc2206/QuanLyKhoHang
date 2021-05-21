<div class="search">
      <h2>Search</h2>
      <form method="POST">
      <input type="text" name="stock">
      <input type="submit" value="submit">
      </form>
</div>
<div class="table">
        <h2>Stock Data</h2>
        <table border="1">
        <tbody><tr><td>Code</td><td>Name</td></tr></tbody>
        <?php
          foreach($param as $code=>$name){
            echo '<tr><td>'.$code.'</td><td>'.$name.'</td>';
          }
        ?>
        </table>
</div> 