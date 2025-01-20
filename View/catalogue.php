<?php include_once __DIR__ . '/common/header.php'; ?>
<div class="container mx-auto p-6 mt-10">
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">Course Catalog</h1>
        <!-- Filters Section (Placeholder) -->
        <div class="mb-6 flex flex-col  sm:flex-row  justify-between items-center gap-3">
          <div class="relative sm:flex-1" >
               <i class="fas fa-search absolute left-2.5  top-2.5  text-gray-500"  ></i>
              <form action="/search" method="POST">
                  <div class="flex">
                      <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                      <input type="text" name="search" class="pl-8 border rounded w-full py-2" placeholder="Search Course"/>
                      <button class="mx-2 bg-purple-600 hover:bg-purple-700  rounded text-white py-2 px-4 transition  ">Search </button>
                  </div>
              </form>
          </div>
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
                           <a href="/categorie/<?= $data->categorie_id ?>" class="text-purple-600 font-medium transition hover:text-purple-800 "   >
                              Learn more <i class="fas fa-arrow-right text-sm ml-1" ></i> 
                          </a>
                   
                   
                     </div>
             </div>
            <?php endforeach; ?>


        </div>
       
         <!-- Pagination Placeholder  -->
        <div class="flex justify-center my-8">
            <?php if ($page > 1): ?>
                <a href="/catalogue?page=<?= $page - 1 ?>" class="text-gray-500 font-semibold border hover:bg-gray-200 hover:text-purple-600 py-1 px-2 rounded m-1">
                    <i class="fas fa-arrow-left"></i> Prev
                </a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="/catalogue?page=<?= $i ?>" class="text-gray-500 font-semibold border hover:bg-gray-200 hover:text-purple-600 py-1 px-2 rounded m-1 <?= $i == $page ? 'bg-purple-600 text-white' : '' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
            <?php if ($page < $totalPages): ?>
                <a href="/catalogue?page=<?= $page + 1 ?>" class="text-gray-500 font-semibold border hover:bg-gray-200 hover:text-purple-600 py-1 px-2 rounded m-1">
                    Next <i class="fas fa-arrow-right"></i>
                </a>
            <?php endif; ?>
        </div>
<?php include_once __DIR__ . '/common/footer.php'; ?>