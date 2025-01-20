<?php include_once __DIR__ . '/common/header.php' ?>
<div class="container mx-auto p-6 mt-10">

   <h1 class="text-3xl text-center  text-gray-800 font-bold mb-8 "> My Courses </h1>


   <div class="grid  md:grid-cols-2 gap-5">
    <?php foreach ($enrollments as $enrollment) : ?>
        <div class="bg-white rounded-lg p-6 shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out">
        <div class="flex flex-col sm:flex-row items-start gap-6">
            <img src="../<?= $enrollment->course_miniature ?>" alt="course 1" class="object-cover w-full sm:w-1/3 rounded-lg h-auto shadow-md" />
            <div class="space-y-4">
                <h3 class="text-gray-800 text-2xl font-semibold"> <?= $enrollment->course_nom ?> </h3>
                <div>
                    <p class="text-gray-600"><?= $enrollment->course_desc ?></p>
                </div>
                <div class="bg-gray-200 rounded-full px-4 py-2 inline-block text-sm font-medium">
                    Status: <span class="font-medium <?= $enrollment->enrollment_status === 'active' ? 'text-green-600' : 'text-red-600'?>"> <?= $enrollment->enrollment_status?> </span>
                </div>
                <div class="text-right">
                    <a href="/course/<?= $enrollment->fk_course_id ?>" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 text-white font-medium rounded-full shadow-md transition-colors duration-300 ease-in-out"> Continue </a>
                </div>
            </div>
        </div>
        </div>
    <?php endforeach; ?>


      </div>
   </div>



</div>



<?php include_once __DIR__ . '/common/footer.php' ?>