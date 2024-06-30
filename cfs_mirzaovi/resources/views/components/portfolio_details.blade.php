<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Portfolio Details</h2>
        <ol>
          <li><a href="{{'/'}}">Home</a></li>
          <li>Portfolio Details</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">
        <div class="col-lg-8">
          <div id="image" class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                  <!-- Swiper slides will be appended here -->
              </div>
              <div class="swiper-pagination"></div>
          </div>
      </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category:</strong> <span id="category"></span></li>
              <li><strong>Client:</strong> <span id="client"></span></li>
              <li><strong>Project date:</strong> <span id="date"></span></li>
              <li><strong>Project URL:</strong> <a id="projectLink" href="#" target="_blank"><span>View Project &#8599;</span></a></li>
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>Here are additional details about this project...</h2>
            <p id="description"></p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

  <script>

    portfolio_detail();

    async function portfolio_detail(){

      let searchParams = new URLSearchParams(window.location.search);
      let id = searchParams.get('id');
      let res =  await axios.get("/portfolioDetail/" + id);
      

      let Details = res.data;
      let category = res.data['category'];

      // let client = res.data['client'];
      let images = res.data['images'];
      images.forEach(function(image) {
      // console.log(image.filename);
    });

      document.getElementById('category').textContent = category['name'];
      document.getElementById('client').textContent = Details['client'];
      document.getElementById('date').textContent = Details['date'];
      document.getElementById('description').textContent = Details['description'];

      let projectUrl = Details['project_url'];
      document.getElementById('projectLink').setAttribute('href', 'https://' + projectUrl);

      // images section
      let $images = '';
        images.forEach(function (image) {
            // Each image should be a swiper-slide
            $images += `
                <div class="swiper-slide">
                    <img src="uploads/${image.filename}" alt="">
                </div>
            `;
        });

        $('#image .swiper-wrapper').html($images);

        // Initialize the Swiper after setting the slides
        var mySwiper = new Swiper('#image', {
            // Your Swiper configuration options here
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
      }

  </script>