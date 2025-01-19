<?php include_once __DIR__ . '/common/header.php' ?>
<div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <!-- Modal content -->
    <div class="bg-white rounded-lg shadow-lg p-6 w-3/4 md:w-1/2 lg:w-1/3">
        <span class="close text-gray-500 hover:text-gray-700 cursor-pointer text-2xl font-bold">&times;</span>
        <form action="/admin/category/update" method="POST" enctype="multipart/form-data">
            <div class="flex justify-center">
                <img id="categoryimg" src="" alt="embedded-image" height="450" width="450">
            </div>
            <input type="hidden" name="category_id" id="category_id" value="">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Category Name:</label>
                <input type="text" name="nom" id="modal_nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Category Name">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Category Image:</label>
                <input type="file" name="image" id="modal_image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex justify-center space-x-3">
                <button type="submit" class="bg-yellow-500 text-white hover:bg-yellow-600 transition rounded p-3">
                    Update
                </button>
                <button type="button" class="cancelModal bg-red-500 text-white hover:bg-red-600 transition rounded p-3">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
<div class="container mx-auto p-6 mt-10">
    <h1 class="text-3xl   text-gray-800 text-center   mb-8 font-bold "> Manage Category </h1>


    <div class="mb-4">




        <form id="categoryForm" action="/admin/category/create" method="POST" class="  flex flex-col  space-y-3 sm:space-y-0  items-center    sm:flex-row    sm:space-x-3 justify-center " enctype="multipart/form-data">
            <div class="relative sm:flex-1 ">
                <input type="text" name="nom" id="nom" class="pl-8  focus:outline-none   py-2  border w-full rounded " placeholder="New Category" required />
            </div>
            <div class="relative sm:flex-1 ">
                <input type="file" name="image" id="image" class="pl-8  focus:outline-none   py-2  border w-full rounded " placeholder=Image required />
            </div>
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

            <button type="submit" class="py-2   text-white    font-medium  px-3    rounded     bg-purple-600  hover:bg-purple-700  transition "> Create Category</button>
        </form>
    </div>

    <div class=" bg-white  shadow-md  rounded overflow-x-auto ">


        <table class="  min-w-full  leading-normal">

            <thead>

                <tr>

                    <th class=" text-sm   px-5  py-3    border-b-2    text-gray-700 font-medium   text-left">Category ID </th>

                    <th class="text-sm   px-5 py-3     border-b-2   text-gray-700 font-medium    text-left">Category name </th>
                    <th class=" text-sm  text-gray-700   border-b-2   px-5    py-3   font-medium   text-left"> Actions </th>
                </tr>

            </thead>

            <tbody>
                <?php foreach ($data as $category) : ?>
                    <tr data-id="<?= $category->categorie_id  ?>" data-img="<?= $category->categorie_img ?>" data-nom="<?= $category->categorie_nom ?>">
                        <td class="  text-sm   border-b   px-5  py-4  text-gray-700  bg-white  "><?= $category->categorie_id  ?> </td>
                        <td class="  text-sm   px-5  py-4 text-gray-700  border-b bg-white  "> <?= $category->categorie_nom ?> </td>
                        <td class="bg-white  px-5 py-4    border-b   text-sm">
                            <button onclick="setModalData(this)" class="openModal text-yellow-500   font-medium hover:text-yellow-600  transition  rounded    p-1">
                                <i class="fas fa-edit"> </i>
                            </button>
                            <form action="/admin/category/delete" method="POST">
                                <input id="delete" type="hidden" name="category_id" class="   text-red-600   hover:text-red-700  transition    rounded   p-1" value="<?= $category->categorie_id ?>">
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                <button type="submit" class="text-red-600 hover:text-red-700 transition rounded p-1">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>

    </div>
    </td>
    </tr>
<?php endforeach; ?>


</tbody>
</table>
</div>
</div>
<script>
    document.getElementById('categoryForm').addEventListener('submit', function(e) {
        let nom = document.getElementById('nom').value;
        let image = document.getElementById('image').files.length;

        let title = "";
        let message = "";

        let hasError = false;

        if (!nom) {
            hasError = true;
            title = "Error in nom";
            message = "nom field is empty";
        }

        if (image === 0) {
            hasError = true;
            title = "Error image";
            message = "No image Uploaded";
        }

        if (hasError) {
            e.preventDefault();
            console.log("the Image: ", image);
            console.log("the nom: ", nom);
            Swal.fire({
                icon: 'error',
                title: title,
                text: message
            })
        }
    });
</script>
<script>
    function setModalData(btn) {
        let parent = btn.closest('tr');
        let id = parent.getAttribute('data-id');
        let nom = parent.getAttribute('data-nom');
        let img = parent.getAttribute('data-img');

        img = '../' + img;
        document.getElementById('category_id').value = id;
        document.getElementById('nom').value = nom;
        document.getElementById('categoryimg').setAttribute('src', img);
    }

    document.querySelectorAll('.openModal').forEach((element) => {
        element.addEventListener('click', () => {
            document.getElementById('myModal').classList.remove('hidden');
        })
    });

    document.querySelectorAll('.close').forEach((element) => {
        element.addEventListener('click', () => {
            document.getElementById('myModal').classList.add('hidden');
        });
    });

    document.querySelectorAll('.cancelModal').forEach((element) => {
        element.addEventListener('click', () => {
            document.getElementById('myModal').classList.add('hidden');
        });
    });

    window.onclick = function(event) {
        if (event.target === document.getElementById('myModal')) {
            document.getElementById('myModal').classList.add('hidden');
        }
    }
</script>
<?php include_once __DIR__ . '/common/footer.php' ?>