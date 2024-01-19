<!DOCTYPE html>
<html>

<head>
    <title>Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/js2/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/js2/axios.min.js')}}"></script>
</head>

<body>
    <button class="btn btn-success viewBtn" type="button" aria-expanded="false">
        Add Category
    </button>

    <div class="modal animated zoomIn" id="category_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3 class="mt-3 text-warning">Create Category</h3>
                    <div class="mb-3">
                        <input type="text" id="category" class="form-control" placeholder="Category Name">
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <div>
                        <button type="button" id="category_modal-close" class="btn bg-gradient-success" data-bs-dismiss="modal">Cancel</button>
                        <button id="ctg_button" class="btn bg-gradient-danger">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.viewBtn').on('click', function () {
            $('#category_modal').modal('show');
        });

        $('#ctg_button').on('click', async function () {
            let category = document.getElementById('category').value;
            let res = await axios.post("/createCategory", { name: category });

            if (res.data === 1) {
                $('#category_modal').modal('hide');
                await getList();
            } else {
                alert("Something went wrong!!");
            }
        });
    </script>
</body>

</html>
