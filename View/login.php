<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
     <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="bg-gray-50 font-sans">
    <!-- Header -->
  <header class="py-6 bg-white shadow-md">
    <div class="container mx-auto px-6 flex items-center justify-between">
      <a href="/" class="text-2xl font-bold text-gray-800">EduVerse</a>
      <nav>
           <a href="courses.html" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Courses</a>
              <a href="#" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">About</a>
                <a href="#" class="text-gray-600 hover:text-gray-900 px-3 transition duration-300 ease-in-out">Contact</a>
           <a href="register.php"
                class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition duration-300 ease-in-out">Sign
             Up</a>
        </nav>
    </div>
  </header>

    <div class="container mx-auto p-6 mt-10">
        <div class="bg-white rounded shadow p-8 max-w-xl mx-auto">
             <div  class="text-center mb-4">
                 <h2 class="text-2xl font-semibold text-gray-800  "> Log In  </h2>
              </div>
                <form action="" method="post">

               
              <!--Email Input -->
                  <div class="mb-4" >
                <label for="email"  class="text-gray-700 block  mb-2">  Email Address   </label>
                       <input type="email"  id="email" name="email" class="border w-full py-2 rounded  focus:border-purple-600 focus:outline-none" />

                 </div>


                 <!-- Password Input -->
                 <div  class="mb-4"  >
                
                      <label   for="password"   class="text-gray-700   mb-2 block "  >  Password    </label>

                         <input type="password" id="password"   name="password"   class="border w-full  py-2  rounded  focus:border-purple-600 focus:outline-none " />
                 </div>


                <!-- Login button and reset   -->

                    <div class="mt-6   text-center  " >
                           <button  class="bg-purple-600  hover:bg-purple-700 font-medium  px-5   py-2 rounded  text-white transition " >Log In  </button>

                         </div>
           <!-- Have Account  SignUp Here  -->
                
           <div  class=" mt-5  text-center"  >

             <p   class=" text-gray-700">
                   Don't  have an account? <a href="/signup" class=" text-purple-600   font-medium   hover:text-purple-700"  > Create  one </a>
            </p>
         
       
        </div>
               </form>

         </div>

</div>
  
     <!-- Footer -->
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

  <script src="./assets/js/index.js"></script>

</body>

</html>