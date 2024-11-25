<?php
include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dbconnection.php';

$c_id = $_GET['id'];

$sql = "SELECT * FROM cities WHERE city_id = :c_id";
$stmt = $conn->prepare($sql);
$stmt->execute([':c_id' => $c_id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $c_id = $row['city_id'];
    $c_name = $row['name'];
    $c_state = $row['state'];
    $c_postal = $row['postal'];
} else {
    echo "<div class='alert alert-danger text-center mt-3'>Record not found!</div>";
    exit();
}
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dashboard-part1.php';?>

    <div class="container mt-3">
        <h1 class="mb-4 text-center">Edit City Information</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="create.php" class="btn btn-dark mx-3">New City</a>
            <a href="view.php" class="btn btn-primary">All Cities</a>

        </div>
        <form action="update.php" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow">
            <input type="hidden" name="c_id" value="<?= htmlspecialchars($c_id) ?>">
            
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $c_name ?>" required>
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" name="state" id="state" class="form-control" value="<?= $c_state ?>" required>
            </div>
            <div class="mb-3">
                <label for="postal" class="form-label">Postal Code</label>
                <input type="text" name="postal" id="postal" class="form-control" value="<?= $c_postal ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-success">Update</button>
            <button type="cancel" name="cancel" class="btn btn-default">Cancel</button>
        </form>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dashboard-part2.php';?>
