<!DOCTYPE html>
<html>

<head>
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <div class="panel panel-primary">

            <div class="panel-heading">
                <h2>Laravel 10 Multiple File Upload Example</h2>
            </div>

            <div class="panel-body">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <form action="{{ url('/file-upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="pname">Name</label>
                        <input type="text" name="pname" id="pname" class="form-control">
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
                        <label class="form-label" for="name">Description</label>
                        <input type="text" name="description" id="description" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="project_url">Project URL</label>
                        <input type="text" name="project_url" id="project_url" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="image">Front Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="inputFile">Select 2 or more images:</label>
                        <input type="file" name="images[]" id="inputFile" multiple
                            class="form-control @error('files') is-invalid @enderror">
                        @error('files')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</body>

</html>
