<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Employee</title>
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
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h3 {
            color: #e74c3c;
            margin-bottom: 2rem;
            font-size: 2.5rem;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .status-message {
            width: 100%;
            max-width: 500px;
            margin-bottom: 2rem;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            animation: slideIn 0.5s ease-out;
        }

        .success-message {
            background-color: rgba(46, 204, 113, 0.1);
            color: #27ae60;
            border-left: 4px solid #27ae60;
        }

        .error-message {
            background-color: rgba(231, 76, 60, 0.1);
            color: #c0392b;
            border-left: 4px solid #c0392b;
        }

        form {
            background: white;
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
            border: 2px solid rgba(231, 76, 60, 0.2);
        }

        .warning-text {
            color: #7f8c8d;
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            padding: 1rem;
            background-color: #fff5f5;
            border-radius: 5px;
            border-left: 4px solid #e74c3c;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2c3e50;
            font-weight: 500;
        }

        input[type="number"] {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: #e74c3c;
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        button {
            flex: 2;
            background-color: #e74c3c;
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        button:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(1px);
        }

        .back-link {
            flex: 1;
            text-decoration: none;
            color: #34495e;
            font-size: 1rem;
            padding: 0.8rem 1.5rem;
            border: 2px solid #34495e;
            border-radius: 5px;
            transition: all 0.3s ease;
            text-align: center;
        }

        .back-link:hover {
            background-color: #34495e;
            color: white;
            transform: translateY(-2px);
        }

        .delete-icon {
            width: 16px;
            height: 16px;
            position: relative;
            display: inline-block;
        }

        .delete-icon::before,
        .delete-icon::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 2px;
            background-color: currentColor;
            top: 50%;
            left: 50%;
        }

        .delete-icon::before {
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .delete-icon::after {
            transform: translate(-50%, -50%) rotate(-45deg);
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            form {
                padding: 1.5rem;
            }

            h3 {
                font-size: 2rem;
            }

            .button-group {
                flex-direction: column;
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated {
            animation: slideIn 0.5s ease-out;
        }
    </style>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "employee_db";

        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            echo "<div class='status-message error-message'>
                    <span class='delete-icon'></span>
                    Connection failed: " . $conn->connect_error . "
                </div>";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $sql = "DELETE FROM employees WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='status-message success-message'>
                        <span class='delete-icon'></span>
                        Employee record deleted successfully!
                    </div>";
            } else {
                echo "<div class='status-message error-message'>
                        <span class='delete-icon'></span>
                        Error deleting record: " . $conn->error . "
                    </div>";
            }
        }
        $conn->close();
    ?>

    <h3 class="animated">Delete Employee</h3>
    
    <form method="post" action="" class="animated">
        <div class="warning-text">
            Warning: This action cannot be undone. Please make sure you have the correct Employee ID before proceeding.
        </div>
        
        <div class="form-group">
            <label for="id">Employee ID</label>
            <input type="number" id="id" name="id" required>
        </div>
        
        <div class="button-group">
            <button type="submit">
                <span class="delete-icon"></span>
                Delete Employee
            </button>
            <a href="index.php" class="back-link">Go Back</a>
        </div>
    </form>
</body>
</html>