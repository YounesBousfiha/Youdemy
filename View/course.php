<?php include_once __DIR__ . '/common/header.php' ?>

    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Explore Our Courses</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
           <?php foreach ($courseDATA as $course ) :?>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-200">
                <div class="relative">
                    <img class="h-48 w-full object-cover" src="../<?= $course->course_miniature ?>" alt="Course Image">
                    <div class="absolute top-0 right-0 bg-green-500 text-white px-3 py-1 rounded-bl-lg text-sm font-semibold">New</div>
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-3 hover:text-indigo-600 transition-colors duration-200">
                        <a href="/course/<?= $course->course_id ?>"><?= $course->course_nom ?></a>
                    </h2>
                    <p class="text-gray-700 mb-4 line-clamp-3"><?= $course->course_desc ?></p>
                    <div class="flex items-center mb-4">
                        <span class="text-sm text-gray-500 mr-2">Instructor:</span>
                        <span class="font-medium text-gray-800">John Doe</span>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-sm text-gray-500">Level: Beginner</span>
                        <a href="/course/<?= $course->course_id ?>" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">View Course</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


            <!-- Add more course cards here -->
        </div>
    </div>

<?php include_once __DIR__ . '/common/footer.php' ?>