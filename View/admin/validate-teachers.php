<?php include_once __DIR__ . '/common/header.php' ?>
    <div class="container mx-auto p-6 mt-10">
        <h1 class="text-3xl text-gray-800 font-bold text-center  mb-8 ">Validate Teachers Accounts</h1>

          <div  class="overflow-x-auto">
                <table class="min-w-full leading-normal bg-white rounded  shadow ">
                  <thead>
                  <tr>

            <th   class="text-sm  text-gray-700   px-5 py-3   border-b-2    font-medium text-left  "   >  Teacher nom </th>
                      <th   class="text-sm  text-gray-700   px-5 py-3   border-b-2    font-medium text-left  "   >  Teacher prenom </th>
        <th  class=" text-sm  text-gray-700   px-5   py-3 border-b-2     font-medium   text-left"   >   Teacher email </th>
     <th    class="text-sm   text-gray-700   px-5 py-3  border-b-2 font-medium   text-left"   >Action </th>

          </tr>
        </thead>
    <tbody>
<?php foreach ($invalidTeacher as $teacher) : ?>
           <tr>
               <td   class="px-5  py-4  bg-white   text-gray-700  border-b text-sm"><?= $teacher->nom ?>  </td>
               <td   class="px-5  py-4  bg-white   text-gray-700  border-b text-sm"><?= $teacher->prenom ?></td>
               <td   class="px-5   py-4  bg-white    text-gray-700   border-b text-sm" ><?= $teacher->email ?></td>
               <td   class="  text-gray-700 text-sm border-b  bg-white     px-5   py-4">
                   <div  class="flex space-x-3">
                       <form action="/admin/teacher/validate" method="POST">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                            <input type="hidden" name="teacher_id" value="<?= $teacher->user_id ?>">
                           <button type="submit"  class="text-green-600  font-medium    hover:text-green-700 p-1 rounded"  >
                               <i  class="fas  fa-check-circle"></i>
                               Valide le Compte
                           </button>
                       </form>

                       <form action="/admin/teacher/reject" method="POST">
                           <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                           <input type="hidden" name="teacher_id" value="<?= $teacher->user_id ?>">
                           <button type="submit"  class="text-red-600  font-medium    hover:text-red-700 p-1 rounded"  >
                               <i  class="fas  fa-check-circle"></i>
                               Reject le Compte
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
<?php include_once __DIR__ . '/common/footer.php' ?>