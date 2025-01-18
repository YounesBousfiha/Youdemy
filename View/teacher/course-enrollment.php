<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Enrollment</title>
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
            <a href="course-create.php" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Create Courses</a>
              <a href="course-management.php" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Manage Course</a>
               <a href="statistics.php" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Statistics</a>
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
  <h1  class="text-3xl  font-bold mb-8 text-center  text-gray-800" >   Course: Mastering Python Programing </h1>
  
  <div class="bg-white  shadow rounded p-4">
         
        <h3 class="text-gray-700 text-center font-medium  text-2xl mb-4">Students Enrolled   </h3>

   <div  class=" overflow-x-auto">
 <table class=" min-w-full  leading-normal"   >
            <thead  >
              <tr>

        <th class="text-sm   font-medium border-b-2  text-gray-700  px-5 py-3  text-left">Student name </th>
        <th  class=" text-sm font-medium  text-gray-700  border-b-2   px-5  py-3 text-left"  >  Student Email  </th>

       <th class="text-sm  font-medium  border-b-2 text-gray-700  px-5  py-3 text-left"> Enrolled at </th>
   </tr>
          </thead>

          <tbody  >

            <tr>

              <td  class="text-gray-700 bg-white text-sm  border-b   px-5 py-4 text-left " >  
          Alex Johnes  
       
              </td>
                 <td class=" text-sm border-b  px-5 py-4 bg-white  text-gray-700  text-left">
              
                johns123@testmail.com
        
              
           </td>

                  <td   class="  text-sm text-gray-700 border-b   px-5  py-4 bg-white   text-left"> 
                     26 / 12 /2023 
                   </td>


            </tr>

             <tr>

               <td class="text-gray-700 bg-white  border-b text-sm px-5 py-4  text-left"> 
                 
           John  C
        
                 </td>
             <td   class=" text-sm border-b   px-5   py-4 bg-white text-gray-700 text-left">
         
               John145@testmail.com 
              </td>
            
       <td class="text-sm   text-gray-700 border-b  px-5 py-4  bg-white text-left"  > 26 / 12 / 2023 </td>


               </tr>

     
          </tbody>
      
       </table>

     
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