<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-gray-50 font-sans">
  <!-- Header -->
  <header class="py-6 bg-white shadow-md">
    <div class="container mx-auto px-6 flex items-center justify-between">
        <a href="../index.php" class="text-2xl font-bold text-gray-800">EduVerse</a>
        <nav>
          <a href="validate-teachers.html"
                class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Validate
                Teachers</a>
          <a href="user-management.html"
                class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">User Manage</a>
          <a href="course-management.html"
                class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Courses</a>
          <a href="category-management.html"
                class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Categories</a>
          <a href="tag-management.html"
                class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Tags</a>
           <a href="statistics.html"
                class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Statistics</a>
            
               <a href="../catalogue.php" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Courses</a>

           <a href="#" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">About</a>
           <a href="#" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Contact</a>

           <a href="../register.php"
              class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">Sign
             Out</a>

       </nav>
   </div>
 </header>

 <div class="container mx-auto p-6 mt-10">
    <h1 class="text-center text-3xl text-gray-800 mb-8 font-bold">Administrator Dashboard</h1>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Card 1-->
           <div class="bg-white rounded p-5 shadow-md transform hover:scale-105 transition-transform">
                <div class="flex items-center mb-3 justify-center ">  <i class="fas fa-book text-4xl  text-purple-600"></i></div>
             <h3 class="text-xl text-gray-700 font-medium text-center mb-2 ">Total Courses</h3>
           <p class="text-center  text-gray-800 font-bold text-4xl  ">178</p>
         </div>

         <!-- Card 2-->
      <div class="bg-white rounded p-5 shadow-md transform hover:scale-105 transition-transform">
          <div class="flex items-center  mb-3 justify-center">   <i class="fas fa-user-graduate text-4xl text-purple-600 "></i> </div>
          <h3 class="text-xl text-gray-700 text-center  font-medium mb-2 ">Total Students</h3>
                <p class="text-center text-gray-800  font-bold text-4xl">433</p>
    </div>
      
         <!-- Card 3-->
          <div class="bg-white rounded p-5 shadow-md  transform hover:scale-105 transition-transform">
           <div  class="flex items-center mb-3 justify-center">     <i class="fas fa-user-tie text-4xl text-purple-600"> </i> </div>
                <h3  class="text-xl text-gray-700   font-medium  text-center mb-2 ">Total Teachers</h3>
                     <p class="text-center text-gray-800 font-bold text-4xl ">33</p>
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
    <footer class="bg-gray-800 py-8 mt-10">
       <div class="container mx-auto px-6 text-center">
        <p class="text-gray-300 text-sm mb-2">
                &copy; 2023 EduVerse. All Rights Reserved.
          </p>
        <div class="mt-2">
               <a href="#" class="text-gray-400 hover:text-white px-3">Privacy Policy</a>
           <a href="#" class="text-gray-400 hover:text-white px-3">Terms of Use</a>
           </div>
    </div>
  </footer>
    <script src="../assets/js/index.js"></script>
</body>

</html>