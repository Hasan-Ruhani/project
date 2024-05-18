

<div
    class="relative mx-auto mt-20 w-full max-w-md bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl sm:px-10">
    <div class="w-full">
        <div class="text-center">
            <h1 class="text-3xl font-semibold text-gray-900">Remember it!!</h1>
            <p class="mt-2 text-gray-500">Reset you password bellow</p>
        </div>
        <div class="mt-5">
                <div class="relative mt-6">
                    <input type="text" name="password" id="password" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
                    <label for="password" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">New Password</label>
                </div>
                <div class="relative mt-6">
                    <input type="text" name="confirm_password" id="confirm_password" class="peer peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" />
                    <label for="confirm_password" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Confirm Password</label>
                </div>
                <div class="my-6">
                    <button onclick="ResetPass()" type="submit" class="w-full rounded-md bg-black px-3 py-3 text-white focus:bg-gray-600 focus:outline-none">Reset</button>
                </div>
                <p class="text-center text-sm text-gray-500">Login with password?
                    <a href="{{'/userLogin'}}"
                        class="font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">Sign
                        in
                    </a>.
                </p>
        </div>
    </div>
</div>


<script>
    async function ResetPass() {
          let password = document.getElementById('password').value;
          let confirm_password = document.getElementById('confirm_password').value;
  
          if(password.length===0){
              errorToast('New Password is required')
          }
          else if(confirm_password.length===0){
              errorToast('Confirm Password is required')
          }
          else if(password!==confirm_password){
              errorToast('Password & Confirm Password must be same')
          }
          else{
            // showLoader()
            let res=await axios.post("/reset-password",{password:password, confirm_password:confirm_password});
            // hideLoader();
            if(res.status===200 && res.data['status']==='success'){
                successToast(res.data['message']);
                setTimeout(function () {
                    window.location.href="/userLogin";
                },1000);
            }
            else{
              errorToast(res.data['message'])
            }
          }
  
      }
  </script>