<?php include_once  __DIR__ . '/common/header.php'; ?>
<?php var_dump($courseComments); ?>
<div class="container mx-auto p-4">
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-6 py-4 flex flex-col items-center">
            <h1 class="text-3xl font-bold mb-2"> <?= $courseDATA[0]->course_nom ?></h1>
            <p class="text-gray-700 text-base">
                By: <?= $courseDATA[0]->nom . ' ' . $courseDATA[0]->prenom ?>
            </p>
        </div>


        <!-- Condition if the Course type Text Or Video  -->
        <?php if($courseDATA[0]->course_type === 'text') : ?>
        <div class="px-6 py-4 flex flex-col items-center">
            <div class="font-bold text-xl mb-2">Course Content</div>
            <div class="prose max-w-none">
                <?= $html ?>
            </div>
        </div>
        <?php else : ?>
        <div class="flex justify-center">
            <iframe width="853" height="480" src="<?= $courseDATA[0]->course_content ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <?php endif; ?>




        <div class="px-6 py-4 bg-gray-50">
            <div class="font-bold text-xl mb-4">Comments</div>

            <!-- Existing Comments (Example - Replace with actual data fetching) -->
            <div id="comments-container">
                <?php foreach ($courseComments as $comment) :?>
                <div class="mb-4 p-3 bg-gray-100 rounded-md flex justify-between items-start">
                    <div>
                        <p class="font-semibold"><?= $comment->nom . ' ' . $comment->prenom ?></p>
                        <p class="text-gray-800"><?= $comment->comment_content ?></p>
                    </div>
                    <div class="flex gap-2">
                        <button class="text-blue-500 hover:text-blue-700 edit-comment">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-500 hover:text-red-700 delete-comment">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>


            <!-- Add New Comment -->
            <form action="/student/comment/create" method="POST">
                <input type="hidden" name="course_id" value="<?= $courseDATA[0]->course_id ?>">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="mt-4">
                    <textarea id="comment-text" name="comment_content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Add your comment..."></textarea>
                </div>
                <div class="mt-2">
                    <button id="submit-comment" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit Comment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include_once  __DIR__ . '/common/footer.php'; ?>
