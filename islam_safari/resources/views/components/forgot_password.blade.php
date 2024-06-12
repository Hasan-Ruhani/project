<main id="content" role="main" class="w-full  max-w-md mx-auto p-6">
    <div class="mt-7 bg-white  rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 border-2 border-indigo-300">
      <div class="p-4 sm:p-7">
        <div class="text-center">
          <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Forgot password?</h1>
          <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Remember your password?
            <a class="text-blue-600 decoration-2 hover:underline font-medium" href="{{'/userLogin'}}">
              Login here
            </a>
          </p>
        </div>

        <div class="mt-5">
            <div class="grid gap-y-4">
              <div>
                <label for="email" class="block text-sm font-bold ml-1 mb-2 dark:text-white">Email address</label>
                <div class="relative">
                  <input class="form-control" type="email" id="email" name="email" placeholder="Enter valid email address" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" required aria-describedby="email-error">
                </div>
                <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p>
              </div>
              <button onclick="VerifyEmail()" type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Send Email</button>
            </div>
        </div>
      </div>
    </div>
  </main>

 <script>
  
  async function VerifyEmail() {
    let email = document.getElementById('email').value;
    let button = document.querySelector('button');

    if (email.length === 0) {
      errorToast('Please enter your email address');
    } else {
      button.disabled = true; // Disable the button
      let secondsLeft = 59;
      button.innerText = `Sending... (${secondsLeft}s)`;
      let timerInterval = setInterval(function() {
        secondsLeft--;
        if (secondsLeft <= 0) {
          clearInterval(timerInterval);
          button.innerText = 'Send Email';
          button.disabled = false; // Re-enable the button after 1 minute
        } else {
          button.innerText = `Resend... (${secondsLeft}s)`;
        }
      }, 1000);

      let res = await axios.post('/send-otp', { email: email });
      clearInterval(timerInterval); // Clear the timer

      if (res.status === 200 && res.data.status === 'success') {
        successToast(res.data.message);
        sessionStorage.setItem('email', email);
        setTimeout(function () {
          window.location.href = '/verifyOtp';
        }, 1000); // Redirect after 1 second
      } else {
        button.innerText = 'Send Email';
        button.disabled = false; // Re-enable the button if there's an error
        errorToast(res.data.message || 'Error sending email');
      }
    }
  }
</script>
