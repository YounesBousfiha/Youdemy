<?php include_once __DIR__ . '/common/header.php' ?>
<div class="container mx-auto p-6 mt-10">

  <h1 class="text-3xl text-center  text-gray-800   font-bold mb-8">Manage Courses</h1>

  <div class="bg-white shadow  rounded py-4  mt-3   overflow-x-auto ">


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

              <button class="text-yellow-500  font-medium   rounded  p-1    hover:text-yellow-600 transition  "> <i class="fas fa-edit"> </i></button>
                <form action="/teacher/course/delete" method="POST">
                    <input id="delete" type="hidden" name="course_id" class="   text-red-600   hover:text-red-700  transition    rounded   p-1" value="<?= $course->course_id ?>" >
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
<?php include_once  __DIR__ . '/common/footer.php' ?>