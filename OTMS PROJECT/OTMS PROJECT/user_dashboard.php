<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['email']) || !isset($_SESSION['username'])) {
    header('Location: user_login.php');
    exit();
}

$email = $_SESSION['email'];
$username = $_SESSION['username'];

if (isset($_POST['submit_leave'])) {
    // Prepare the statement to avoid SQL injection
    $stmt = $connection->prepare("INSERT INTO leaves (id, user_id, subject, message, status) VALUES (NULL, ?, ?, ?, 'No Action')");
    $stmt->bind_param("iss", $_SESSION['id'], $_POST['subject'], $_POST['message']);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script type='text/javascript'>
            alert('Form submitted successfully...');
            window.location.href = 'user_dashboard.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Error Please Try Again!!');
            window.location.href = 'user_dashboard.php';
            </script>";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User dashboard</title>
    <script src="includes/jquery_latest.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">


    <script type="text/javascript">
        $(document).ready(function() {
            $("#manage_task").click(function() {
                $("#right_sidebar").load("task.php");

            });
        });

        $(document).ready(function() {
            $("#apply_leave").click(function() {
                $("#right_sidebar").load("leaveForm.php");

            });
        });

        $(document).ready(function() {
            $("#leave_status").click(function() {
                $("#right_sidebar").load("leave_status.php");

            });
        });
    </script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('/OTMS PROJECT/OTMS PROJECT/background/image5.gif') no-repeat center center fixed;
            background-size: cover;
            background-color: #355764;
        }

        #header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: rgba(233, 150, 122, 0.5);
            
        }

        #header h1 {
            margin: 0;
        }

        .header-right {
            text-align: right;
        }

        .header-right b {
            margin-right: 10px;
        }

        .header-right span {
            margin-left: 20px;
        }

        .header-right img {
            vertical-align: middle;

            margin-right: 7px;

        }

        .btn-link {
            text-decoration: none;
            color: white;
            display: block;
            padding: 10px;
            text-align: center;
        }

        .btn-link:hover {
            background-color: #DAF6CC;
            color: black;
        }


        #left_sidebar {
            margin-top: 50px;
            width: 20%;
            display: inline-block;
        }

        #left_sidebar table tr {
            background-color: rgba(0, 150, 255, 0.8);
            color: white;
            font-size: 18px;
        }

        #left_sidebar table tr:hover {
            background-color: #DAF6CC;
            text-decoration: none;
            font-size: 20px;
            color: black;
        }

        #logout_link {
            text-decoration: none;
            color: white;
        }

        #link {
            text-decoration: none;
            color: white;
        }

        #link:hover {
            color: black;
        }

        #logout_link:hover {
            background-color: #DAF6CC;
            color: black;
        }


        #right_sidebar {
            padding: 12px;
            height: auto;
            width: 75%;
            display: inline-block;
            color: white;
            vertical-align: top;
        }


        #right_sidebar ul li {
            color: lightskyblue;
        }

        h2 {
            color: lightskyblue;
        }

        .logo-image {
            width: 70px;
            /* Adjust width as needed */
            height: auto;
            /* Maintain aspect ratio */
            margin-right: 10px;
            /* Optional: Adjust spacing */
            vertical-align: middle;
            /* Align vertically with text */
        }
    </style>
</head>

<body>
    <div id="header">
        <h1>
            <img src="/OTMS PROJECT/OTMS PROJECT/logo/logo33.png" alt="Logo" class="logo-image">
            Online Task Management
        </h1>
        <div class="header-right">
            <b><img src="envelope.svg" alt="Envelope Icon" height="32" width="32"> Email: </b><?php echo htmlspecialchars($email); ?>
            <span>
                <b><img src="person.svg" alt="Person Icon" height="32" width="32"> Username: </b><?php echo htmlspecialchars($username); ?>
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2" id="left_sidebar">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        <a href="user_dashboard.php" type="button" class="btn-link">Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a type="button" class="btn-link" id="manage_task">Update Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a type="button" class="btn-link" id="apply_leave">Apply leave</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a type="button" class="btn-link" id="leave_status">Leave status</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="logout.php" type="button" class="btn-link">Logout</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-10" id="right_sidebar">
            <h2>Instructions For Students</h2>
            <ul style="line-height: 3em;font-size: 1.2em;list-style-type: none;">
                <li>1. All the students should mark their attendance daily.</li>
                <li>2. Everyone must complete the assigned task.</li>
                <li>3. Make sure you are ontime when completing the task.</li>
                <li>4. Make sure to update on the progress og your work.</li>
            </ul>
        </div>
    </div>
</body>

</html>