<!DOCTYPE html>
<html>

<head>
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

                {{-- <form action="{{ url('/file-upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf --}}

                    <div class="mb-3">
                        <label class="form-label" for="inputFile">Select Files:</label>
                        <input type="file" id="inputFile" class="form-control">

                        {{-- @error('files')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>

                    <div class="mb-3">
                        <button type="submit" onclick="portfolio()" class="btn btn-success">Upload</button>
                    </div>

                {{-- </form> --}}

            </div>
        </div>
    </div>


    <script>
        async function portfolio(){

            let multi_img = document.getElementById('inputFile').files[0];

            let fromData = new fromData();
            formData.append('images', multi_img);

            const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

            let res = await axios.post('/file-upload', formData, config);
        }
    </script>

</body>

</html>
