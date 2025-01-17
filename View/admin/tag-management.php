<?php include_once __DIR__ . '/common/header.php'; ?>

    <div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow-lg p-6 w-3/4 md:w-1/2 lg:w-1/3">
            <span class="close text-gray-500 hover:text-gray-700 cursor-pointer text-2xl font-bold">&times;</span>
            <form action="/admin/tag/create" method="POST" id="tagForm">
                <div>
                    <input type="hidden" name="tag_id" value="">
                    <input type="hidden" name="csrf_token" value="">
                    <div class="mb-4" id="fields">
                        <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Tag Name:</label>
                        <input type="text" name="tags[0][nom]" id="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="tag Name">
                    </div>
                    <div class="flex justify-center space-x-3">
                        <button type="submit" class="bg-yellow-500 text-white hover:bg-yellow-600 transition rounded p-3">
                            Ajoute
                        </button>
                        <button type="button" onclick="addTagInput()" class="bg-yellow-500 text-white hover:bg-yellow-600 transition rounded p-3">
                            Add field
                        </button>
                        <button type="button" id="cancelModal" class="bg-red-500 text-white hover:bg-red-600 transition rounded p-3">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="ModalUpdate" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow-lg p-6 w-3/4 md:w-1/2 lg:w-1/3">
            <span class="closeUpdateModal text-gray-500 hover:text-gray-700 cursor-pointer text-2xl font-bold">&times;</span>
            <form action="/admin/tag/update" method="POST">
                <input type="hidden" id="tag_id" name="tag_id" value="">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="mb-4">
                    <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Tag Name:</label>
                    <input type="text" name="nom" id="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Tag Name" required>
                </div>
                <div class="flex justify-center space-x-3">
                    <button type="submit" class="bg-yellow-500 text-white hover:bg-yellow-600 transition rounded p-3">
                        Update
                    </button>
                    <button type="button" class="updateCancel bg-red-500 text-white hover:bg-red-600 transition rounded p-3">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>


   <div class="container mx-auto p-6 mt-10">
    <h1 class="text-3xl text-gray-800 font-bold text-center mb-8">Manage Tags</h1>
        <div class="mb-6 flex flex-col items-center sm:flex-row  sm:justify-center space-y-3 sm:space-y-0  sm:space-x-3 ">
         <button id="openModal"  class=" bg-purple-600 hover:bg-purple-700 text-white py-2 px-3 rounded transition font-medium  ">Create Tag</button>
    </div>

<div class="bg-white shadow  rounded  overflow-x-auto  ">

<table class="min-w-full   leading-normal "  >
 
     <thead>
  
          <tr>
              <th   class=" px-5 py-3    border-b-2  text-gray-700  font-medium  text-sm text-left ">   Tag ID   </th>
              <th  class="px-5 py-3    border-b-2    text-gray-700 font-medium   text-sm  text-left "   >Tag  Name   </th>
              <th class=" px-5  py-3  border-b-2 text-gray-700  font-medium text-sm    text-left"    >  Action  </th>
          </tr>

</thead>

      <tbody>
      <?php foreach ($data as $tag) : ?>

          <tr>
              <td    class=" text-gray-700 border-b  bg-white  text-sm  px-5   py-4 ">     <?= $tag->tag_id ?>    </td>
              <td  class="text-gray-700 border-b bg-white  text-sm px-5 py-4" > #<?= $tag->tag_nom ?> </td>
              <td class="  bg-white    px-5    py-4 border-b text-sm  "    >
                  <div data-id="<?= $tag->tag_id ?>" onclick="setModalID(this)"  class=" flex   space-x-3 ">
                      <button class="updateModal p-1    rounded     text-yellow-500 hover:text-yellow-600  transition   font-medium ">
                          <i class="fas fa-edit ">    </i>
                      </button>
                      <form action="/admin/tag/delete" method="POST">
                          <input id="delete" type="hidden" name="tag_id" class="   text-red-600   hover:text-red-700  transition    rounded   p-1" value="<?= $tag->tag_id ?>" >
                          <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                          <button type="submit" class="text-red-600 hover:text-red-700 transition rounded p-1">
                              <i class="fas fa-trash-alt"></i>
                          </button>
                      </form>
                  </div>
              </td>
          </tr>
      <?php endforeach ?>
        </tbody>


      </table>
 </div>
</div>
    <script>
        document.getElementById('tagForm').addEventListener('submit', function (e) {
            let stringRegex = /^[a-zA-Z0-9_ ]+$/;
            let nomElements = document.querySelectorAll('input[name^="tags"][name$="[nom]"]');
            let hasError = false;
            let title = "";
            let message = "";

            nomElements.forEach(function(nomElement) {
                let nom = nomElement.value;
                if (!nom || !stringRegex.test(nom)) {
                    hasError = true;
                    title = "Error in nom";
                    message = "nom field is empty or contains invalid characters";
                }
            });

            if (hasError) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: title,
                    text: message
                });
            }
        });
    </script>
    <script>
        document.getElementById('openModal').onclick = function() {
            document.getElementById('myModal').classList.remove('hidden');
        }

        document.getElementsByClassName('close')[0].onclick = function() {
            document.getElementById('myModal').classList.add('hidden');
        }

        document.getElementById('cancelModal').onclick = function() {
            document.getElementById('myModal').classList.add('hidden');
        }

        window.onclick = function(event) {
            if (event.target === document.getElementById('myModal')) {
                document.getElementById('myModal').classList.add('hidden');
            }
        }
    </script>
<script>

    function setModalID(btn) {
        let id = btn.getAttribute('data-id');

        document.getElementById('tag_id').value = id;
    }

    document.querySelectorAll('.updateModal').forEach((element) => {
        element.addEventListener('click' , function() {
            document.getElementById('ModalUpdate').classList.remove('hidden');
        })
    });

    document.querySelectorAll('.closeUpdateModal').forEach((element) => {
        element.addEventListener('click' , function() {
            document.getElementById('ModalUpdate').classList.add('hidden');
        })
    });

    document.querySelectorAll('.updateCancel').forEach((element) => {
        element.addEventListener('click' , function() {
            document.getElementById('ModalUpdate').classList.add('hidden');
        })
    });
</script>
<script>
    let index = 1;
    function addTagInput() {
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'tags[' + index + '][nom]';
        input.id = 'nom';
        input.className = 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-3';
        input.placeholder = 'tag Name';

        let fields =  document.getElementById('fields');
        fields.appendChild(input);

        index++;
    }
</script>
<?php include_once __DIR__ . '/common/footer.php'; ?>