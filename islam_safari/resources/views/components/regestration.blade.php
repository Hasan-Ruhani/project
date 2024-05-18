<div class="min-h-screen bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Registration Form
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600 max-w">
            all ready have an account?
            <a href="{{'/userLogin'}}" class="font-medium text-blue-600 hover:text-blue-500">
                Login
            </a>
        </p>
    </div>

    <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <div class="text-center">
            <h2>Islam Safari</h2>
            </div>
            <div class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Full Name
                    </label>
                    <div class="mt-1">
                        <input id="name" name="name" type="name" autocomplete="name" required
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="full name">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="email address">
                    </div>
                </div>

                <div>
                    <label for="number" class="block text-sm font-medium text-gray-700">
                        Phone Number
                    </label>
                    <div class="mt-1">
                        <input id="number" name="number" type="text" autocomplete="number" required
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="phone number">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="text" autocomplete="current-password" required
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="password">
                    </div>
                </div>

                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700">
                        Confirm Password
                    </label>
                    <div class="mt-1">
                        <input id="cfmPassword" name="password" type="text" autocomplete="password" required
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Confirm password">
                    </div>
                </div>

                <div>
                    <button onclick="onRegistration()" type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign up
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>


    async function onRegistration() {
  
          let name = document.getElementById('name').value;
          let email = document.getElementById('email').value;
          let password = document.getElementById('password').value;
          let confirm_password = document.getElementById('cfmPassword').value;
  
          if(name.length===0){
              errorToast('Name is required')
          }
          else if(email.length===0){
              errorToast('Email is required')
          }
          else if(password.length===0){
              errorToast('Password is required')
          }
          else if(confirm_password.length===0){
              errorToast('Confirm Password is required')
          }
          else if(password !== confirm_password){
              errorToast('Confirm Password does not match');
          }
          else{
            //   showLoader();
              let res=await axios.post("/user-registration",{
                  name:name,
                  email:email,
                  password:password,
                  confirm_password:confirm_password
              })
            //   hideLoader();
              if(res.status===200 && res.data['status']==='success'){
                  successToast(res.data['message']);
                  setTimeout(function (){
                      window.location.href='/userLogin'
                  },2000)
              }
              else{
                errorToast(res.data['message']);
              }
          }
      }
  </script>