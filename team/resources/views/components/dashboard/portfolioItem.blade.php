<!DOCTYPE html>
<html>

<head>
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
    <!-- JavaScript -->
    <script src="{{asset('assets/js2/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/js2/axios.min.js')}}"></script>
</head>

<body>
    <div class="container">

        <div class="panel panel-primary">

            <div class="panel-heading">
                <h2>Laravel 10 Multiple File Upload Example</h2>
            </div>

            <div class="panel-body">

                {{-- @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif --}}

                {{-- <form method="POST" enctype="multipart/form-data">
                    @csrf --}}

                    <div class="mb-3">
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Category
                            </button>
                            <ul id="category" class="dropdown-menu">


                            </ul>
                          </div>
                        </div>

                    <div class="mb-3">
                        <label class="form-label" for="head_line">Head Line</label>
                        <input type="text" name="head_line" id="head_line" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="short_des">Short Description</label>
                        <input type="text" name="short_des" id="short_des" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="Description">Description</label>
                        <input type="text" name="description" id="description" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="client">Client</label>
                        <input type="text" name="client" id="client" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="date">Date</label>
                        <input type="text" name="date" id="date" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="project_url">Project URL</label>
                        <input type="text" name="project_url" id="project_url" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="image">Front Image</label>
                        <input type="file" name="pimage" id="pimage" class="form-control">
                    </div>

                    

                    {{-- <div class="mb-3">
                        <label class="form-label" for="inputFile">Select 2 or more images:</label>
                        <input type="file" name="images[]" id="inputFile" multiple
                            class="form-control @error('files') is-invalid @enderror">
                        @error('files')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}

                    <div class="mb-3">
                        <button onclick="portfolio()" class="btn btn-success">Upload</button>
                    </div>

                {{-- </form> --}}

            </div>
        </div>
    </div>


    <script>

        category();
        // Inside the category function
        async function category() {
            let Cres = await axios.get("/allCategory");
            console.log(Cres);
            Cres.data.forEach((item, i) => {
                let $allCategory = `<li><a class="dropdown-item" href="#" onclick="captureId(${item.id})">${item.name}</a></li>`;
                $('#category').append($allCategory);
            });
        }
        var capture_id = null;
        function captureId(id) {
            capture_id = id;
        }
        
        function portfolio() {
            create_portfolio(capture_id);
        }
        
        async function create_portfolio(capture_id){
            let head_line = document.getElementById('head_line').value;
            let short_des = document.getElementById('short_des').value;
            let description = document.getElementById('description').value;
            let client = document.getElementById('client').value;
            let date = document.getElementById('date').value;
            let project_url = document.getElementById('project_url').value;
            let pimage = document.getElementById('pimage').files[0];

            // console.log(id);
            // console.log(project_url);


            if(head_line.length===0){
                alert('Head Line is required')
            }
            else if(short_des.length===0){
                alert('Short Descriprion is required')
            }

            else {

                let formData=new FormData();
                formData.append('front_img',pimage)
                formData.append('category_id',1)
                formData.append('head_line',head_line)
                formData.append('short_des',short_des)
                formData.append('description',description)
                formData.append('client',client)
                formData.append('date',date)
                formData.append('project_url',project_url)
                // console.log(formData);
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                // showLoader();
                let res = await axios.post(`/portfolioItem/${capture_id}`, formData, config);

                // hideLoader();
                    console.log(res);
                
                if(res.status===201){
                    alert('Request completed');
                    // document.getElementById("user-profile").reset();
                    // await FillUpUpdateForm();
                }
                else{
                    alert("Request fail !")
                }
            }

        }

    </script>

</body>

</html>
