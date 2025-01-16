<?php include_once __DIR__ . '/common/header.php'; ?>
<div class="container mx-auto p-6 mt-10">
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Course Catalog</h1>
        <!-- Filters Section (Placeholder) -->
        <div class="mb-6 flex flex-col  sm:flex-row  justify-between items-center gap-3">
          <div class="relative sm:flex-1" >
               <i class="fas fa-search absolute left-2.5  top-2.5  text-gray-500"  ></i>
                  <input type="text" class="pl-8 border rounded w-full py-2" placeholder="Search Course"/>
          </div>

          <div  class="relative sm:flex-1">
                 <label for="categories" class="sr-only">Category filter</label>
                <select
                         class="border rounded w-full py-2  text-gray-500  cursor-pointer appearance-none
                        focus:outline-none   px-4 pr-8">

                     <option value="" disabled selected>All Categories</option>
                        <?php foreach ($categoriesDATA as $categorie) : ?>
                        <option value="<?= $categorie->categorie_id ?>"><?= $categorie->categorie_nom ?></option>
                        <?php endforeach; ?>
                </select>
                <div class=" pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                     <i class="fas fa-chevron-down" ></i>
                </div>
           </div>
         
                <button class=" bg-purple-600 hover:bg-purple-700  rounded text-white py-2 px-4 transition  ">Sort </button>

           </div>


        <!-- Afficher mes catalogue avec leur miniature -->
        <!-- Courses List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
             
             <!-- course Card 1-->
            <?php foreach ($categoriesDATA as $data) : ?>
               <div class="bg-white shadow-md rounded overflow-hidden  transition hover:scale-105">
               <img  src="<?= $data->categorie_img ?>"  alt="Course 1" class="h-40 w-full object-cover"  />
                    <div  class="p-4"  >
                        <h3  class="text-lg font-bold mb-2"> <?= $data->categorie_nom ?></h3>
                         <p  class="text-gray-700 mb-2">Lorem  Ipsum Dummy description of course details for the catalog.</p>
                           <a href="/categorie?id=<?= htmlspecialchars($data->categorie_id) ?>" class="text-purple-600 font-medium transition hover:text-purple-800 "   >
                              Learn more <i class="fas fa-arrow-right text-sm ml-1" ></i> 
                          </a>
                   
                   
                     </div>
             </div>
            <?php endforeach; ?>


        </div>
       
         <!-- Pagination Placeholder  -->
    <div class="flex justify-center my-8 ">
    <button  class="text-gray-500  font-semibold border  hover:bg-gray-200 hover:text-purple-600 py-1 px-2 rounded m-1">  <i class="fas fa-arrow-left" ></i> Prev</button>
      <button class="text-gray-500  font-semibold border  hover:bg-gray-200  hover:text-purple-600 py-1 px-2 rounded m-1 ">1</button>
      <button  class="bg-purple-600 font-semibold text-white  border border-gray-600  hover:bg-purple-700  py-1 px-2 rounded m-1">2</button>
       <button  class="text-gray-500 font-semibold border hover:bg-gray-200 hover:text-purple-600 py-1 px-2 rounded m-1 ">3</button>
    
       <button class="text-gray-500  font-semibold  border  hover:bg-gray-200  hover:text-purple-600  py-1 px-2 rounded m-1"><i class="fas fa-arrow-right" ></i>Next </button>

     </div>
      
    </div>
<?php include_once __DIR__ . '/common/footer.php'; ?>