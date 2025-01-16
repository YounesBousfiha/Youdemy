<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 font-sans">
<!-- Header -->
<header class="py-6 bg-white shadow-md">
    <div class="container mx-auto px-6 flex items-center justify-between">
        <a href="../index.html" class="text-2xl font-bold text-gray-800">EduVerse</a>
        <nav>
            <a href="my-courses.html" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">My Courses</a>
            <a href="../courses.html" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Courses</a>
            <a href="#" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">About</a>
            <a href="#" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Contact</a>
            <a href="/logout"
               class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">Sign
                Out</a>
        </nav>
    </div>
</header>