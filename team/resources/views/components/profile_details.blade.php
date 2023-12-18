<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>About Details</h2>
            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Member Details</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-8">
                <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                        <div class="swiper-slide">
                            <img id="img" alt="">
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3>About information</h3>

                    <ul>
                        <a><li id="designation"><strong>Designation</strong>: </li></a>
                        <li id="skill"><strong>Skill</strong>: </li>
                        <li><strong>Profile create date</strong>: 01 March, 2020</li>
                    </ul>

                    <div class="social-containerr">
                        <div class="btn_wrapp">
                            <small>Connect with me</small>
                            <div class="containerr">
                                <a href="your_facebook_link"><i class="bi bi-facebook"></i></a>
                                <a href="your_facebook_link"><i class="bi bi-linkedin" ></i></a>
                                <a href="your_facebook_link"><i class="bi bi-github"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="portfolio-description">
                    <h2>This is an example of portfolio detail</h2>
                    <p id="designation"> </p>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Portfolio Details Section -->


<script>
    blogDetails();

    async function blogDetails() {
        let searchParams = new URLSearchParams(window.location.search);
        let id = searchParams.get('id');

        let res = await axios.get("/profileDetail/" + id);
        let Details = await res.data['data'];
        console.log(Details);

        document.getElementById('img').src=Details[0]['profile'].image;
        document.getElementById('name').textContent = Details[0]['name'];
        document.getElementById('designation').textContent = Details[0]['profile'].designation;
        document.getElementById('description').textContent = Details[0]['profile'].description;
        document.getElementById('skill').textContent = Details[0]['profile'].skill;

        document.getElementById('facebook').textContent = Details[0]['profile'].facebook;
        document.getElementById('linkedin').textContent = Details[0]['profile'].linkedin;
        document.getElementById('github').textContent = Details[0]['profile'].github;
    }
</script>





