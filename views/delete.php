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

<script type="text/javascript">
    function ConfirmDelete()
    {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
            return false;
    }
</script>

<div class="table">
    <h2>Delete Good</h2>
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
            foreach ($good as $key => $good) {
                echo '<tr><td>' . $good['id'] . '</td><td>' . $good['name'] . '</td><td>' . $good['type'] . '</td><td>' . $good['quantity'] . '</td>
            <td>' . $good['description'] . '</td><td>' . $good['import_date'] . '</td><td>' . $good['export_date'] . '</td><td>' . $good['partnername'] . '</td><td>' . 
            "<a href='delete?id=".$good['id']."' onclick = 'ConfirmDelete()'>Delete</a>" . '</td></tr>';
            }
            ?>
        </table>
    </div>

    
