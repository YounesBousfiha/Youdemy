<?php include_once  __DIR__ . '/common/header.php'; ?>

<div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <!-- Modal content -->
    <div class="bg-white rounded-lg shadow-lg p-6 w-3/4 md:w-1/2 lg:w-1/3">
        <span class="close text-gray-500 hover:text-gray-700 cursor-pointer text-2xl font-bold">&times;</span>
        <form action="/student/comment/update" method="POST" id="comment-form">
            <div>
                <input type="hidden" name="comment_id" id="comment_id" value="">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="mb-4" id="fields">
                    <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">New Comment:</label>
                    <input type="text" name="comment_content" id="comment_content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="">
                </div>
                <div class="flex justify-center space-x-3">
                    <button type="submit" class="bg-yellow-500 text-white hover:bg-yellow-600 transition rounded p-3">
                        update
                    </button>
                    <button type="button" class="cancelModal bg-red-500 text-white hover:bg-red-600 transition rounded p-3">
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

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
                    <?php if($comment->fk_user_id === $_SESSION['user_id'])  : ?>
                    <div class="flex gap-2">
                        <button onclick="setDatatoModal(this)" data-id="<?= $comment->comment_id ?>" data-content="<?= $comment->comment_content ?>" class="openModal text-blue-500 hover:text-blue-700 edit-comment">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="/student/comment/delete" method="POST">
                            <input type="hidden" name="comment_id" value="<?= $comment->comment_id ?>">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                            <button class="text-red-500 hover:text-red-700 delete-comment">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                    <?php endif ?>
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
<script>
    function setDatatoModal(btn) {
        const id = btn.getAttribute('data-id');
        const content = btn.getAttribute('data-content');
        document.getElementById("comment_id").value = id;
        document.getElementById("comment_content").value = content;
    }

    document.querySelectorAll('.openModal').forEach((element) => {
        element.addEventListener('click', () => {
            document.getElementById('myModal').classList.remove('hidden');
        })
    });

    document.querySelectorAll('.close').forEach((element) => {
        element.addEventListener('click', () => {
            document.getElementById('myModal').classList.add('hidden');
        });
    });

    document.querySelectorAll('.cancelModal').forEach((element) => {
        element.addEventListener('click', () => {
            document.getElementById('myModal').classList.add('hidden');
        });
    });

    window.onclick = function(event) {
        if (event.target === document.getElementById('myModal')) {
            document.getElementById('myModal').classList.add('hidden');
        }
    }
</script>


<?php include_once  __DIR__ . '/common/footer.php'; ?>
