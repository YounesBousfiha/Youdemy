<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gray-50 font-sans">
    <!-- Header -->
    <header class="py-6 bg-white shadow-md">
        <div class="container mx-auto px-6 flex items-center justify-between">
            <a href="/" class="text-2xl font-bold text-gray-800">EduVerse</a>
            <nav>
                <?php if($_SESSION['fk_role_id'] === 1) : ?>
                <a href="/admin/dashboard" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">dashboard</a>
                <?php elseif ($_SESSION['fk_role_id'] === 2) : ?>
                <a href="/teacher/dashboard" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">dashboard</a>
                <?php elseif ($_SESSION['fk_role_id'] === 3) : ?>
                <a href="/student/dashboard" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">dashboard</a>
                <?php endif; ?>
                <a href="/catalogue" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Catalogue</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">About</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Contact</a>
                <?php if(isset($_SESSION['email'])) :  ?>
                    <a href="/logout"
                       class="bg-red-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">Logout
                    </a>
                <?php else : ?>
                <a href="/signup"
                    class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">Sign
                    Up
                </a>
                <?php endif; ?>
            </nav>
        </div>
    </header>