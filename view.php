<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
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

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            animation: slideIn 0.5s ease-out;
        }

        .table-container {
            max-width: 1000px;
            margin: 0 auto 2rem auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #f1f4f6;
        }

        .no-records {
            text-align: center;
            color: #7f8c8d;
            padding: 2rem;
            font-style: italic;
        }

        .back-link {
            display: block;
            width: fit-content;
            margin: 0 auto;
            text-decoration: none;
            color: #34495e;
            font-size: 1rem;
            padding: 0.8rem 1.5rem;
            border: 2px solid #34495e;
            border-radius: 5px;
            transition: all 0.3s ease;
            animation: slideIn 0.5s ease-out;
        }

        .back-link:hover {
            background-color: #34495e;
            color: white;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .table-container {
                overflow-x: auto;
            }

            table {
                min-width: 600px;
            }

            th, td {
                padding: 0.8rem;
            }

            h1 {
                font-size: 2rem;
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

        .table-container {
            animation: slideIn 0.5s ease-out;
        }
    </style>
</head>
<body>
    <h1>Employee List</h1>
    
    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Designation</th>
            </tr>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "employee_db";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM employees";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['department'] . "</td>
                                <td>" . $row['designation'] . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='no-records'>No Records Found</td></tr>";
                }
                $conn->close();
            ?>
        </table>
    </div>
    
    <a href="index.php" class="back-link">Go Back</a>
</body>
</html>