<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Sign Up</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <label>Full Name</label>
                                <input id="name" placeholder="Full Name" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input id="email" placeholder="User Email" class="form-control" type="email"/>
                            </div>
                            
                            <div class="col-md-4 p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control" type="password"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Confirm Password</label>
                                <input id="cfmPassword" placeholder="Confirm Password" class="form-control" type="password"/>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onRegistration()" class="btn mt-3 w-100  btn-primary">Registration</button>
                            </div>
                            <a href="{{url('/userLogin')}}"><p>Already have an account?</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>


async function onRegistration() {
    try {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let confirm_password = document.getElementById('cfmPassword').value;

        if (email.length === 0) {
            errorToast('Email is required');
        } else if (name.length === 0) {
            errorToast('Name is required');
        } else if (password.length === 0) {
            errorToast('Password is required');
        } else if (confirm_password.length === 0) {
            errorToast('Confirm Password is required');
        } else if (password !== confirm_password) {
            errorToast('Confirm Password does not match');
        } else {
            showLoader();
            let res = await axios.post("/user-registration", {
                name: name,
                email: email,
                password: password,
                confirm_password: confirm_password
            });
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(function () {
                    window.location.href = '/userLogin';
                }, 2000);
            } else {
                errorToast(res.data['message'] || 'Something went wrong');
            }
        }
    } catch (error) {
        errorToast('An error occurred: ' + error.message);
    }
}

</script>
