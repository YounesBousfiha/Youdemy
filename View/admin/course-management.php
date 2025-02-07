<?php include_once __DIR__ . '/common/header.php' ?>

    <div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow-lg p-6 w-3/4 md:w-1/2 lg:w-1/3 overflow-y-auto" style="max-height: 800px;">
            <span class="close text-gray-500 hover:text-gray-700 cursor-pointer text-2xl font-bold">&times;</span>
            <form action="/admin/course/update" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="course_id" id="course_id" value="">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="mb-4">
                    <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Course Description:</label>
                    <textarea name="course_desc" id="course_desc" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value=""></textarea>
                </div>
                <div class="flex justify-center space-x-3">
                    <button type="submit" class="bg-yellow-500 text-white hover:bg-yellow-600 transition rounded p-3">
                        Update
                    </button>
                    <button type="button" class="cancelModal bg-red-500 text-white hover:bg-red-600 transition rounded p-3">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

<div class="container mx-auto p-6 mt-10">
    <h1 class="text-3xl font-bold text-gray-800  text-center  mb-10"> Admin Course Management </h1>
    <div class="bg-white shadow rounded    overflow-x-auto">

        <table class=" min-w-full   leading-normal ">
            <thead>

                <tr>
                    <th class="px-5  py-3 border-b-2 text-left text-sm   text-gray-600   font-medium">Course title </th>
                    <th class="px-5   py-3  text-left border-b-2  text-sm  text-gray-600    font-medium"> Category</th>
                    <th class="px-5   py-3 border-b-2 text-left text-sm text-gray-600   font-medium  ">Teacher Nom </th>
                    <th class="px-5   py-3 border-b-2 text-left text-sm text-gray-600   font-medium  ">Teacher prenom </th>
                    <th class="px-5   py-3 border-b-2 text-left text-sm text-gray-600   font-medium  "> Status </th>
                    <th class="px-5   py-3 border-b-2 text-left text-sm text-gray-600   font-medium  ">Visibility </th>
                    <th class="px-5   py-3 border-b-2 text-left text-sm text-gray-600   font-medium  ">Decision </th>
                    <th class="px-5   py-3   text-left  border-b-2    text-gray-600    font-medium "> Actions </th>
                </tr>

            </thead>

            <tbody>

                <?php foreach ($courses as $course) : ?>
                <tr>
                    <td class=" px-5  py-4   bg-white  text-gray-700    text-sm  border-b  "> <?= $course->course_nom ?> </td>
                    <td class=" px-5 py-4 bg-white   text-gray-700    text-sm   border-b"><?= $course->categorie_nom ?> </td>
                    <td class="px-5  py-4  bg-white text-gray-700   text-sm    border-b"> <?= $course->nom ?>   </td>
                    <td class="px-5  py-4  bg-white text-gray-700   text-sm    border-b"> <?= $course->prenom ?>   </td>
                    <td class="px-5  py-4  bg-white text-gray-700   text-sm    border-b">
                        <span class="<?= $course->course_status === 'approved' ? 'bg-green-100 text-green-800' : ($course->course_status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800');  ?> text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?= $course->course_status ?></span>
                    </td>
                    <td class="px-5  py-4  bg-white text-gray-700   text-sm    border-b">
                        <span class="<?= $course->course_visibility === 'active' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800';  ?> text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><?= $course->course_visibility ?></span>
                    </td>
                    <td class=" bg-white  text-gray-700 text-sm   px-5    py-4 border-b">
                        <div class="flex space-x-3  ">
                            <form action="/admin/course/approuve" method="POST">
                                <input type="hidden" name="course_id" value="<?= $course->course_id ?>">
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                <button type="submit" class="p-1 text-greed-500 hover:text-green-600 rounded transition"> <i class="fas fa-check"></i> </button>
                            </form>
                            <form action="/admin/course/reject" method="POST">
                                <input type="hidden" name="course_id" value="<?= $course->course_id ?>">
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                <button class="p-1 text-red-600 hover:text-red-700 transition rounded"> <i class="fas fa-times"></i> </button>
                            </form>
                        </div>
                    </td>
                    <td class=" bg-white  text-gray-700 text-sm   px-5    py-4 border-b">
                        <div class="flex space-x-3  ">
                            <button onclick="setModalData(this)"
                                    data-id="<?= $course->course_id ?>"
                                    data-nom="<?= $course->course_nom ?>"
                                    data-desc="<?= $course->course_desc ?>"
                                    data-content="<?= $course->course_content ?>"
                                    data-type="<?= $course->course_type ?>"
                                    class="openModal p-1 text-yellow-500 hover:text-yellow-600 rounded transition"> <i class="fas fa-edit"></i> </button>
                            <form action="/admin/course/delete" method="POST">
                                <input type="hidden" name="course_id" value="<?= $course->course_id ?>">
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                <button class="p-1 text-red-600 hover:text-red-700 transition rounded"> <i class="fas fa-times"></i> </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>

        </table>



    </div>



</div>

<script>
    function setModalData(btn) {
        const course_id = btn.getAttribute('data-id');
        const course_content = btn.getAttribute('data-content');
        const course_desc = btn.getAttribute('data-desc');
        const course_type = btn.getAttribute('data-type');

        document.getElementById('course_id').value = course_id;
        document.getElementById('course_desc').value = course_desc;

        if (course_type === 'video') {
            if (document.getElementById('video_url')) {
                return;
            }

            let videoUrl = document.createElement('input');
            videoUrl.setAttribute('type', 'url');
            videoUrl.setAttribute('name', 'course_content');
            videoUrl.setAttribute('class', 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline');
            videoUrl.setAttribute('value', course_content);
            videoUrl.setAttribute('id', 'video_url');

            if (typeof simplemde !== 'undefined' && simplemde) {
                simplemde.toTextArea();
                simplemde = null;
                document.getElementById('course_content').remove();
            }

            document.getElementById('course_desc').insertAdjacentElement('afterend', videoUrl);
        } else {
            if (document.getElementById('video_url')) {
                document.getElementById('video_url').remove();
            }

            let content = course_content.replace(/\\r\\n|\\n/g, "\n");
            if (!document.getElementById('course_content')) {
                document.getElementById('course_desc').insertAdjacentHTML('afterend', `<textarea id="course_content" name="course_content"></textarea>`);
                simplemde = new SimpleMDE({
                    element: document.getElementById("course_content"),
                    initialValue: content
                });
            }
            document.getElementById('course_content').value = content;
        }
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
<?php include_once __DIR__ . '/common/footer.php' ?>