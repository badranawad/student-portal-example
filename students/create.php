<?php include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dashboard-part1.php';?>

    <div class="container mt-3">
        <h1 class="mb-4 text-center">Student Portal</h1>
		<div class="d-flex justify-content-end mb-3">
            <a href="view.php" class="btn btn-primary">All Students</a>
        </div>
        <form action="" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter your mobile number">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
            </div>
			<div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>
            <button type="submit" name="insert" class="btn btn-primary">Store</button>
        </form>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/proj_students/dashboard-part2.php';?>

<?php
    include '../dbconnection.php';
    
    if (isset($_POST['insert'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $image = $_FILES['image'];

        if (empty($name) || empty($address) || empty($mobile) || empty($email)) {
            echo "<div class='alert alert-danger text-center mt-3'>All fields are required.</div>";
        } 
		else {
			// Handle image upload if provided
			$imagePath = null;
			if ($image && $image['tmp_name']) {
				$imagePath = 'uploads/' . uniqid() . '-' . basename($image['name']);
				move_uploaded_file($image['tmp_name'], $imagePath);
			}
            try {
                // Define SQL Statement
                $sql = "INSERT INTO students (name, address, mobile, email, image)
                        VALUES (:name, :address, :mobile, :email, :image)";
                
                // Prepare SQL Statement for execution
                $stmt = $conn->prepare($sql);
                
                // Execute SQL Statement
                $stmt->execute([
                    ':name' => $name,
                    ':address' => $address,
                    ':mobile' => $mobile,
                    ':email' => $email,
					':image' => $imagePath ? basename($imagePath) : null
                ]);

                echo "<div class='alert alert-success text-center mt-3'>Record inserted successfully.</div>";
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger text-center mt-3'>Error: " . $e->getMessage() . "</div>";
            }
        }
    }
?>
