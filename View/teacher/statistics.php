<?php include_once __DIR__ . '/common/header.php'?>

    <div class="container mx-auto p-6 mt-10">
    <h1  class="text-3xl font-bold text-center  mb-10 text-gray-800" >Statistics</h1>


   <div class="grid grid-cols-1   md:grid-cols-3  gap-5 "   >
        <div class="bg-white rounded shadow p-5 transform hover:scale-105 transition-transform ">
        
             <i class="fas fa-book text-4xl mb-4 text-purple-600"></i>
         
               <h3  class="text-2xl font-medium text-center">  Total Courses Created</h3>
           
              <p  class=" text-gray-800  text-4xl text-center   font-medium" >11</p>

        </div>
      

            <div   class="bg-white  rounded  p-5  shadow  transform hover:scale-105 transition-transform">
                  <i  class="fas fa-users text-4xl mb-4 text-purple-600" > </i>
                   
                   <h3   class=" text-2xl text-center  font-medium  " >Total Students Enrolled  </h3>

               <p   class="text-gray-800 text-4xl   font-medium  text-center ">280  </p>
            
         
           </div>
        
        
          <div   class="bg-white shadow  rounded p-5  transform hover:scale-105 transition-transform">
          <i  class="fas fa-graduation-cap  text-4xl  text-purple-600 mb-4 " ></i>

               <h3  class=" text-2xl  font-medium text-center"  >  Avg. Student Per course</h3>
         <p class="text-gray-800 font-medium  text-4xl   text-center ">25 </p>
        </div>

  </div>

  <!-- Course Summary Placeholder -->
      
         <div   class="mt-5">
           <h3  class="text-2xl text-center font-bold  mb-3  text-gray-700" >Courses Overview  </h3>

            
        
              <div  class="bg-white  shadow rounded  overflow-x-auto">

              <table   class="  min-w-full  leading-normal" >
                   <thead>
                       <tr>

             <th class=" px-5 py-3  text-gray-700  border-b-2   font-medium text-left">  Course   </th>

                         <th class="  px-5  py-3  border-b-2   text-gray-700 font-medium text-left">  Enrolled </th>

                        <th   class="px-5  py-3 border-b-2  text-gray-700 font-medium  text-left">Progress </th>
            
               </tr>
           </thead>
            
                <tbody>
                  <tr >

                   <td   class="text-sm text-gray-700  border-b  px-5 py-4  bg-white"  >Mastering  Python  </td>

                       <td class=" text-sm  text-gray-700 border-b  px-5 py-4 bg-white">   187    </td>

                          <td class=" text-sm  text-gray-700 border-b px-5  py-4 bg-white"   >    78%   </td>


                
                      </tr>
                 
                       <tr  >

                                  
             
               <td class="text-sm text-gray-700  border-b  px-5  py-4 bg-white" >React Native Crash Course    </td>
       
           <td class=" text-sm  text-gray-700  border-b  px-5  py-4 bg-white">   103   </td>


                   <td   class=" text-sm text-gray-700 border-b  px-5  py-4 bg-white">   67%   </td>
           

           </tr>


      </tbody>
            
            </table>
     
   </div>
        </div>



    
</div>
<?php include_once  __DIR__ . '/common/footer.php' ?>