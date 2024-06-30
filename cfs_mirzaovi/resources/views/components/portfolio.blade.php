<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Portfolio</h2>
        <p>Check our Portfolio</p>
      </div>
      {{-- id="category" --}}
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
              </ul>
            </div>
        </div>
      </div>
      
        <div id="portfolio_item" class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        </div>

    </div>
  </section><!-- End Portfolio Section -->



<script>

  async function get_category(){
    let res = await axios.get('/allCategory');
    res.data.forEach((item, i) => {
        let eachItem = `<li data-filter=".filter-${item['id']}">${item['name']}</li>`;
        $("#portfolio-flters").append(eachItem);
    });
  }

  async function portfolio_items() {
    let res2 = await axios.get('/allPortfolio');
    
    res2.data.forEach((item, i) => {
        let eachItem = `<div class="col-lg-4 col-md-6 portfolio-item filter-${item['category_id']}">
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
    });
  }
  
  get_category();
  portfolio_items();
</script>

                      {{-- this script only for how to get data by click the menue --}}
  {{-- <script>
    category();
    portfolioItem();

    async function category() {
    let res = await axios.get('/allCategory');
    // let names = res.data.map(item => item.name);
    $("#portfolio-flters").empty();
    $("#portfolio-flters").append(`<li data-filter="*" class="filter-active">All</li>`);

    res.data.forEach((item, i) => {
        let eachItem = `<li data-filter=".filter-${item['name']}">${item['name']}</li>`;
        $("#portfolio-flters").append(eachItem);
    });

    let clickedName;
    // Add click event listener to each name element
    $("#portfolio-flters li").on("click", function() {
        clickedName = $(this).text(); // Retrieve the clicked name
        console.log(clickedName); // Log the clicked name
        portfolioItem(clickedName);
      });
}
</script> --}}
