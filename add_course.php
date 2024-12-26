<div class="content">
	<div class="add-course">
		<h1>Add New Course</h1>
		<?php include 'db_connect.php';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$name = $_POST['name'];
			$type = $_POST['type'];
			$field = $_POST['field'];
			$related_skills = $_POST['related_skills'];
			$date = $_POST['date'];
			$lecturer = $_POST['lecturer'];
			$rate = $_POST['rate'];
			$descriptions = $_POST['descriptions'];
			$price = $_POST['price'];

			$stmt = $conn->prepare("INSERT INTO course (name, type, field, related_skills, date, lecturer, rate, descriptions, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("ssssssdss", $name, $type, $field, $related_skills, $date, $lecturer, $rate, $descriptions, $price);

			if ($stmt->execute()) {
				header("Location: admin.php?page=course_list");
				exit();
			} else {
				echo "<p class='error-message'>Error: " . $stmt->error . "</p>";
			}

			$stmt->close();
			$conn->close();
		}
		?>

		<form action="admin.php?page=add_course" method="post">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required><br>

			<label for="type">Type:</label>
			<select id="type" name="type" required>
				<option value="Online">Online</option>
				<option value="In-Person">In-Person</option>
			</select><br>

			<label for="field">Field:</label>
			<select id="field" name="field" required>
				<option value="Business">Business</option>
				<option value="Engineering">Engineering</option>
				<option value="Account">Account</option>
				<option value="Computer Science">Computer Science</option>
				<option value="Data Science">Data Science</option>
				<option value="Others">Others</option>
			</select><br>

			<label for="related_skills">Related Skills:</label>
			<textarea id="related_skills" name="related_skills" required></textarea><br>

			<label for="date">Date:</label>
			<input type="date" id="date" name="date" required><br>

			<label for="lecturer">Lecturer:</label>
			<input type="text" id="lecturer" name="lecturer" required><br>

			<label for="rate">Rate:</label>
			<input type="number" id="rate" name="rate" step="0.1" min="0" value="0"><br>

			<label for="descriptions">Description:</label>
			<textarea id="descriptions" name="descriptions" required></textarea><br>

			<label for="price">Price:</label>
			<input type="number" id="price" name="price" step="0.01" min="0" required><br>

			<input type="submit" value="Add Course">
		</form>
	</div>
</div>