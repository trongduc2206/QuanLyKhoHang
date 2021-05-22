<div class="table">
        <h2>Stock Data</h2>
        <table border="1">
        <tbody><tr><td>Name</td><td>Type</td><td>Quantity</td><td>Description</td><td>Import Date</td><td>Partner Name</td></tbody>
        <?php
          foreach($good as $key=>$good){
            echo '<tr><td>'.$good['name'].'</td><td>'.$good['type'].'</td><td>'.$good['quantity'].'</td>
            <td>'.$good['description'].'</td><td>'.$good['import_date'].'</td><td>'.$good['partnername'].'</td></tr>
            ';
          }
        ?>
        </table>
</div> 