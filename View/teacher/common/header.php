<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplemde@1.11.2/dist/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/npm/simplemde@1.11.2/dist/simplemde.min.js"></script>
</head>

<body class="bg-gray-50 font-sans">

<!-- Header -->
<header class="py-6 bg-white shadow-md">
    <div class="container mx-auto px-6 flex items-center justify-between">
        <a href="/" class="text-2xl font-bold text-gray-800">EduVerse</a>
        <nav>
            <a href="/teacher/courses/creation" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Create Courses</a>
            <a href="/teacher/courses" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Manage Course</a>
            <a href="/teacher/statistics" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Statistics</a>
            <a href="/catalogue" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Catalogues</a>
            <a href="#" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">About</a>
            <a href="#" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Contact</a>
            <a href="/logout"
               class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">Sign
                Out</a>
        </nav>
    </div>
</header>
