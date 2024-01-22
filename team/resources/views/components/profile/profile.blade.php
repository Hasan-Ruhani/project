<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">

                <div class="row m-0 p-0">
                    <div class="col-md-4 p-2">
                        <a href="{{url('/')}}"><button class="btn mt-3 w-40  btn-primary">Home</button></a>
                    </div>
                </div>

                <div class="card-body">
                    <h4>Profile Information</h4>
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
                                <label>Designation</label>
                                <input id="designation" placeholder="Designation" class="form-control" type="text"/>
                            </div>

                            <div class="col-md-4 p-2">
                                <label>Facebook</label>
                                <input id="facebook" placeholder="URL" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Github</label>
                                <input id="github" placeholder="URL" class="form-control" type="text"/>
                            </div>
                            
                            <div class="col-md-4 p-2">
                                <label>Linkedin</label>
                                <input id="linkedin" placeholder="URL" class="form-control" type="text"/>
                            </div>

                            <div class="col-12 p-1">
                                <label>Skill</label>
                                <textarea type="text" class="form-control" id="skill"> </textarea>
                            </div>

                            <div class="col-12 p-1">
                                <label>Description</label>
                                <textarea type="text" class="form-control" id="description"> </textarea>
                            </div>

                            <br/>
                                <img class="w-15" id="oldImg" src="{{asset('images/default.jpg')}}"/>
                            <br/>
                            <label class="form-label">Image</label>
                            <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])"  type="file" class="form-control" id="memberImgUpdate">
                            <input type="text" class="d-none" id="updateID">
                            <input type="text" class="d-none" id="filePath">
                        </div>
                        {{-- <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onUpdate()" class="btn mt-3 w-100  btn-primary">Update</button>
                                <a href="{{url('sendOtp')}}">Are you change your password?</a>
                            </div>
                        </div> --}}

                        <div class="col-md-4 p-2">
                            <button id="updateButton" onclick="onUpdate()" class="btn mt-3 w-100 btn-primary">Update Profile</button>
                            <button id="createButton" onclick="onCreate()" class="btn mt-3 w-100 btn-primary">Create Profile</button>
                            <a href="{{url('sendOtp')}}">Are you change your password?</a>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    FillUpUpdateForm();
    async function FillUpUpdateForm(){

        let id = document.getElementById('updateID').value;
        // let filePath = document.getElementById('oldImg').src;
        
        
        showLoader();

        let res = await axios.get("/user-profile/" + id);
        let data = res.data['data'];

        hideLoader();

        if (data['profile']) {
            // Profile is available, show the "Update" button
            document.getElementById('updateButton').style.display = 'block';
            document.getElementById('createButton').style.display = 'none';
        } 
        else {
            // Profile is not available, show the "Create" button
            document.getElementById('updateButton').style.display = 'none';
            document.getElementById('createButton').style.display = 'block';
        }

        document.getElementById('name').value=data['name'];
        document.getElementById('email').value=data['email'];
        document.getElementById('designation').value=data['profile'].designation;
        document.getElementById('description').value=data['profile'].description;
        document.getElementById('skill').value=data['profile'].skill;

        document.getElementById('facebook').value=data['profile'].facebook;
        document.getElementById('github').value=data['profile'].github;
        document.getElementById('linkedin').value=data['profile'].linkedin;

        document.getElementById('memberImgUpdate').value=data['profile'].files[0].memberImgUpdate; //it doesn't work yet

        // document.getElementById('memberImgUpdate').value=data['profile'].memberImgUpdate;

        // document.getElementById('profile').memberImgUpdate.files[0];


    }




    async function onCreate() {

        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let designation = document.getElementById('designation').value;
        let description = document.getElementById('description').value;
        let skill = document.getElementById('skill').value;

        let facebook = document.getElementById('facebook').value;
        let github = document.getElementById('github').value;
        let linkedin = document.getElementById('linkedin').value;

        let updateID=document.getElementById('updateID').value;
        let filePath=document.getElementById('filePath').value;
        let memberImgUpdate = document.getElementById('memberImgUpdate').files[0];

        if(email.length===0){
        errorToast('Email is required')
        }
        else if(name.length===0){
            errorToast('Name is required')
        }
        else if(designation.length===0){
            errorToast('Designation is required')
        }
        else if(description.length===0){
            errorToast('Description is required')
        }
        else if(skill.length===0){
            errorToast('Skill is required')
        }
        else if(facebook.length===0){
            errorToast('Facebook is required')
        }
        else if(github.length===0){
            errorToast('Github is required')
        }
        else if(linkedin.length===0){
            errorToast('Linkedin is required')
        }
        else if(!memberImgUpdate){
            errorToast('Image is required')
        }

        else {

            let formData=new FormData();
            formData.append('image',memberImgUpdate)
            formData.append('id',updateID)
            formData.append('name',name)
            formData.append('email',email)
            formData.append('designation',designation)
            formData.append('description',description)
            formData.append('skill',skill)

            formData.append('facebook',facebook)
            formData.append('github',github)
            formData.append('linkedin',linkedin)
            
            formData.append('file_path',filePath)

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post("/createProfile",formData,config);
            hideLoader();

            if(res.status===201){
                successToast('Request completed');
                // document.getElementById("user-profile").reset();
                // await FillUpUpdateForm();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }



    async function onUpdate() {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let designation = document.getElementById('designation').value;
        let description = document.getElementById('description').value;
        let skill = document.getElementById('skill').value;

        let facebook = document.getElementById('facebook').value;
        let github = document.getElementById('github').value;
        let linkedin = document.getElementById('linkedin').value;

        let updateID=document.getElementById('updateID').value;
        let filePath=document.getElementById('filePath').value;
        let memberImgUpdate = document.getElementById('memberImgUpdate').files[0];

        // console.log("ID value:", id);

        if(email.length===0){
        errorToast('Email is required')
        }
        else if(name.length===0){
            errorToast('Name is required')
        }
        else if(designation.length===0){
            errorToast('Designation is required')
        }
        else if(description.length===0){
            errorToast('Description is required')
        }
        else if(skill.length===0){
            errorToast('Skill is required')
        }
        else if(facebook.length===0){
            errorToast('Facebook is required')
        }
        else if(github.length===0){
            errorToast('Github is required')
        }
        else if(linkedin.length===0){
            errorToast('Linkedin is required')
        }
        // else if(!memberImgUpdate){
        //     errorToast('Image is required')
        // }

        else {

            let formData=new FormData();
            formData.append('image',memberImgUpdate)
            formData.append('id',updateID)
            formData.append('name',name)
            formData.append('email',email)
            formData.append('designation',designation)
            formData.append('description',description)
            formData.append('skill',skill)

            formData.append('facebook',facebook)
            formData.append('github',github)
            formData.append('linkedin',linkedin)
            
            formData.append('file_path',filePath)

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post("/updateProfile",formData,config)
            hideLoader();

            if(res.status===200 && res.data===1){
                successToast('Request completed');
            }
            else{
                errorToast("Request fail !")
            }
        }
    }

</script>


