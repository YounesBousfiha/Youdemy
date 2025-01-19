<?php include_once __DIR__ . '/common/header.php' ?>


<div class="container mx-auto p-6 mt-10">

    <div class="max-w-3xl mx-auto  bg-white  rounded  p-6  shadow-md ">

        <h1 class="text-3xl text-center font-bold text-gray-800  mb-5 "> Add New Course </h1>
        <form action="/teacher/course/create" method="post" enctype="multipart/form-data">
            <!-- Input 1 Course Title -->
            <div class="mb-4">
                <label for="title" class="text-gray-700 mb-1  block  font-medium  ">Course Title </label>
                <input type="text" id="title" name="title" class="border border-gray-400 focus:border-purple-600  focus:outline-none rounded p-2 w-full" />
            </div>
            <!-- Input 2 Category Selector-->
            <div class="mb-4">
                <label for="category" class="text-gray-700 block  font-medium  mb-2">Category </label>
                <select id="category" name="category_id" class="border rounded py-2  focus:border-purple-600 text-gray-500 cursor-pointer  appearance-none   w-full   focus:outline-none px-4 pr-8">
                    <option selected disabled> Select Category </option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category->categorie_id ?>"><?= $category->categorie_nom ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="mb-4">
                    <label for="tags" class="text-gray-700 block font-medium mb-2">Tags</label>
                    <div class="flex flex-wrap max-h-40 overflow-y-auto border rounded p-2">
                        <?php foreach ($tags as $tag) : ?>
                            <div class="mr-4 mb-2">
                                <input type="checkbox" id="tag_<?= $tag->tag_id ?>" name="tags[]" value="<?= $tag->tag_id ?>" class="mr-2">
                                <label for="tag_<?= $tag->tag_id ?>" class="text-gray-700"><?= $tag->tag_nom ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="mb-4" id="selectContainer">
                    <label for="courseType" class="text-gray-700 block font-medium mb-2">Course Type</label>
                    <select id="courseType" name="type" class="border rounded py-2 focus:border-purple-600 text-gray-500 cursor-pointer appearance-none w-full focus:outline-none px-4 pr-8">
                        <option selected disabled>Select Type</option>
                        <option value="1">Video</option>
                        <option value="2">Text</option>
                    </select>
                </div>



            </div>

            <!--   Upload Thumbnail -->
            <div class="mb-4">
                <label class="block  text-gray-700 mb-1   font-medium  ">Course Thumbnail</label>
                <input type="file" name="image"  class=" w-full rounded  p-2  focus:outline-none border border-gray-400    focus:border-purple-600" />
            </div>

            <!-- input 4 Desctiption TextArea  -->
            <div class="mb-4">
                <label for="courseDescription" class="text-gray-700 block font-medium mb-1"> Description </label>
                <textarea id="courseDescription" name="description" class="w-full p-2 rounded border  border-gray-400  focus:border-purple-600 focus:outline-none" rows="6"></textarea>
            </div>


            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <div class="mt-7   text-center ">
                <button class=" bg-purple-600   text-white rounded py-2  px-4  font-medium  hover:bg-purple-700 transition"> Create Course </button>
            </div>


        </form>


    </div>

</div>
<script>
    let simplemde;

    document.getElementById('courseType').addEventListener('change', function (e) {
        let courseType = e.target.value;
        let courseDescription = document.getElementById('courseDescription');
        if (courseType === 1) {
            if (document.getElementById('videoUrl')) {
                return;
            }

            if (simplemde) {
                simplemde.toTextArea();
                simplemde = null;
                document.getElementById('myMarkdown').remove();
            }

            courseDescription.insertAdjacentHTML('afterend', `
            <div class="mb-4" id="videoUrl">
                <label for="videoUrl" class="text-gray-700 block font-medium mb-1">Video URL</label>
                <input type="text" name="course_content" class="border border-gray-400 focus:border-purple-600 focus:outline-none rounded p-2 w-full" />
            </div>
        `);

        } else {
            if (document.getElementById('myMarkdown')) {
                return;
            }

            if (document.getElementById('videoUrl')) {
                document.getElementById('videoUrl').remove();
            }

            courseDescription.insertAdjacentHTML('afterend', `
           <textarea id="myMarkdown" name="course_content"></textarea>
        `);
            simplemde = new SimpleMDE({ element: document.getElementById("myMarkdown") });
        }
    });
</script>
<?php include_once  __DIR__ . '/common/footer.php' ?>