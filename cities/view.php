<?php include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dashboard-part1.php';?>
    <div class="container mt-3">
        <h1 class="mb-4 text-center">City Information</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/proj_students/cities/create.php" class="btn btn-dark">New City</a>
        </div>
            <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>State</th>
                    <th>Postal Code</th>
                    <th colspan=2>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dbconnection.php';

                    $sql = "SELECT * FROM cities";
                    $stmt = $conn->query($sql);
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $n = $stmt->rowCount();
                    
                    if ($n > 0) {
                        foreach ($rows as $value) {
                            echo "<tr>";
                            echo "    <td>{$value['name']}</td>";
                            echo "    <td>{$value['state']}</td>";
                            echo "    <td>{$value['postal']}</td>";
                            echo "    <td>
											<a href=\"delete.php?id={$value['city_id']}\" class=\"btn btn-danger btn-sm\">Delete</a>
											<a href=\"edit.php?id={$value['city_id']}\" class=\"btn btn-info btn-sm\">Edit</a>
									  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "    <td colspan='6' class='text-center'>No records have been found</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS (Optional for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dashboard-part2.php';?>