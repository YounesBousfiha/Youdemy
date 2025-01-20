<?php include_once  __DIR__ . '/common/header.php'?>

  <div class="container mx-auto p-6 mt-10">
      <div class=" bg-white  rounded shadow-lg">
        <div class="  flex  sm:flex-row flex-col ">
         
            <img src="../<?= $courseDATA[0]->course_miniature ?>"
                alt="Course Thumbnail"  class="w-full sm:w-1/3   h-auto  object-cover"  >

          <div  class="sm:w-2/3 px-4 py-3  sm:ml-5 "  >

                <h1 class="text-3xl font-bold mb-2"><?= $courseDATA[0]->course_nom ?> </h1>
                   <!-- tag section-->
                 <div  class="mb-4 flex flex-wrap gap-2 " >
                <?php foreach($courseDATA as $tag) : ?>
                    <span class="text-gray-600 bg-gray-200 rounded p-1 text-sm"   > #<?= $tag->tag_nom ?></span>
                     <?php endforeach; ?>
                      
                </div>
                <div class="mt-6 flex flex-wrap justify-between items-center " >
                     <p   class="text-gray-700  text-base">Category <span class="font-semibold"><?= $courseDATA[0]->categorie_nom ?></span>  </p>
                    <?php if($_SESSION['user_id'] !== $enrollments->fk_user_id) : ?>
                        <form action="/student/enroll" method="POST">
                            <input type="hidden" value="<?= $courseDATA[0]->course_id ?>"  name="course_id" >
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                            <button  class="bg-purple-600 hover:bg-purple-700   font-medium text-white px-4  py-2  rounded">Enroll now  </button>
                        </form>
                    <?php else :  ?>
                    <div class="flex space-x-8">
                        <button  class="bg-purple-600 hover:bg-purple-700   font-medium text-white px-4  py-2  rounded">
                            <a href="/course/content/<?= $courseDATA[0]->course_id ?>"  >Continue</a>
                        </button>
                        <form action="/student/deroll" method="POST">
                            <input type="hidden" name="enrollment_id" value="<?= $enrollments->enrollment_id ?>">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                            <button id="deroll" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                De-roll
                            </button>
                        </form>
                    </div>
                    <?php endif; ?>
            </div>
             
          </div>

       </div>
             <div  class="my-10 border-t-2 p-4 mt-4 "  >
                      <h2 class="text-2xl font-semibold mb-2 text-gray-700">  About the Course </h2>

                          <p  class="text-gray-700 leading-relaxed text-justify" > <?= $courseDATA[0]->course_desc ?></p>
               </div>
       <div  class="border-t-2 mt-4 p-4  ">

          <h2 class="text-2xl  font-semibold mb-2  text-gray-700  "   >Content Outline  </h2>
           
            <ul class=" mt-4 ml-5 space-y-2 list-decimal ">
               
                  <li class=" text-gray-700 leading-relaxed"  >
                        Introduction to Python :
                      </li>
                    <li class="text-gray-700 leading-relaxed"  >
                           Basic data Structures

                    </li>

                
                 <li class="text-gray-700 leading-relaxed"  >
                      Working  with data Structures 

                </li>
           <li  class="text-gray-700  leading-relaxed"   >
            Creating Web Server with flask.

            </li>
            </ul>


         </div>
        <div class=" mt-4   p-4  border-t-2  ">
              <h2 class="text-2xl font-semibold  mb-4  text-gray-700"  > Teacher Information</h2>

              <div  class="flex gap-5 items-center" >

                    <img class="w-24 rounded-full  h-24  object-cover  shadow-sm"  src="https://ui-avatars.com/api/?name=John+Doe" alt="profile image"  />
                
                     <div class=" ">
                      <h4  class="text-gray-800 text-xl font-medium" > <?= $courseDATA[0]->nom . ' ' . $courseDATA[0]->prenom ?></h4>
                      <p class="text-gray-600"   >Full Stack Enginieer</p>
                </div>
              
            </div>


        </div>
      
       </div>
    
  </div>
<?php include_once  __DIR__ . '/common/footer.php'?>
