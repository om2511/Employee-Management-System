<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
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
        }

        .container {
            display: flex;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 2.5rem;
            font-size: 3rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            animation: fadeIn 0.5s ease-out;
        }

        h3 {
            color: #34495e;
            margin: 1rem 0 1.5rem;
            font-size: 2rem;
            text-align: center;
        }

        form, .opr-cnt {
            background: white;
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            animation: fadeIn 0.5s ease-out;
        }

        /* Add animation for form appearance */
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

        input[type="text"] {
            width: 100%;
            padding: 0.8rem;
            margin: 0.5rem 0 1rem 0;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #3498db;
        }

        button {
            background-color: #3498db;
            width: 100%;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.25rem;
            transition: background-color 0.3s ease;
            margin: 0.5rem 0;
        }

        button:hover {
            background-color: #2980b9;
        }

        .operations {
            max-width: 600px;
            margin: 2.5rem auto;
        }

        .operations a {
            flex: 1;
            text-decoration: none;
        }

        .operations button {
            width: 100%;
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 2.25rem;
        }

        .operations button:nth-child(1) {
            background-color: #2ecc71;
        }

        .operations button:nth-child(1):hover {
            background-color: #27ae60;
        }

        .operations button:nth-child(2) {
            background-color: #f1c40f;
        }

        .operations button:nth-child(2):hover {
            background-color: #f39c12;
        }

        .operations button:nth-child(3) {
            background-color: #e74c3c;
        }

        .operations button:nth-child(3):hover {
            background-color: #c0392b;
        }

        @media screen and (max-width: 1280px) {
            body {
                padding: 1rem 1.5rem 1.5rem;
            }

            .container {
                column-gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem 2rem 2rem;
            }
            
            h1 {
                font-size: 2.5rem;
            }

            h3 {
                font-size: 1.75rem;
            }

            .container {
                display: grid;
                row-gap: 2rem;
            }

            .operations {
                margin: 2.5rem auto 0;
            }
        }
    </style>
</head>
<body>
    <h1>Employee Management System</h1>

    <div class="container">
        <form action="insert.php" method="post">
            <h3>Insert New Employee</h3>
            Name: <input type="text" name="name" required>
            Department: <input type="text" name="department" required>
            Designation: <input type="text" name="designation" required>
            <button type="submit">Insert</button>
        </form>
        
        <div class="opr-cnt">
            <h3>Perform Operations</h3>
            <div class="operations">
                <a href="view.php"><button>View Employees</button></a>
                <a href="update.php"><button>Update Employee</button></a>
                <a href="delete.php"><button>Delete Employee</button></a>
            </div>
        </div>
    </div>
</body>
</html>