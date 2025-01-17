<?php include_once  __DIR__ . '/common/header.php'; ?>
    <div class="container mx-auto p-6 mt-10">
        <div class="bg-white rounded shadow p-8 max-w-xl mx-auto">
             <div  class="text-center mb-4">
                 <h2 class="text-2xl font-semibold text-gray-800  "> Log In  </h2>
              </div>
                <form action="" method="post" id="loginForm">

               
              <!--Email Input -->
                  <div class="mb-4" >
                <label for="email"  class="text-gray-700 block  mb-2">  Email Address   </label>
                       <input type="email"  id="email" name="email" class="border w-full py-2 rounded  focus:border-purple-600 focus:outline-none" />
                 </div>


                 <!-- Password Input -->
                 <div  class="mb-4"  >
                
                      <label   for="password"   class="text-gray-700   mb-2 block "  >  Password    </label>

                         <input type="password" id="password"   name="password"   class="border w-full  py-2  rounded  focus:border-purple-600 focus:outline-none " />
                 </div>
                    <input type="hidden" name="csrf_token" value="">

                <!-- Login button and reset   -->

                    <div class="mt-6   text-center  " >
                           <button  class="bg-purple-600  hover:bg-purple-700 font-medium  px-5   py-2 rounded  text-white transition " >Log In  </button>

                         </div>
           <!-- Have Account  SignUp Here  -->
                
           <div  class=" mt-5  text-center"  >

             <p   class=" text-gray-700">
                   Don't  have an account? <a href="/signup" class=" text-purple-600   font-medium   hover:text-purple-700"  > Create  one </a>
            </p>
         
       
        </div>
               </form>

         </div>

</div>
<script>
    document.getElementById('loginForm').addEventListener('submit', function (e) {
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let hasError = false;

        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        let title = "";
        let message = "";

        if(!email || !emailRegex.test(email)) {
            hasError = true;
            title = "Email Error";
            message = "Empty or Invalid Email Format";
        }

        if(!password) {
            hasError = true;
            title = "Password Error";
            message = "Password is Empty";
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
<?php include_once  __DIR__ . '/common/footer.php'; ?>