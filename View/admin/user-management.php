<?php include_once __DIR__ . '/common/header.php' ?>
  <div class="container mx-auto p-6 mt-10">

       <h1   class="text-3xl   text-gray-800  font-bold text-center  mb-8"> Manage Users </h1>

   <div  class=" bg-white  shadow  rounded   overflow-x-auto">
  <table class="min-w-full leading-normal ">

  <thead>

          <tr >
              <th  class="text-sm font-medium    border-b-2   text-gray-700  px-5   py-3   text-left"   >  User Nom  </th>
              <th  class="text-sm font-medium    border-b-2   text-gray-700  px-5   py-3   text-left"   >  User Prenom  </th>
              <th  class=" text-sm font-medium border-b-2  text-gray-700  px-5 py-3 text-left  ">   User Email    </th>
              <th   class=" text-sm font-medium    text-gray-700    border-b-2  px-5 py-3   text-left ">  User Role</th>
              <th   class=" text-sm font-medium    text-gray-700    border-b-2  px-5 py-3   text-left ">  User Status</th>
              <th   class="text-sm font-medium  text-gray-700   border-b-2   px-5  py-3   text-left"   >Actions </th>
       </tr>
          
   </thead>

 <tbody >
 <?php foreach ($allusers as $user) : ?>
        <tr>
            <td class="  text-gray-700 bg-white  text-sm   px-5 py-4 border-b  "> <?= $user->nom ?>  </td>
            <td class="  text-gray-700 bg-white  text-sm   px-5 py-4 border-b  "> <?= $user->prenom ?>  </td>
             <td   class=" text-sm text-gray-700 border-b   px-5  py-4   bg-white">  <?= $user->email ?>    </td>
            <td class=" text-sm   text-gray-700  border-b   px-5 py-4 bg-white">  <?= $user->role_name ?> </td>
            <td   class=" text-sm text-gray-700 border-b   px-5  py-4   bg-white">
                <span class="<?= $user->user_status === 'active' ? 'bg-green-100' : 'bg-red-100' ?> text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                    <?= $user->user_status ?>
                </span>
            </td>
           <td class="bg-white text-sm   border-b  px-5  py-4 ">
                <div class="flex ">
                    <form action="/admin/user/activate" method="POST">
                        <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        <button type="submit" class="text-green-600 font-medium rounded hover:text-red-700 p-1">
                            <i class="fas fa-check-circle"></i>
                        </button>
                    </form>
                    <form action="/admin/user/delete" method="POST">
                        <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        <button type="submit" class="text-red-600 font-medium rounded hover:text-red-700 p-1">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    <form action="/admin/user/suspend" method="POST">
                        <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        <button type="submit" class="text-red-600 font-medium rounded hover:text-red-700 p-1">
                            <i class="fas fa-ban"></i>
                        </button>
                    </form>
                </div>
           </td>
        </tr>
 <?php endforeach ?>
       
    
 
 </tbody>


   </table>
        
  </div>
</div>
<?php include_once __DIR__ . '/common/footer.php'?>