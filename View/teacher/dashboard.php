<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
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
                  <a href="course-create.html" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Create Courses</a>
                      <a href="course-management.html" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Manage Course</a>
                      <a href="statistics.html" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Statistics</a>
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

         <h1  class="text-3xl  text-gray-800  font-bold text-center mb-6">Welcome Back Andrew, Let's Rock!</h1>
            <p  class=" text-gray-600 text-center   mb-8"> Manage Your courses with this beautiful platform  </p>


        <div class="grid md:grid-cols-3 gap-5 mb-5 "   >


       
            <div  class="bg-white  shadow-lg rounded  p-6 transform hover:scale-105 transition-transform">
                <i class="fas fa-book  text-4xl mb-3  text-purple-600 "></i>
             <h3 class=" text-xl  font-medium  mb-3  text-center">Courses  </h3>
               <p  class="text-gray-800 font-medium text-4xl text-center"> 9 </p>

        
          
          </div>


               
        <div class="bg-white shadow-lg rounded  p-6 transform hover:scale-105 transition-transform "   >

             <i class="fas fa-users text-4xl mb-3 text-purple-600  "></i>

        <h3  class="text-xl  font-medium mb-3   text-center">Total Students </h3>
     
         <p  class="text-gray-800   font-medium text-4xl  text-center"  >301  </p>


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
                   
               <a   href="course-management.html"  class="bg-purple-600 hover:bg-purple-700 px-3 py-2  text-white rounded font-medium" > Manage  </a>


           </li>
            <li  class="p-3 flex justify-between items-center border-b border-gray-300"> 
                    <div  class="flex gap-2 items-center" >
                  <i  class="fas fa-mobile-alt text-gray-600 text-2xl"></i> 
                        <h3  class="font-medium  text-gray-700"> React Native Crash Course  </h3>

                    
            </div>
               <a  href="course-management.html" class="bg-purple-600  hover:bg-purple-700 px-3  py-2 text-white rounded   font-medium"  >  Manage    </a>
           
                </li>
            </ul>


    
      
       </div>


      
</div>
<footer class="bg-gray-800 py-8 mt-10">
    <div class="container mx-auto px-6 text-center">
        <p class="text-gray-300 text-sm mb-2">
            &copy; 2023 EduVerse. All