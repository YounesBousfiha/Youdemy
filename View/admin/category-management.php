<?php include_once __DIR__ . '/common/header.php' ?>
 <div class="container mx-auto p-6 mt-10">
 <h1   class="text-3xl   text-gray-800 text-center   mb-8 font-bold "  > Manage  Category  </h1>


      <div  class="mb-4"  >
             
        
        
            
            <form id="categoryForm"  action=""   method="POST" class="  flex flex-col  space-y-3 sm:space-y-0  items-center    sm:flex-row    sm:space-x-3 justify-center " enctype="multipart/form-data" >
             <div   class="relative sm:flex-1 "  >
               <input type="text" name="nom" id="nom"   class="pl-8  focus:outline-none   py-2  border w-full rounded "   placeholder="New Category"   />
             </div>
                <div   class="relative sm:flex-1 "  >
                    <input type="file" name="image" id="image"   class="pl-8  focus:outline-none   py-2  border w-full rounded "   placeholder=Image   />
                </div>
   
             <button type="submit"  class="py-2   text-white    font-medium  px-3    rounded     bg-purple-600  hover:bg-purple-700  transition "  > Create Category</button>
       </form>
      </div>

 <div  class=" bg-white  shadow-md  rounded overflow-x-auto ">


      <table   class="  min-w-full  leading-normal" >
           
             <thead>

         <tr>

<th  class=" text-sm   px-5  py-3    border-b-2    text-gray-700 font-medium   text-left"    >Category ID    </th>

     <th    class="text-sm   px-5 py-3     border-b-2   text-gray-700 font-medium    text-left">Category  name    </th>
  <th    class=" text-sm  text-gray-700   border-b-2   px-5    py-3   font-medium   text-left"   >  Actions </th>
     </tr>
     
      </thead>

      <tbody>

  <tr>
        
          <td   class="  text-sm   border-b   px-5  py-4  text-gray-700  bg-white  "   >2122    </td>

     
<td   class="  text-sm   px-5  py-4 text-gray-700  border-b bg-white  "   >   Web development   </td>
            

          
    <td class="bg-white  px-5 py-4    border-b   text-sm   "   >  <div class="flex   space-x-2"  >
           <button class="text-yellow-500   font-medium hover:text-yellow-600  transition  rounded    p-1"   > <i class="fas fa-edit"  > </i> </button>
  
       
            <button    class="   text-red-600   hover:text-red-700  transition    rounded   p-1"   > <i  class="fas fa-trash-alt"  ></i></button>

    
     </div>
      
        </td>
      </tr>
   
        <tr >

    <td   class="  text-sm   px-5  py-4 text-gray-700    bg-white border-b  ">   3122  </td>
     
   <td   class="  text-sm  px-5 py-4 text-gray-700    bg-white border-b"    >    Mobile App Development    </td>

   
          <td   class="  px-5 py-4   border-b bg-white  text-sm  "    > <div class="flex  space-x-2">
         <button class=" text-yellow-500 font-medium    hover:text-yellow-600 rounded transition p-1">   <i  class="fas  fa-edit"  > </i>   </button>
 

    <button  class="  text-red-600    hover:text-red-700     p-1 transition  rounded  ">  <i  class="fas fa-trash-alt" > </i> </button>

   </div>


     </td>

  </tr>

  
      </tbody>
    </table>
 </div>
</div>
<script>
    document.getElementById('categoryForm').addEventListener('submit', function (e) {
        let nom = document.getElementById('nom').value;
        let image = document.getElementById('image').value;

        let title = "";
        let message = "";

        let hasError = false;

        if(!nom) {
            hasError = true;
            title = "Error in nom";
            message = "nom field is empty";
        }

        if(!image) {
            hasError = true;
            title = "Error image";
            message = "No image Uploaded";
        }

        if(hasError) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: title,
                text: message
            })
        }
    });
</script>
<?php include_once __DIR__ . '/common/footer.php'?>