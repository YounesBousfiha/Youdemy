<?php include_once __DIR__ . '/common/header.php'?>
<body class="bg-gray-100">

<div class="container mx-auto p-6 mt-10">
    <h1 class="text-3xl text-gray-800 text-center mb-8 font-bold">Manage Comments</h1>

    <div class="bg-white shadow-md rounded overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
            <tr>
                <th class="text-sm px-5 py-3 border-b-2 text-gray-700 font-medium text-left">Comment ID</th>
                <th class="text-sm px-5 py-3 border-b-2 text-gray-700 font-medium text-left">Course</th>
                <th class="text-sm px-5 py-3 border-b-2 text-gray-700 font-medium text-left">Author Nom</th>
                <th class="text-sm px-5 py-3 border-b-2 text-gray-700 font-medium text-left">Author Prenom</th>
                <th class="text-sm px-5 py-3 border-b-2 text-gray-700 font-medium text-left">Content</th>
                <th class="text-sm text-gray-700 border-b-2 px-5 py-3 font-medium text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($comments as $comment) : ?>
                <tr>
                    <td class="text-sm px-5 py-4 text-gray-700 bg-white"><?= $comment->comment_id ?></td>
                    <td class="text-sm px-5 py-4 text-gray-700 bg-white"><?= $comment->course_nom ?></td>
                    <td class="text-sm px-5 py-4 text-gray-700 bg-white"><?= $comment->nom ?></td>
                    <td class="text-sm px-5 py-4 text-gray-700 bg-white"><?= $comment->prenom ?></td>
                    <td class="text-sm px-5 py-4 text-gray-700 bg-white"><?= $comment->comment_content ?></td>
                    <td class="bg-white px-5 py-4 border-b text-sm">
                        <form action="/admin/comment/delete" method="POST">
                            <input type="hidden" name="comment_id" value="<?= $comment->comment_id ?>">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                            <button type="submit" class="text-red-600 hover:text-red-700 transition rounded p-1">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once __DIR__ . '/common/footer.php'?>
