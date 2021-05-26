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
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }

    .pagination a.active {
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
        border-radius: 5px;
    }
</style>

<script type="text/javascript">
    function ConfirmDelete() {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
            return false;
    }
</script>

<div class="table">
    <h2>Search Good</h2>
    <hr class="solid">
    <?php require_once '../core/form/Form.php';
    $form =  Form::begin('', "post")
    ?>
    <?php
    echo $form->field($model, 'name')
    ?>

    <button type="submit">Search</button>
    <?php require_once '../core/form/Form.php';
    Form::end() ?>
</div>

<div class="table">
<?php if(!empty($good)) : ?>
    <h2>Result</h2>
    <!-- <?php if ($good) ?> -->
    <hr class="solid">
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
                    <th>Delete</th>
            </tbody>
            <?php
            if(!empty($good)){
            foreach ($good as $key => $good) {
                echo '<tr><td>' . $good['id'] . '</td><td>' . $good['name'] . '</td><td>' . $good['type'] . '</td><td>' . $good['quantity'] . '</td>
                <td>' . $good['description'] . '</td><td>' . $good['import_date'] . '</td><td>' . $good['export_date'] . '</td><td>' . $good['partnername'] . '</td><td>' .
                "<a href='manage?id=" . $good['id'] . "' onclick = 'ConfirmDelete()'>Delete</a>" . '</td></tr>';
            } 
        }
            ?>
        </table>
        <button type="button" class="cancelbtn" onclick="window.location.href='/manage'">Refresh</button>

        <?php else : ?>
            <h1>Type the name of good you want to search </h1>
        <?php endif;?>
    </div>