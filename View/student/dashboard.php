<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
          <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-gray-50 font-sans">
     <!-- Header -->
  <header class="py-6 bg-white shadow-md">
    <div class="container mx-auto px-6 flex items-center justify-between">
        <a href="../index.html" class="text-2xl font-bold text-gray-800">EduVerse</a>
          <nav>
            <a href="my-courses.html" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">My Courses</a>
               <a href="../courses.html" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Courses</a>
               <a href="#" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">About</a>
                 <a href="#" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Contact</a>
                 <a href="../register.php"
                  class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">Sign
               Out</a>
        </nav>
   </div>
  </header>

    <div class="container mx-auto p-6 mt-10">
         <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Welcome Back, Alex!</h1>
          <p class="text-center text-gray-600 mb-10"  > Stay on Top on your courses here at dashboard</p>
    

          <!-- Overview Cards-->
       <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

          <!-- Card 1 -->
       <div class="bg-white shadow-lg rounded-md p-6 transform hover:scale-105 transition-transform">
         <i class="fas fa-book text-4xl mb-4 text-purple-600 "> </i>
           <h3  class="text-xl font-medium mb-2 ">Courses Enrolled  </h3>
             <p  class="text-4xl text-center font-bold text-gray-800 " >  7 </p>

       </div>

      <!-- Card 2-->
     <div  class="bg-white shadow-lg rounded-md p-6 transform hover:scale-105 transition-transform ">
      <i class="fas fa-clock text-4xl  text-purple-600 mb-4" > </i>
      <h3 class="text-xl font-medium mb-2"  > Last Login </h3>
       <p  class="text-gray-800 font-medium  text-center" >14:55 on 05 / 02 / 2024</p>
  
       </div>


       <!-- Card 3-->
     <div  class="bg-white shadow-lg rounded-md p-6 transform hover:scale-105 transition-transform  ">
        <i  class="fas fa-chart-bar  text-4xl mb-4 text-purple-600 "></i>
       <h3 class="text-xl font-medium mb-2">  Performance </h3>
           <p class="text-gray-800  font-medium  text-center"  >Good  </p>
    
      </div>
   
   </div>

     
         
    
          <div class="bg-white rounded shadow-md my-10 py-8 ">
        <h2 class="text-gray-700  font-medium mb-2  text-center">Recently updated Course </h2>
              <!-- Recent Course Items Placeholder -->
          <ul class="mt-4">
                   <li  class="flex items-center justify-between p-4  border-b border-gray-300 " >
                          
                    <div  class="flex items-center space-x-3"  >  
                                     <i class="fab fa-python  text-gray-500  text-2xl "  ></i>  
                             <h3 class="font-medium  text-gray-700">Master Python Programing  </h3>
                        
                   </div>

                          <a  href="#"  class="  bg-purple-600 hover:bg-purple-700   rounded  text-white  font-medium px-3 py-1" >Continue   </a>
         
                </li>

               <li  class="flex items-center justify-between p-4 border-b border-gray-300  ">
                   <div  class="flex items-center  space-x-3"  >  
                         <i  class="fas fa-mobile-alt  text-gray-500  text-2xl"  ></i>
                         <h3 class="font-medium text-gray-700 " > React Native Crash Course  </h3>
                    
                    </div>
                
                    <a  href="#"   class="bg-purple-600 hover:bg-purple-700  rounded text-white font-medium   px-3  py-1" >Continue</a>
      
           
                 </li>
                
            </ul>
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


</body>
   <script src="../assets/js/index.js"></script>
</html>