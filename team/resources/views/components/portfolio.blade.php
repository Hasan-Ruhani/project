<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Portfolio</h2>
      <p>Check our Portfolio</p>
    </div>
    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li class="fltr-controls active" data-filter="all">All</li>
          <!-- Add category filters dynamically using JavaScript -->
        </ul>
      </div>
    </div>
    <div id="portfolio_item" class="row portfolio-container" data-aos="fade-up">
      <!-- Portfolio items will be dynamically added here -->
    </div>

  </div>
</section>
<!-- End Portfolio Section -->

<script type="text/javascript" src="assets/filter/js/jquery.filterizr.min.js"></script>

<script>
  async function portfolio_items() {
    let res = await axios.get('/allCategory');
    let res2 = await axios.get('/allPortfolio');
    res.data.forEach((item, i) => {
      let eachItem = `<li class="fltr-controls" data-filter="${item['id']}">${item['name']}</li>`;
      $("#portfolio-flters").append(eachItem);
    });

    res2.data.forEach((item, i) => {
      let eachItem = `<div class="col-lg-4 col-md-6 filtr-item filter-${item['category_id']}" data-category="${item['category_id']}">
        <div class="portfolio-wrap">
          <img src="${item['front_img']}" class="img-fluid" alt="">
          <div class="portfolio-info">
                <h4>${item['head_line']}</h4>
                <p>${item['short_des']}</p>
                <div class="portfolio-links">
                  <a href="${item['front_img']}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="/detail?id=${item['id']}" title="More Details"><i class="bx bx-link"></i></a>
                </div>
                </div>
        </div>
      </div>`;
      $("#portfolio_item").append(eachItem);
      // console.log(item['category_id']);
    });



    // <div class="col-lg-4 col-md-6 portfolio-item filter-${item['category_id']}">
    //         <div class="portfolio-wrap">
    //           <img src="${item['front_img']}" class="img-fluid" alt="">
    //           <div class="portfolio-info">
    //             <h4>${item['head_line']}</h4>
    //             <p>${item['short_des']}</p>
    //             <div class="portfolio-links">
    //               <a href="${item['front_img']}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
    //               <a href="/detail?id=${item['id']}" title="More Details"><i class="bx bx-link"></i></a>
    //             </div>
    //           </div>
    //         </div>
    //       </div>



    // Initialize Filterizr after adding portfolio items
    window.filterizr = new window.Filterizr('.portfolio-container', {
      controlsSelector: '.fltr-controls',
      gutterPixels: 10,
      spinner: {
        enabled: true,
      },
    });
  }

  portfolio_items();
</script>
