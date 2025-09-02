<?php
include 'config.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$student_id = $_GET['id'];
$sql = "SELECT * FROM students WHERE student_id = $student_id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: index.php");
    exit();
}

$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student - <?php echo htmlspecialchars($student['Name']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .student-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .student-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #007bff;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-graduation-cap"></i> Student Management System
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-home"></i> Home
                </a>
                <a class="nav-link" href="add_student.php">
                    <i class="fas fa-user-plus"></i> Add Student
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="student-card">
                    <div class="text-center mb-4">
                        <?php if($student['Photo']): ?>
                            <img src="uploads/<?php echo $student['Photo']; ?>" alt="Student Photo" class="student-photo">
                        <?php else: ?>
                            <i class="fas fa-user-circle fa-9x text-muted"></i>
                        <?php endif; ?>
                        <h2 class="mt-3"><?php echo htmlspecialchars($student['Name']); ?></h2>
                        <p class="text-muted">Student ID: <?php echo $student['student_id']; ?></p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="40%">Gender:</th>
                                    <td><?php echo $student['Gender']; ?></td>
                                </tr>
                                <tr>
                                    <th>Age:</th>
                                    <td><?php echo $student['Age']; ?> years old</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth:</th>
                                    <td><?php echo date('F j, Y', strtotime($student['Date_of_birth'])); ?></td>
                                </tr>
                                <tr>
                                    <th>Place of Birth:</th>
                                    <td><?php echo htmlspecialchars($student['Place_of_Birth']); ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?php echo htmlspecialchars($student['Email']); ?></td>
                                </tr>
                                <tr>
                                    <th>Contact Number:</th>
                                    <td><?php echo $student['Contact_no']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="40%">Address:</th>
                                    <td><?php echo htmlspecialchars($student['Address']); ?></td>
                                </tr>
                                <tr>
                                    <th>Religion:</th>
                                    <td><?php echo htmlspecialchars($student['Religion']); ?></td>
                                </tr>
                                <tr>
                                    <th>Citizenship:</th>
                                    <td><?php echo htmlspecialchars($student['Citizenship']); ?></td>
                                </tr>
                                <tr>
                                    <th>Civil Status:</th>
                                    <td><?php echo htmlspecialchars($student['Civil_status']); ?></td>
                                </tr>
                                <tr>
                                    <th>Date Added:</th>
                                    <td><?php echo date('F j, Y', strtotime($student['Date'])); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="edit_student.php?id=<?php echo $student['student_id']; ?>" class="btn btn-warning btn-lg">
                            <i class="fas fa-edit"></i> Edit Student
                        </a>
                        <a href="home.php" class="btn btn-secondary btn-lg ms-2">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
