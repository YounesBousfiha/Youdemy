<?php include_once  __DIR__ . '/common/header.php' ?>
    <section class="container mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Search Results</h2>

       <?php if (empty($searchResults)): ?>
            <p class="text-gray-600">No results found.</p>
        <?php else: ?>
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($searchResults as $course): ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img class="w-full h-32 object-cover" src="<?= $course->course_miniature ?>" alt="Thumbnail">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2"><?= $course->course_nom ?></h3>
                            <p class="text-gray-700 mb-4"><?= $course->course_desc ?></p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Teacher: <span class="font-medium"><?= $course->nom . ' ' . $course->prenom?></span></p>
                                </div>
                                <a href="/course/<?= $course->course_id ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">View Course</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

<?php include_once  __DIR__ . '/common/footer.php' ?>