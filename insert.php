<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operation Status</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .message-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 90%;
            text-align: center;
            margin-bottom: 2rem;
        }

        .success-message {
            color: #2ecc71;
            padding: 1rem;
            border-radius: 5px;
            background-color: rgba(46, 204, 113, 0.1);
            border-left: 4px solid #2ecc71;
            margin-bottom: 1rem;
            text-align: left;
        }

        .error-message {
            color: #e74c3c;
            padding: 1rem;
            border-radius: 5px;
            background-color: rgba(231, 76, 60, 0.1);
            border-left: 4px solid #e74c3c;
            margin-bottom: 1rem;
            text-align: left;
        }

        .back-link {
            display: inline-block;
            text-decoration: none;
            color: #34495e;
            font-size: 1rem;
            padding: 0.8rem 1.5rem;
            border: 2px solid #34495e;
            border-radius: 5px;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .back-link:hover {
            background-color: #34495e;
            color: white;
            transform: translateY(-2px);
        }

        .icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .success-icon {
            color: #2ecc71;
        }

        .error-icon {
            color: #e74c3c;
        }

        @media (max-width: 768px) {
            .message-container {
                padding: 1.5rem;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message-container {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "employee_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                echo "<div class='error-message'>
                        <div class='icon error-icon'>❌</div>
                        Connection failed: " . $conn->connect_error . "
                    </div>";
            } else {
                // Insert Data
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = $_POST['name'];
                    $department = $_POST['department'];
                    $designation = $_POST['designation'];

                    $sql = "INSERT INTO employees (name, department, designation) 
                            VALUES ('$name', '$department', '$designation')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='success-message'>
                                <div class='icon success-icon'>✓</div>
                                New employee record created successfully!
                            </div>";
                    } else {
                        echo "<div class='error-message'>
                                <div class='icon error-icon'>❌</div>
                                Error: " . $sql . "<br>" . $conn->error . "
                            </div>";
                    }
                }
            }
            $conn->close();
        ?>
        
        <a href="index.php" class="back-link">Return to Homepage</a>
    </div>
</body>
</html>