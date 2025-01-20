<?php include_once __DIR__ . '/common/header.php' ?>

<div class="container mx-auto p-6 mt-10">
    <h1 class="text-center text-3xl text-gray-800 mb-8 font-bold">Administrator Dashboard</h1>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Card 1-->
           <div class="bg-white rounded p-5 shadow-md transform hover:scale-105 transition-transform">
                <div class="flex items-center mb-3 justify-center ">  <i class="fas fa-book text-4xl  text-purple-600"></i></div>
             <h3 class="text-xl text-gray-700 font-medium text-center mb-2 ">Total Courses</h3>
               <?php if ($_SESSION['totalcourses']) : ?>
                    <p class="text-center  text-gray-800 font-bold text-4xl  "><?= $_SESSION['totalcourses'] ?></p>
                <?php else : ?>
                   <p class="text-center  text-gray-800 font-bold text-4xl  "> Still Calculating </p>
               <?php endif ?>
         </div>

         <!-- Card 2-->
      <div class="bg-white rounded p-5 shadow-md transform hover:scale-105 transition-transform">
          <div class="flex items-center  mb-3 justify-center">   <i class="fas fa-user-graduate text-4xl text-purple-600 "></i> </div>
          <h3 class="text-xl text-gray-700 text-center  font-medium mb-2 ">Total Students</h3>
          <?php if($_SESSION['students']) : ?>
              <p class="text-center  text-gray-800 font-bold text-4xl  "><?= $_SESSION['students'] ?></p>
          <?php else : ?>
              <p class="text-center  text-gray-800 font-bold text-4xl  "> Still Calculating </p>
          <?php endif ?>
    </div>
      
         <!-- Card 3-->
          <div class="bg-white rounded p-5 shadow-md  transform hover:scale-105 transition-transform">
           <div  class="flex items-center mb-3 justify-center">     <i class="fas fa-user-tie text-4xl text-purple-600"> </i> </div>
                <h3  class="text-xl text-gray-700   font-medium  text-center mb-2 ">Total Teachers</h3>
              <?php if($_SESSION['teachers']) : ?>
                  <p class="text-center  text-gray-800 font-bold text-4xl  "><?= $_SESSION['teachers'] ?></p>
              <?php else : ?>
                  <p class="text-center  text-gray-800 font-bold text-4xl  "> Still Calculating </p>
              <?php endif ?>
          </div>
      </div>


        <!--  Admin Dashb Summary Data   -->
     <div  class="bg-white rounded p-5  shadow  ">
             <h3 class="text-xl  text-center text-gray-700 font-medium  mb-4"> System Summary   </h3>

            <div class="flex flex-col md:flex-row gap-4 justify-between items-start">


                 <!--  Card for Latest Registration   -->
                 <div  class=" bg-gray-100    p-4 flex-1 rounded" >
             
                   <h4  class="text-gray-800  text-lg   mb-2  font-medium ">Latest Registrations   </h4>
           
                   <ul class="space-y-1">

                       <li class=" text-gray-600   p-2    rounded   "   > Student Registration : Alex johns </li>
                      <li class="text-gray-600 p-2   rounded"> Teacher Registration  : John Smith  </li>
                          
                    </ul>

           </div>
             <!--Card For Recent Update-->

             <div   class="  bg-gray-100 flex-1   rounded   p-4 ">
                      <h4 class="text-gray-800  text-lg    font-medium  mb-2 " > Recently Updated  </h4>
                        <ul class=" space-y-1 ">
                                     <li class=" text-gray-600 p-2   rounded "  > Python for Beginners  Updated  </li>
                             <li class="text-gray-600 p-2    rounded "   > Advanced Java Updated    </li>
                      
                     </ul>

             </div>

         
    </div>
     </div>

  
</div>
<?php include_once __DIR__ . '/common/footer.php'; ?>