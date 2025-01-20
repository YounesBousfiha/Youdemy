<?php include_once __DIR__ . '/common/header.php' ?>
<div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
  <!-- Modal content -->
  <div class="bg-white rounded-lg shadow-lg p-6 w-3/4 md:w-1/2 lg:w-1/3 overflow-y-auto" style="max-height: 800px;">
    <span class="close text-gray-500 hover:text-gray-700 cursor-pointer text-2xl font-bold">&times;</span>
    <form action="/teacher/course/update" method="POST" enctype="multipart/form-data">
      <div class="flex justify-center">
        <img id="course_image" src="" alt="embedded-image" height="450" width="450">
      </div>
      <input type="hidden" name="course_id" id="course_id" value="">
      <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
      <div class="mb-4">
        <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Course Description:</label>
        <textarea name="course_desc" id="course_desc" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value=""></textarea>
      </div>
      <div class="mb-4">
        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Course Miniature:</label>
        <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      </div>
      <div class="mb-4">
        <label for="visibility" class="block text-gray-700 text-sm font-bold mb-2">Course Miniature:</label>
        <select id="visibility" name="course_visibility" class="border rounded py-2  focus:border-purple-600 text-gray-500 cursor-pointer  appearance-none   w-full   focus:outline-none px-4 pr-8">
          <option selected disabled> Select Course Visibility</option>
          <option value="active">Public</option>
          <option value="inactive">Hide</option>
        </select>
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
  <h1 class="text-3xl text-center  text-gray-800   font-bold mb-8">Manage Courses</h1>

  <div class="bg-white shadow  rounded py-4  mt-3   overflow-x-auto ">
    <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100">
      <p class="text-center text-gray-900 font-extrabold text-4xl">
        <span class="block text-sm text-gray-500">Total Students</span>
        <?= $courses[0]->Total_Student ?>
      </p>
    </div>


    <table class="min-w-full leading-normal  ">
      <thead>
        <tr>
          <th class="px-5 py-3 border-b-2 text-left text-sm   font-medium   text-gray-600 "> Title </th>
          <th class="px-5 py-3 border-b-2  text-left text-sm  font-medium text-gray-600 ">Category</th>
          <th class="px-5 py-3  border-b-2  text-left text-sm   font-medium text-gray-600"> Students Enrolled </th>
            <th class="px-5 py-3 border-b-2 text-left text-sm  font-medium  text-gray-600">Action</th>

        </tr>
      </thead>

      <tbody>
        <?php foreach ($courses as $course) : ?>
          <tr>
            <td class="px-5 py-5 border-b  bg-white   text-sm text-gray-700"> <?= $course->course_nom ?></td>
            <td class="px-5 py-5 border-b  bg-white  text-sm  text-gray-700  "> <?= $course->categorie_nom ?></td>

            <td class="px-5 py-5 border-b  bg-white  text-sm  text-gray-700"><?= $course->Students_Enrolled ?> </td>

            <td class="px-5  py-5   border-b   bg-white  text-sm    ">

              <div class="flex space-x-1">

                <a href="/teacher/courses/enrollments/<?= $course->course_id ?>" class="text-blue-600  font-medium    rounded p-1 transition  hover:text-blue-800  "> View Enrollment </a>

                <button onclick="setModalData(this)"
                  data-id="<?= $course->course_id ?>"
                  data-nom="<?= $course->course_nom ?>"
                  data-content="<?= $course->course_content ?>"
                  data-desc="<?= $course->course_desc ?>"
                  data-image="<?= $course->course_miniature ?>"
                  data-visible="<?= $course->course_visibility ?>"
                  data-type="<?= $course->course_type ?>"
                  class="openModal text-yellow-500  font-medium   rounded  p-1    hover:text-yellow-600 transition  ">
                  <i class="fas fa-edit"> </i>
                </button>
                <form action="/teacher/course/delete" method="POST">
                  <input id="delete" type="hidden" name="course_id" class="   text-red-600   hover:text-red-700  transition    rounded   p-1" value="<?= $course->course_id ?>">
                  <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                  <button type="submit" class="text-red-600 hover:text-red-700 transition rounded p-1">
                    <i class="fas fa-trash-alt"></i>
                  </button>
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
        function removeFirstAndLastChar(str) {
            if (str.length <= 2) {
                return '';
            }
            return str.slice(1, -1);
        }

        function setModalData(btn) {
            const course_id = btn.getAttribute('data-id');
            const course_content = btn.getAttribute('data-content');
            const course_desc = btn.getAttribute('data-desc');
            const course_image = btn.getAttribute('data-image');
            const course_type = btn.getAttribute('data-type');
            console.log(course_type);
            let img = "../" + course_image;
            document.getElementById('course_id').value = course_id;
            document.getElementById('course_desc').value = course_desc;
            document.getElementById('course_image').src = img;

            if (course_type === 'video') {
                if (document.getElementById('video_url')) {
                    return;
                }

                let videoElement = `<div class="mb-4">
                    <label for="video_url" class="block text-gray-700 text-sm font-bold mb-2">Video URL:</label>
                    <input type="text" name="course_content" id="video_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="${course_content}">
                   </div>`;
                document.getElementById('course_desc').insertAdjacentHTML('afterend', videoElement);

                if (simplemde) {
                    simplemde.toTextArea();
                    simplemde = null;
                    document.getElementById('course_content').remove();
                }
            } else {
                if (document.getElementById('video_url')) {
                    document.getElementById('video_url').remove();
                }

                let content = removeFirstAndLastChar(course_content);
                content = content.replace(/\\r\\n|\\n/g, "\n");
                if (!document.getElementById('course_content')) {
                    document.getElementById('course_desc').insertAdjacentHTML('afterend', `<textarea id="course_content" name="course_content"></textarea>`);
                    simplemde = new SimpleMDE({
                        element: document.getElementById("course_content"),
                        initialValue: content
                    });
                }
                document.getElementById('course_content').value = course_content;
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
<?php include_once  __DIR__ . '/common/footer.php' ?>