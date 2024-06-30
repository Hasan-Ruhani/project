<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Profile</h2>
            <ol>
                <li><a href="{{'/#'}}">Home</a></li>
                <li>Profile Details</li>
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

                        <div class="">
                            <img id="img" alt="">
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                
            </div>
            

            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h2 id="name" style="color:#375454; font-weight:600" ></h2>
                    <ul>
                        {{-- <strong>Designation:</strong> <li id="designation" style="display:inline-block;"></li><br> --}}
                        <li><strong>Designation:</strong> <span id="designation"></span></li>
                        <li><strong>Skill:</strong> <span id="skill"></span></li>
                        <li><strong>Profile create date:</strong> <span id="date"></span></li>
                    </ul>

                    <div class="social-containerr">
                        <div class="btn_wrapp">
                            <small>Connect with me</small>
                            <div class="containerr">
                                <a target="_blank" id="facebook" href=""><i class="bi bi-facebook"></i></a>
                                <a target="_blank" id="linkedin" href=""><i class="bi bi-linkedin"></i></a>
                                <a target="_blank" id="github" href=""><i class="bi bi-github"></i></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="portfolio-description">
                <h2>These are the more details...</h2>
                <p id="description"> </p>
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
        // let date = Details['profile'].name;
        // console.log(date);

        const inputDate = Details[0]['profile'].created_at;
        const date = new Date(inputDate);
        const options = { day: '2-digit', month: 'long', year: 'numeric' };
        const formatter = new Intl.DateTimeFormat('en-GB', options);
        const [{ value: day }, , { value: month }, , { value: year }] = formatter.formatToParts(date);
        const formattedDate = `${day} ${month}, ${year}`;

        document.getElementById('img').src= Details[0]['profile'].image;
        document.getElementById('name').textContent = Details[0]['name'];
        document.getElementById('designation').textContent = Details[0]['profile'].designation;
        document.getElementById('description').textContent = Details[0]['profile'].description;
        document.getElementById('skill').textContent = Details[0]['profile'].skill;
        document.getElementById('date').textContent = formattedDate;

        document.getElementById('facebook').setAttribute('href', Details[0]['profile'].facebook);     // this method use when user provide link with "https://"
        document.getElementById('linkedin').setAttribute('href', Details[0]['profile'].linkedin);
        document.getElementById('github').setAttribute('href', Details[0]['profile'].github);

        // document.getElementById('facebook').setAttribute('href', 'https://' + Details[0]['profile'].facebook);   // this method use when user provide link without "https://"
        // document.getElementById('linkedin').setAttribute('href', 'https://' + Details[0]['profile'].linkedin);
        // document.getElementById('github').setAttribute('href', 'https://' + Details[0]['profile'].github);


    }
</script>





