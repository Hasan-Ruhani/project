<!DOCTYPE html>
<html>

<head>
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
    <!-- JavaScript -->
    <script src="{{asset('public/assets/js2/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('public/assets/js2/axios.min.js')}}"></script>

    <style>
        .input-container {
            display: flex;
            width: 100%;
        }
        .input-container div {
            flex: 1;
            margin-right: 10px;
        }
        .input-container div:last-child {
            margin-right: 0;
        }
        .input-container input {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="panel panel-primary">

            <div class="row m-0 p-0">
                <div class="col-md-4 p-2">
                    <a href="{{url('/')}}"><button class="btn mt-3 w-40  btn btn-warning">&#8592;Home</button></a>
                </div>
            </div>
            

            <div class="panel-heading">
                <h2>Add your portfolio</h2>
            </div>

            <div class="panel-body">

                    <div class="mb-3">
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Category
                            </button>

                            <button class="btn btn-info viewBtn" type="button" aria-expanded="false">
                                &#10011; Category
                            </button>
                            <ul id="category" class="dropdown-menu">


                            </ul>
                          </div>
                        </div>

                        
                        <div class="modal animated zoomIn" id="category_modal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <h3 class="mt-3 text-warning">Create Category</h3>
                                        <div class="mb-3">
                                            <input type="text" id="Inp_category" class="form-control" placeholder="Category Name">
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-end">
                                        <div>
                                            <button type="button" id="category_modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button id="ctg_button" class="btn btn-warning" type="button">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="input-container">
                            <div>
                                <label class="form-label" for="head_line">Head Line</label>
                                <input type="text" id="head_line" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="project_url">Project URL</label>
                                <input type="text" id="project_url" class="form-control">
                            </div>
                        </div>

                        <div class="input-container">
                            <div class="mb-3">
                                <label class="form-label" for="client">Client</label>
                                <input type="text" id="client" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="date">Date</label>
                                <input type="date" id="date" class="form-control">
                            </div>
                        </div>


                        <div>
                            <label class="form-label" for="short_des">Short Description</label>
                            <input type="text" id="short_des" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="Description">Description</label>
                            <textarea id="description" class="form-control"  rows="4" cols="50"></textarea>
                        </div>

                    
                        <div class="input-container">
                            <div class="mb-3">
                                <label class="form-label" for="image">Front Image</label>
                                <input type="file" id="front_img" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="inputFile">Select 2 or more image:</label>
                                <input type="file" id="inputFile" multiple class="form-control">
                            </div>
                        </div>
                   

                    <div class="mb-3">
                        <button onclick="portfolio()" class="btn btn-success">Upload</button>
                    </div>

                {{-- </form> --}}

            </div>
        </div>
    </div>


   


    <script>
        var capture_id = null;
    
        async function category() {
            let Cres = await axios.get("/allCategory");
            Cres.data.forEach((item, i) => {
                let $allCategory = `<li><a class="dropdown-item" href="#" onclick="captureId(${item.id})">${item.name}</a></li>`;
                $('#category').append($allCategory);
            });
        }
    
        function captureId(id) {
            capture_id = id;
        }
    
        async function create_portfolio(capture_id) {
            let head_line = document.getElementById('head_line').value;
            let short_des = document.getElementById('short_des').value;
            let description = document.getElementById('description').value;
            let client = document.getElementById('client').value;
            let date = document.getElementById('date').value;
            let project_url = document.getElementById('project_url').value;
            let front_img = document.getElementById('front_img').files[0];
            let files = document.getElementById('inputFile').files;
    
            if (!capture_id) {
                alert('Insert category first');
            } 

            else if (head_line.length === 0) {
                alert('Head Line is required');
            } 
            else if (head_line.length > 50) {
              alert('Head Line Maximum 50 Characters');
            } 

            else if (client.length === 0) {
                alert('Client is required');
            } 
            else if (client.length > 50) {
                alert('Client Maximum 50 Characters');
            } 

            else if (short_des.length === 0) {
                alert('Short Description is required');
            } 

            else if (short_des.length > 200) {
              alert('Short Description Maximum 200 Characters');
            }

            else if (description.length === 0) {
                alert('Description is required');
            } 
            else if (description.length > 1000) {
              alert('Description Maximum 1000 Characters');
            }
            

            else if (date.length === 0) {
                alert('Project date is required');
            } 
            else if (project_url.length === 0) {
                alert('Project URL is required');
            } 
            else if (!front_img) {
                alert('Thumbnail image is required');
            } 

            else if (files.length < 2) {
                alert('Minimum 2 Multiple image is required');
            } 
            
            else {
                let formData = new FormData();
                formData.append('front_img', front_img);
                formData.append('head_line', head_line);
                formData.append('short_des', short_des);
                formData.append('description', description);
                formData.append('client', client);
                formData.append('date', date);
                formData.append('project_url', project_url);
                for (let i = 0; i < files.length; i++) {
                    formData.append('images[]', files[i]);
                }
    
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
    
                let res1 = await axios.post(`/portfolioItem/${capture_id}`, formData, config);
    
                if (res1.status === 201) {
                    ['head_line', 'short_des', 'description', 'client', 'date', 'project_url', 'front_img', 'inputFile'].forEach(field => document.getElementById(field).value = '');
                    alert('Portfolio Item Added');
                } else {
                    alert("Something went wrong!!");
                }
            }
        }

    
        function portfolio() {
            create_portfolio(capture_id);
        }
    
        // Call the category function after it has been defined
        category();



        // add category section......................................................
        $('.viewBtn').on('click', function () {
            $('#category_modal').modal('show');
        });

        $('#ctg_button').on('click', async function () {
            let Inp_category = document.getElementById('Inp_category').value;
            console.log(Inp_category);
            try {
                let response = await axios.post("/createCategory", { category: Inp_category });
                console.log(response);

                if (response.status === 200) {
                    $('#category_modal').modal('hide');
                    alert("Category created successfully.");
                    // window.location.reload();
                    await category();
                } else if (response.status === 409) {
                    $('#category_modal').modal('hide');
                    alert("Category already exists!");
                } else {
                    alert("Something went wrong!!");
                }
            } catch (error) {
                console.error("Error occurred:", error);
                alert("Something went wrong!!");
            }
        });
        
    </script>
    

</body>

</html>
