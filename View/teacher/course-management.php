<?php include_once __DIR__ . '/common/header.php'?>
  
    <div class="container mx-auto p-6 mt-10">
     
            <h1  class="text-3xl text-center  text-gray-800   font-bold mb-8">Manage Courses</h1>

        <div class="bg-white shadow  rounded py-4  mt-3   overflow-x-auto ">
        
           
            <table class="min-w-full leading-normal  " >
             <thead>
                    <tr >
                       <th class="px-5 py-3 border-b-2 text-left text-sm   font-medium   text-gray-600 "> Title  </th>
                        <th class="px-5 py-3 border-b-2  text-left text-sm  font-medium text-gray-600 ">Category</th>
                          <th class="px-5 py-3  border-b-2  text-left text-sm   font-medium text-gray-600"> Students Enrolled </th>
                      <th class="px-5 py-3  border-b-2 text-left text-sm   font-medium text-gray-600  ">Created at</th>
                      
                    <th  class="px-5 py-3 border-b-2 text-left text-sm  font-medium  text-gray-600">Action</th>

             </tr>
                </thead>

           <tbody >

                  <tr >

                <td  class="px-5 py-5 border-b  bg-white   text-sm text-gray-700"> 
                       Mastering Python Programing   </td>
                         <td  class="px-5 py-5 border-b  bg-white  text-sm  text-gray-700  ">   Web Development</td>

                  <td   class="px-5 py-5 border-b  bg-white  text-sm  text-gray-700"  >155 </td>

                    <td class="px-5 py-5  border-b bg-white  text-sm text-gray-700 ">  24/ 12 / 2023 </td>


                      <td class="px-5  py-5   border-b   bg-white  text-sm    "  >  

                         <div class="flex space-x-1" >

                          <a href="course-enrollment.php" class="text-blue-600  font-medium    rounded p-1 transition  hover:text-blue-800  " > View Enrollment    </a>
                         
                          <button class="text-yellow-500  font-medium   rounded  p-1    hover:text-yellow-600 transition  "> <i class="fas fa-edit">  </i></button>
                           <button class="text-red-500  font-medium   rounded   p-1    hover:text-red-600   transition">   <i  class="fas fa-trash-alt">  </i>   </button>
                        
                    
                      </div>

                    </td>

        </tr>

        <tr  >

          <td   class="px-5  py-5 border-b bg-white  text-sm  text-gray-700 "> React Native Crash Course</td>
              <td  class="px-5 py-5  border-b   bg-white text-sm  text-gray-700">  Mobile Development </td>
                  <td   class="px-5 py-5 border-b  bg-white   text-sm  text-gray-700">   80</td>
             <td  class="px-5  py-5  border-b  bg-white text-sm text-gray-700">  02 / 02 / 2024  </td>
    

            <td class="px-5 py-5 border-b bg-white text-sm   " >
          
           
             <div class="flex  space-x-1">
         
                  <a href="course-enrollment.php" class="text-blue-600  font-medium rounded  p-1 transition  hover:text-blue-800   " > View Enrollment    </a>
             
                      <button  class="text-yellow-500  font-medium   rounded   p-1    hover:text-yellow-600   transition">    <i  class="fas fa-edit">  </i>   </button>

                        <button   class="text-red-500 font-medium    rounded  p-1   hover:text-red-600  transition ">  <i   class="fas fa-trash-alt"   >   </i> </button>
                     
                </div>

             </td>
  
           </tr>

       </tbody>

      </table>

 </div>


    </div>
<?php include_once  __DIR__ . '/common/footer.php' ?>