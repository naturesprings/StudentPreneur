<div class="content">
	<h1 class="course-title">Course List</h1>

	<?php
	include 'db_connect.php';

	if (isset($_GET['delete_id'])) {
		$delete_id = intval($_GET['delete_id']);
		$delete_sql = "DELETE FROM course WHERE id=$delete_id";
		if ($conn->query($delete_sql) === TRUE) {
			echo "<p class='success-message'>Course deleted successfully.</p>";
		} else {
			echo "<p class='error-message'>Error: " . $conn->error . "</p>";
		}
	}

	if (isset($_POST['update'])) {
		$id = intval($_POST['id']);
		$name = $conn->real_escape_string($_POST['name']);
		$type = $conn->real_escape_string($_POST['type']);
		$field = $conn->real_escape_string($_POST['field']);
		$related_skills = $conn->real_escape_string($_POST['related_skills']);
		$date = $_POST['date'];
		$lecturer = $conn->real_escape_string($_POST['lecturer']);
		$rate = floatval($_POST['rate']);
		$descriptions = $conn->real_escape_string($_POST['descriptions']);
		$price = floatval($_POST['price']);

		$update_sql = "UPDATE course SET
            name='$name',
            type='$type',
            field='$field',
            related_skills='$related_skills',
            date='$date',
            lecturer='$lecturer',
            rate=$rate,
            descriptions='$descriptions',
            price=$price
            WHERE id=$id";

		if ($conn->query($update_sql) === TRUE) {
			echo "<p class='success-message'>Course updated successfully.</p>";
		} else {
			echo "<p class='error-message'>Error: " . $conn->error . "</p>";
		}
	}

	$sql = "SELECT * FROM course";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<table class='course-table'>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Field</th>
                    <th>Skills</th>
                    <th>Date</th>
                    <th>Lecturer</th>
                    <th>Rate</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>";

		while ($row = $result->fetch_assoc()) {
			echo "<tr>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["type"]) . "</td>
                <td>" . htmlspecialchars($row["field"]) . "</td>
                <td>" . htmlspecialchars($row["related_skills"]) . "</td>
                <td>" . htmlspecialchars($row["date"]) . "</td>
                <td>" . htmlspecialchars($row["lecturer"]) . "</td>
                <td>" . htmlspecialchars($row["rate"]) . "</td>
                <td>" . htmlspecialchars($row["descriptions"]) . "</td>
                <td>" . htmlspecialchars($row["price"]) . "</td>
                <td>
                    <a href='admin.php?page=course_list&edit_id=" . urlencode($row["id"]) . "' class='edit-link'>Edit<br></a> 
                    <br>
					<a href='admin.php?page=course_list&delete_id=" . urlencode($row["id"]) . "' class='delete-link' onclick='return confirm(\"Are you sure you want to delete this course?\")'>Delete</a>
                </td>
            </tr>";
		}
		echo "</tbody></table>";
	}

	
	if (isset($_GET['edit_id'])) {
		$edit_id = intval($_GET['edit_id']);
		$edit_sql = "SELECT * FROM course WHERE id=$edit_id";
		$edit_result = $conn->query($edit_sql);

		if ($edit_result->num_rows > 0) {
			$row = $edit_result->fetch_assoc();
	?>
			<h2 class="edit-title">Edit Course</h2>
			<form class="course-form" action="admin.php?page=course_list" method="post">
				<input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required><br>

				<label for="type">Type:</label>
				<select id="type" name="type" required>
					<option value="Online" <?php if ($row['type'] == 'Online') echo 'selected'; ?>>Online</option>
					<option value="In-Person" <?php if ($row['type'] == 'In-Person') echo 'selected'; ?>>In-Person</option>
				</select><br>

				<label for="field">Field:</label>
				<select id="field" name="field" required>
					<option value="Business" <?php if ($row['field'] == 'Business') echo 'selected'; ?>>Business</option>
					<option value="Engineering" <?php if ($row['field'] == 'Engineering') echo 'selected'; ?>>Engineering</option>
					<option value="Account" <?php if ($row['field'] == 'Account') echo 'selected'; ?>>Account</option>
					<option value="Computer Science" <?php if ($row['field'] == 'Computer Science') echo 'selected'; ?>>Computer Science</option>
					<option value="Data Science" <?php if ($row['field'] == 'Data Science') echo 'selected'; ?>>Data Science</option>
					<option value="Others" <?php if ($row['field'] == 'Others') echo 'selected'; ?>>Others</option>
				</select><br>

				<label for="related_skills">Related Skills:</label>
				<textarea id="related_skills" name="related_skills" required><?php echo htmlspecialchars($row['related_skills']); ?></textarea><br>

				<label for="date">Date:</label>
				<input type="date" id="date" name="date" value="<?php echo htmlspecialchars($row['date']); ?>" required><br>

				<label for="lecturer">Lecturer:</label>
				<input type="text" id="lecturer" name="lecturer" value="<?php echo htmlspecialchars($row['lecturer']); ?>" required><br>

				<label for="rate">Rate:</label>
				<input type="number" id="rate" name="rate" step="0.1" min="0" value="<?php echo htmlspecialchars($row['rate']); ?>"><br>

				<label for="descriptions">Description:</label>
				<textarea id="descriptions" name="descriptions" required><?php echo htmlspecialchars($row['descriptions']); ?></textarea><br>

				<label for="price">Price:</label>
				<input type="number" id="price" name="price" step="0.01" min="0" value="<?php echo htmlspecialchars($row['price']); ?>" required><br>

				<input type="submit" name="update" value="Update Course" class="update-button">
			</form>
	<?php
		}
	}

	$conn->close();
	?>
</div>