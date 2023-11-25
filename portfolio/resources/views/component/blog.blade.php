<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img id="img" class="img-fluid position-absolute w-100 h-100" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 id="name" class="section-title bg-white text-start text-primary pe-3"></h6>
                <h1 id="designation" class="mb-4"></h1>
                <p id="description" class="mb-4"></p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<script>
    blogDetails();

    async function blogDetails() {
        let searchParams = new URLSearchParams(window.location.search);
        let id = searchParams.get('id');

        let res = await axios.get("/profileDetail/" + id);
        let Details = await res.data['data'];

        document.getElementById('img').src=Details[0]['profile'].image;
        document.getElementById('name').textContent = Details[0]['profile'].name;
        document.getElementById('designation').textContent = Details[0]['profile'].designation;
        document.getElementById('description').textContent = Details[0]['profile'].description;
    }
</script>
