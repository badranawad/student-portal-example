<?php
include '../dbconnection.php';

$s_id = $_GET['id'];

$sql = "SELECT * FROM students WHERE student_id = :s_id";
$stmt = $conn->prepare($sql);
$stmt->execute([':s_id' => $s_id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $s_id = $row['student_id'];
    $s_name = $row['name'];
    $s_address = $row['address'];
    $s_mobile = $row['mobile'];
    $s_email = $row['email'];
    $s_image = $row['image'];
} else {
    echo "<div class='alert alert-danger text-center mt-3'>Record not found!</div>";
    exit();
}
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dashboard-part1.php';?>

    <div class="container mt-3">
        <h1 class="mb-4 text-center">Edit Student Information</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="create.php" class="btn btn-dark mx-3">New Student</a>
            <a href="view.php" class="btn btn-primary">All Students</a>

        </div>
        <form action="update.php" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow">
            <input type="hidden" name="s_id" value="<?= htmlspecialchars($s_id) ?>">
            
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($s_name) ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="<?= htmlspecialchars($s_address) ?>" required>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" name="mobile" id="mobile" class="form-control" value="<?= htmlspecialchars($s_mobile) ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($s_email) ?>" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                <?php if (!empty($s_image)): ?>
                    <p class="mt-2">Current Image:</p>
                    <img src="uploads/<?= htmlspecialchars($s_image) ?>" alt="Current Image" class="img-thumbnail" style="width: 150px;">
                <?php endif; ?>
            </div>
            <button type="submit" name="update" class="btn btn-success">Update</button>
            <button type="cancel" name="cancel" class="btn btn-default">Cancel</button>
        </form>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dashboard-part2.php';?>
