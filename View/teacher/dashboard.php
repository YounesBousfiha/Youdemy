<?php include_once __DIR__ . '/common/header.php'?>
<?php $_SESSION['studentsPerTeacher'] ?>
<div class="container mx-auto p-6 mt-10">

         <h1  class="text-3xl  text-gray-800  font-bold text-center mb-6">Welcome <?= $_SESSION['nom'] . '  ' . $_SESSION['prenom'] ?>, Let's Rock!</h1>
            <p  class=" text-gray-600 text-center   mb-8"> Manage Your courses with this beautiful platform  </p>


        <div class="grid md:grid-cols-3 gap-5 mb-5 "   >


       
            <div  class="bg-white  shadow-lg rounded  p-6 transform hover:scale-105 transition-transform">
                <i class="fas fa-book  text-4xl mb-3  text-purple-600 "></i>
             <h3 class=" text-xl  font-medium  mb-3  text-center">Courses  </h3>
                <?php if($_SESSION['totalcourses']) : ?>
               <p  class="text-gray-800 font-medium text-4xl text-center"> <?= $_SESSION['totalcourses'] ?> </p>
                <?php else : ?>
                    <p  class="text-gray-800 font-medium text-4xl text-center"> Still Calculating </p>
                <?php endif ?>
        
          
          </div>


               
        <div class="bg-white shadow-lg rounded  p-6 transform hover:scale-105 transition-transform "   >

             <i class="fas fa-users text-4xl mb-3 text-purple-600  "></i>

        <h3  class="text-xl  font-medium mb-3   text-center">Total Students </h3>
        <?php if($_SESSION['studentsPerTeacher'])  : ?>
         <p  class="text-gray-800   font-medium text-4xl  text-center"  > <?= $_SESSION['studentsPerTeacher'] ?>  </p>
        <?php else : ?>
        <p  class="text-gray-800   font-medium text-4xl  text-center"  > Still Calculating  </p>
        <?php endif ?>

    </div>

          <div   class="bg-white shadow-lg rounded p-6  transform hover:scale-105  transition-transform" >
         <i class="fas fa-clock  text-4xl mb-3 text-purple-600 "> </i>
       <h3 class="text-xl font-medium  mb-3   text-center">  Last Activity  </h3>
      <p class="text-gray-800  text-center  font-medium"> 14:48 on 05/ 02 / 2024 </p>

      </div>
   </div>

  <!--  Teacher Course Section Placeholder-->
      
         
    <div class=" bg-white shadow-md my-8 rounded py-8" >
      <h2  class="text-gray-700 font-medium  mb-2  text-center">  Your recent Course  </h2>
        <ul  class=" mt-3">
           <li  class="p-3 flex justify-between items-center border-b border-gray-300"> 
          
             <div  class="flex gap-2 items-center"> 
                   <i class="fab fa-python text-2xl text-gray-600 " ></i>   
                      <h3  class="font-medium  text-gray-700 " > Mastering Python Programing    </h3>
            </div>
                   
               <a href="course-management.php" class="bg-purple-600 hover:bg-purple-700 px-3 py-2  text-white rounded font-medium" > Manage  </a>


           </li>
            <li  class="p-3 flex justify-between items-center border-b border-gray-300"> 
                    <div  class="flex gap-2 items-center" >
                  <i  class="fas fa-mobile-alt text-gray-600 text-2xl"></i> 
                        <h3  class="font-medium  text-gray-700"> React Native Crash Course  </h3>

                    
            </div>
               <a href="course-management.php" class="bg-purple-600  hover:bg-purple-700 px-3  py-2 text-white rounded   font-medium"  >  Manage    </a>
           
                </li>
            </ul>


    
      
       </div>


      
</div>
<?php include_once __DIR__ . '/common/footer.php'?>