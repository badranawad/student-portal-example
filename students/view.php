<?php include '../dashboard-part1.php';?>
    <div class="container mt-3">
        <h1 class="mb-4 text-center">Student Information</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="create.php" class="btn btn-dark">New Student</a>
        </div>
            <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Student Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th colspan=2>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../dbconnection.php';

                    $sql = "SELECT * FROM students";
                    $stmt = $conn->query($sql);
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $n = $stmt->rowCount();
                    
                    if ($n > 0) {
                        foreach ($rows as $value) {
                            echo "<tr>";
                            echo "    <td>{$value['name']}</td>";
                            echo "    <td>{$value['address']}</td>";
                            echo "    <td>{$value['mobile']}</td>";
                            echo "    <td>{$value['email']}</td>";
                            echo "    <td>{$value['image']}</td>";
                            echo "    <td>
											<a href=\"delete.php?id={$value['student_id']}\" class=\"btn btn-danger btn-sm\">Delete</a>
											<a href=\"edit.php?id={$value['student_id']}\" class=\"btn btn-info btn-sm\">Edit</a>
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
<?php include '../dashboard-part2.php';?>