<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
$port = 3306;

$data = [];
$error = "";
$sort_order = isset($_GET['sort']) && $_GET['sort'] == 'desc' ? 'DESC' : 'ASC';

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from database
    $sql = "SELECT user_id, name, email FROM users ORDER BY user_id $sort_order";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        $data = [];
    }

    // Handle form submissions
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn->begin_transaction();
        try {
            if (isset($_POST["add"])) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $name, $email, $password);
                $stmt->execute();
            } elseif (isset($_POST["remove"])) {
                $user_id = $_POST["id"];
                $sql = "DELETE FROM users WHERE user_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
            } elseif (isset($_POST["update"])) {
                $user_id = $_POST["id"];
                $name = $_POST["name"];
                $email = $_POST["email"];
                $sql = "UPDATE users SET name = ?, email = ? WHERE user_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $name, $email, $user_id);
                $stmt->execute();
            } elseif (isset($_POST["logout"])) {
                session_destroy();
                header("Location: login.php");
                exit;
            }

            // Commit transaction
            $conn->commit();

            // Refresh the page to show updated data
            header("Location: index.php");
            exit;
        } catch (Exception $e) {
            // Rollback transaction
            $conn->rollback();
            throw $e;
        }
    }
} catch (Exception $e) {
    $error = "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <nav class="bg-blue-500 w-64 min-h-screen p-4">
        <div class="flex flex-col justify-between h-full">
            <div>
                <h1 class="text-white text-2xl mb-6">Admin Panel</h1>
                <ul>
                    <li class="mb-4">
                        <a href="home.php" class="text-white text-lg hover:text-gray-200">Home</a>
                    </li>
                    <li class="mb-4">
                        <a href="about.php" class="text-white text-lg hover:text-gray-200">About</a>
                    </li>
                    <li>
                        <form method="post" action="" class="inline">
                            <button type="submit" name="logout" class="text-white text-lg hover:text-gray-200">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Manage Users</h1>
        <?php if ($error): ?>
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        <div class="mb-4">
            <button id="showAddUserModalBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Add New User</button>
        </div>
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4">
                        <a href="?sort=<?php echo $sort_order == 'ASC' ? 'desc' : 'asc'; ?>" class="text-blue-500 hover:underline">ID</a>
                    </th>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr class="border-b">
                        <td class="py-2 px-4"><?php echo htmlspecialchars($row["user_id"]); ?></td>
                        <td class="py-2 px-4"><?php echo htmlspecialchars($row["name"]); ?></td>
                        <td class="py-2 px-4"><?php echo htmlspecialchars($row["email"]); ?></td>
                        <td class="py-2 px-4">
                            <form method="post" action="" class="inline">
                                <input type="hidden" name="id" value="<?php echo $row["user_id"]; ?>">
                                <button type="submit" name="remove" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition duration-300">Remove</button>
                            </form>
                            <button class="editBtn bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 transition duration-300 ml-2" data-id="<?php echo $row["user_id"]; ?>" data-name="<?php echo $row["name"]; ?>" data-email="<?php echo $row["email"]; ?>">Edit</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div id="addUserModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-xl font-bold mb-4">Add New User</h2>
            <form method="post" action="">
                <div class="mb-4">
                    <label class="block mb-2">Name</label>
                    <input type="text" name="name" class="border p-2 w-full rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Email</label>
                    <input type="email" name="email" class="border p-2 w-full rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Password</label>
                    <input type="password" name="password" class="border p-2 w-full rounded" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelAddUserBtn" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600 transition duration-300">Cancel</button>
                    <button type="submit" name="add" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Add</button>
                </div>
            </form>
        </div>
    </div>

    <div id="editUserModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-xl font-bold mb-4">Edit User</h2>
            <form method="post" action="">
                <input type="hidden" id="editUserId" name="id">
                <div class="mb-4">
                    <label class="block mb-2">Name</label>
                    <input type="text" id="editUserName" name="name" class="border p-2 w-full rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-2">Email</label>
                    <input type="email" id="editUserEmail" name="email" class="border p-2 w-full rounded" required>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelEditUserBtn" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600 transition duration-300">Cancel</button>
                    <button type="submit" name="update" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('showAddUserModalBtn').addEventListener('click', function() {
            document.getElementById('addUserModal').classList.remove('hidden');
        });

        document.getElementById('cancelAddUserBtn').addEventListener('click', function() {
            document.getElementById('addUserModal').classList.add('hidden');
        });

        document.querySelectorAll('.editBtn').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('editUserId').value = this.getAttribute('data-id');
                document.getElementById('editUserName').value = this.getAttribute('data-name');
                document.getElementById('editUserEmail').value = this.getAttribute('data-email');
                document.getElementById('editUserModal').classList.remove('hidden');
            });
        });

        document.getElementById('cancelEditUserBtn').addEventListener('click', function() {
            document.getElementById('editUserModal').classList.add('hidden');
        });
    </script>
</body>
</html>
