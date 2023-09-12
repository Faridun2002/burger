<div class="row">
    <div class="col-md-12">
        <div class="section-row">
            <h3>Категории</h3>
            <table border="1" width="100%">
                <tr>
                    <th width="20%">ID</th>
                    <th width="20%">Name</th>
                    <th width="20%">Status</th>
                </tr>
                <?php
                include_once('../conn.php');
                $sql = "SELECT * FROM category where status=1";
                $result = $conn->query($sql);
                while ($row = $result->fetch()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['status'] . '</td>';
                    echo '</tr>';
                } ?>
        </div>
    </div>
</div>