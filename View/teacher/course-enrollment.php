<?php include_once  __DIR__ . '/common/header.php' ?>
<div class="container mx-auto p-6 mt-10">
  <h1 class="text-3xl  font-bold mb-8 text-center  text-gray-800"> Course: <?= $enrollments[0]->course_nom ?></h1>

  <div class="bg-white  shadow rounded p-4">

    <h3 class="text-gray-700 text-center font-medium  text-2xl mb-4">Students Enrolled </h3>

    <div class=" overflow-x-auto">
      <table class=" min-w-full  leading-normal">
        <thead>
          <tr>
              <th class="text-sm   font-medium border-b-2  text-gray-700  px-5 py-3  text-left">Student Nom </th>
            <th class="text-sm   font-medium border-b-2  text-gray-700  px-5 py-3  text-left">Student Prenom </th>
            <th class=" text-sm font-medium  text-gray-700  border-b-2   px-5  py-3 text-left"> Student Email </th>
            <th class=" text-sm font-medium  text-gray-700  border-b-2   px-5  py-3 text-left"> Status </th>
          </tr>
        </thead>

        <tbody>
<?php foreach ($enrollments as $enrollment) ?>
          <tr>

              <td class="text-gray-700 bg-white text-sm  border-b   px-5 py-4 text-left "><?= $enrollment->nom ?></td>
              <td class="text-gray-700 bg-white text-sm  border-b   px-5 py-4 text-left "><?= $enrollment->prenom ?></td>
              <td class="text-gray-700 bg-white text-sm  border-b   px-5 py-4 text-left "><?= $enrollment->email ?></td>
              <td class="text-gray-700 bg-white text-sm  border-b   px-5 py-4 text-left "><?= $enrollment->enrollment_status ?></td>



          </tr>



        </tbody>

      </table>


    </div>

  </div>


</div>
<?php include_once  __DIR__ . '/common/footer.php' ?>