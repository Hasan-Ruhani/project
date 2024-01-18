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
                        <input type="text" id="head_line" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="short_des">Short Description</label>
                        <input type="text" id="short_des" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="Description">Description</label>
                        <input type="text" id="description" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="client">Client</label>
                        <input type="text" id="client" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="date">Date</label>
                        <input type="text" id="date" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="project_url">Project URL</label>
                        <input type="text" id="project_url" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="image">Front Image</label>
                        <input type="file" id="front_img" class="form-control">
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label" for="inputFile">Select 2 or more image:</label>
                        <input type="file" id="inputFile" multiple class="form-control">
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
            } else if (head_line.length === 0) {
                alert('Head Line is required');
            } else if (short_des.length === 0) {
                alert('Short Description is required');
            } else if (description.length === 0) {
                alert('Description is required');
            } else if (client.length === 0) {
                alert('Client is required');
            } else if (date.length === 0) {
                alert('Project date is required');
            } else if (project_url.length === 0) {
                alert('Project URL is required');
            } else if (!front_img) {
                alert('Thumbnail image is required');
            } else {
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
    </script>
    

</body>

</html>
