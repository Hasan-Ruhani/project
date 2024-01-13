<!DOCTYPE html>
<html>

<head>
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Laravel 10 Multiple File Upload Example</h2>
            </div>
            <div class="panel-body">
                <div class="mb-3">
                    <label class="form-label" for="inputFile">Select Files:</label>
                    <input type="file" id="inputFile" multiple class="form-control">
                </div>
                <div class="mb-3">
                    <button type="button" onclick="uploadFiles()" class="btn btn-success">Upload</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function uploadFiles() {
            let files = document.getElementById('inputFile').files;
            let formData = new FormData();
            for (let i = 0; i < files.length; i++) {
                formData.append('images[]', files[i]);
            }
            try {
                const response = await axios.post('/file-upload', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
                console.log(response.data);
                // Handle the response as needed
            } catch (error) {
                console.error('Error uploading the files: ', error);
                // Handle the error as needed
            }
        }
    </script>

</body>

</html>
