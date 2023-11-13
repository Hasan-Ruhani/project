<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="memberName">
                                <label class="form-label">Designation</label>
                                <input type="text" class="form-control" id="memberDesignation">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" id="memberDescriprion">
                                {{-- <textarea class="form-control" id="memberDescriprion"></textarea> --}}

                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>

                                <label class="form-label">Image</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="memberImage">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>

//  Save();
    async function Save() {
        let memberName = document.getElementById('memberName').value;
        let memberDesignation = document.getElementById('memberDesignation').value;
        let memberDescriprion = document.getElementById('memberDescriprion').value;
        let memberImg = document.getElementById('memberImage').files[0];

        if(memberName.length === 0){
            errorToast("Name Required");
        }
        

        // else if(memberDesignation.length === 0){
        //     errorToast("Designation Required");
        // }

        // else if(memberDescriprion.length === 0){
        //     errorToast("Descriprion Required");
        // }
        
        // else if(!memberImg){
        //     errorToast("Image Required");
        // }


        else{
            
            document.getElementById('modal-close').click();

            let formData = new FormData();
            formData.append('image', memberImg);
            formData.append('name', memberName);
            formData.append('designation', memberDesignation);
            formData.append('description', memberDescriprion);

            const config = {          // when transfer a file then its code must 
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post("/createMember", formData, config);
            hideLoader();

            if(res.status === 201){
                successToast('New Member Added');
                document.getElementById("save-form").reset();
                // await getList();
            }
            else{
                errorToast("Request Fail !");
            }
        }
    }
</script>
