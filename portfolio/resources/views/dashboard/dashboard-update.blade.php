<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Member</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">


                                {{-- <label class="form-label">Category</label>
                                <select type="text" class="form-control form-select" id="productCategoryUpdate">
                                    <option value="">Select Category</option>
                                </select> --}}

                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="memberNameUpdate">
                                <label class="form-label">Designation</label>
                                <input type="text" class="form-control" id="memberDesignationUpdate">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" id="memberDescriptionUpdate">
                                <br/>
                                <img class="w-15" id="oldImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Image</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])"  type="file" class="form-control" id="memberImgUpdate">

                                <input type="text" class="d-none" id="updateID">
                                <input type="text" class="d-none" id="filePath">


                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn btn-sm btn-success" >Update</button>
            </div>

        </div>
    </div>
</div>


<script>


// async function UpdateFillCategoryDropDown(){
//         let res = await axios.get("/list-category")
//         res.data.forEach(function (item,i) {
//             let option=`<option value="${item['id']}">${item['name']}</option>`
//             $("#productCategoryUpdate").append(option);
//         })
//     }


    async function FillUpUpdateForm(id,filePath){

        document.getElementById('updateID').value=id;
        document.getElementById('filePath').value=filePath;
        document.getElementById('oldImg').src=filePath;


        showLoader();
        // await UpdateFillCategoryDropDown();

        let res=await axios.post("/memberList",{id:id})
        hideLoader();

        document.getElementById('memberNameUpdate').value=res.data['name'];
        document.getElementById('memberDesignationUpdate').value=res.data['designation'];
        document.getElementById('memberDescriptionUpdate').value=res.data['description'];
        // document.getElementById('memberCategoryUpdate').value=res.data['category_id'];

    }



    async function update() {

        // let productCategoryUpdate=document.getElementById('productCategoryUpdate').value;
        let memberNameUpdate = document.getElementById('memberNameUpdate').value;
        let memberDesignationUpdate = document.getElementById('memberDesignationUpdate').value;
        let memberDescriptionUpdate = document.getElementById('memberDescriptionUpdate').value;
        let updateID=document.getElementById('updateID').value;
        let filePath=document.getElementById('filePath').value;
        let memberImgUpdate = document.getElementById('memberImgUpdate').files[0];


        if(memberNameUpdate.length===0){
            errorToast("Name Required !")
        }
        else if(memberDesignationUpdate.length===0){
            errorToast("Member Designation Required !")
        }
        else if(memberDescriptionUpdate.length===0){
            errorToast("Member Description Required !")
        }

        else {

            document.getElementById('update-modal-close').click();

            let formData=new FormData();
            formData.append('image',memberImgUpdate)
            formData.append('id',updateID)
            formData.append('name',memberNameUpdate)
            formData.append('designation',memberDesignationUpdate)
            formData.append('description',memberDescriptionUpdate)
            formData.append('file_path',filePath)

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post("/updateMember",formData,config)
            hideLoader();

            if(res.status===200 && res.data===1){
                successToast('Request completed');
                document.getElementById("update-form").reset();
                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }

   
</script>