<?php include_once __DIR__ . '/common/header.php'; ?>
    <div class="container mx-auto p-6 mt-10">
        <div class="bg-white rounded shadow p-8  max-w-xl mx-auto">
          
           <div  class="text-center mb-4 ">  <h2 class="text-2xl font-semibold text-gray-800  ">Create An Account</h2>  </div>
            <form  action="" method="post" id="registerForm">

                  <!-- nom et prenom -->
                  <div class="mb-4"  >
                   <label for="name" class="text-gray-700  block  mb-2  "> Nom </label>
                   <input type="text"   id="nom"   name="nom" class="border w-full py-2 rounded  focus:border-purple-600 focus:outline-none"/>
                    </div>
                    <div class="mb-4"  >
                        <label for="name" class="text-gray-700  block  mb-2  "> Prenom </label>
                        <input type="text"   id="prenom"   name="prenom" class="border w-full py-2 rounded  focus:border-purple-600 focus:outline-none"/>
                    </div>
               
                    <!--Email Input -->
                <div class="mb-4"  >
                <label for="email"  class="text-gray-700  block  mb-2 ">  Email Address  </label>
                     <input type="email"   id="email"  name="email" class="border w-full py-2 rounded focus:border-purple-600 focus:outline-none"/>
                </div>

                  <!--Password Input -->
                  <div  class="mb-4">
                       <label for="password"   class="text-gray-700 block mb-2">Password </label>
                        <input type="password"   id="password" name="password"   class="border w-full py-2 rounded  focus:border-purple-600  focus:outline-none"/>
                  </div>
                <div  class="mb-4">
                    <label for="password2"   class="text-gray-700 block mb-2">Password Confirmation </label>
                    <input type="password"   id="password2" name="password2"   class="border w-full py-2 rounded  focus:border-purple-600  focus:outline-none"/>
                </div>
                
               
              <div class="mb-4">
                    <label class="text-gray-700 block mb-2" >   Role </label>

                        <select name="role_id"   class="border rounded  py-2 text-gray-500 cursor-pointer  appearance-none  focus:border-purple-600 w-full focus:outline-none    pr-8 pl-4"  >
                              <option  selected disabled> Select  A Role  </option>
                                <option value="2"> Teacher </option>
                                  <option value="3">Student</option>

                         </select>
              </div>

                  <!--  Terms-->
              <div class="mb-4" >

                <label for="agreeTerms" class="inline-flex items-center cursor-pointer  "  >
                 <input type="checkbox" id="agreeTerms" name="agreeTerms"  class="rounded  border-gray-300 focus:ring-2  focus:ring-purple-200"/>
                 <span  class="ml-2  text-gray-700">  I agree to the <a href=""  class="text-purple-600 hover:text-purple-700 font-medium"  > terms and condition </a>  </span>
                
                </label>
                  
                
                  </div>
                <!-- Form Button Submit-->
                  <div  class="mt-5 text-center" >

                    <button class="  bg-purple-600  hover:bg-purple-700  rounded  font-medium py-2 px-5 text-white transition ">Create Account  </button>
                 
               </div>
                <!-- Have Account Login Here  -->
            <div  class="mt-5 text-center"  >

                 <p class="text-gray-700">
                     Alread have an Account? <a href="/login" class="font-medium  text-purple-600 hover:text-purple-700" >  Login Here </a>
                   </p>
            
             </div>
            </form>
       </div>
    </div>
<script>
    document.getElementById('registerForm').addEventListener('submit', function (event) {
        let stringRegex = /^[a-zA-Z\s]+$/;
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        let hasError = false;
        let email = document.getElementById('email').value;
        let nom = document.getElementById('nom').value;
        let prenom = document.getElementById('prenom').value;
        let password = document.getElementById('password').value;
        let password2 = document.getElementById('password2').value;


        let title = "";
        let message = "";

        if(!nom || !prenom || !stringRegex.test(nom) || !stringRegex.test(prenom)) {
            hasError = true;
            title = "Nom/prenom Error";
            message = "Nom or prenom empty or invalid";
        }

        if(!email || !emailRegex.test(email)) {
            hasError = true;
            title = "Email Error";
            message = "Email is Empty or Invalid";
        }

        if(!password || !password2) {
            hasError = true;
            title = "Error Password";
            message = "Password fields are empty";
        }

        if(password !== password2) {
            hasError = true;
            title = "Error Password";
            message = "Password mismatch";
        }

        if(hasError) {
            event.preventDefault();
            Swal.fire({
                icon: "error",
                title: title,
                text: message
            })
        }
    });
</script>
<?php include_once __DIR__ . '/common/footer.php'; ?>