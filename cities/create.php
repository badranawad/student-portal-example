<?php include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dashboard-part1.php';?>

    <div class="container mt-3">
        <h1 class="mb-4 text-center">Cities Information</h1>
		<div class="d-flex justify-content-end mb-3">
            <a href="view.php" class="btn btn-primary">All Cities</a>
        </div>
        <form action="" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter city name">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">State</label>
                <input type="text" name="state" id="state" class="form-control" placeholder="Enter your state">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Postal Code</label>
                <input type="text" name="postal" id="postal" class="form-control" placeholder="Enter city postal code">
            </div>
            
            <button type="submit" name="insert" class="btn btn-primary">Store</button>
        </form>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dashboard-part2.php';?>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dbconnection.php';
    
    if (isset($_POST['insert'])) {
        $name = $_POST['name'];
        $state = $_POST['state'];
        $postal = $_POST['postal'];

        if (empty($name) || empty($state) || empty($postal)) {
            echo "<div class='alert alert-danger text-center mt-3'>All fields are required.</div>";
        } 
		else {
            try {
                // Define SQL Statement
                $sql = "INSERT INTO cities (name, state, postal)
                        VALUES (:name, :state, :postal)";
                
                // Prepare SQL Statement for execution
                $stmt = $conn->prepare($sql);
                
                // Execute SQL Statement
                $stmt->execute([
                    ':name' => $name,
                    ':state' => $state,
                    ':postal' => $postal,
                ]);

                echo "<div class='alert alert-success text-center mt-3'>Record inserted successfully.</div>";
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger text-center mt-3'>Error: " . $e->getMessage() . "</div>";
            }
        }
    }
?>
