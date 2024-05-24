<div class="flex flex-1 flex-col  justify-center space-y-5 max-w-md mx-auto mt-24">
    <div class="flex flex-col space-y-2 text-center">
        <h2 class="text-3xl md:text-4xl font-bold">Confirm OTP</h2>
        <p class="text-md md:text-xl">
            Please check your email...</br>
            Enter the OTP we just sent you
            
        </p>
    </div>
    <div class="flex flex-col max-w-md space-y-5">
        <input id="otp" type="text" placeholder="enter 6 digit otp"
              class="flex px-3 py-2 md:px-4 md:py-3 border-2 border-black rounded-lg font-medium placeholder:font-normal" />
        <button onclick="VerifyOtp()" class="flex items-center justify-center flex-none px-3 py-2 md:px-4 md:py-3 border-2 rounded-lg font-medium border-black bg-black text-white">
            Confirm
        </button>
        <a href="{{url('/sendOtp')}}">&#8592; Resend OTP</a>
    </div>
</div>


<script>
    async function VerifyOtp() {
         let otp = document.getElementById('otp').value;
         if(otp.length !==6){
            errorToast('Invalid OTP')
         }
         else{
            //  showLoader();
             let res=await axios.post('/verify-otp', {
                 otp: otp,
                 email:sessionStorage.getItem('email')
             })
            //  hideLoader();
 
             if(res.status===200 && res.data['status']==='success'){
                 successToast(res.data['message'])
                 sessionStorage.clear();
                 setTimeout(() => {
                     window.location.href='/resetPassword'
                 }, 1000);
             }
             else{
                 errorToast(res.data['message'])
             }
         }
     }
 </script>