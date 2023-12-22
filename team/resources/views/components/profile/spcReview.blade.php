<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container" data-aos="zoom-in">

      {{-- <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100"> --}}
        <div id="reviewList" class="swiper-wrapper">

          
            
          <!-- End testimonial item -->
        {{-- </div> --}}
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->


  <script>
          
        async function spcReview() {
          let searchParams = new URLSearchParams(window.location.search);
          let id = searchParams.get('id');
          console.log("id:", id);

          let res = await axios.get("/spcUserReview/" + id);

          res.data.forEach((item, i) => {
              let user = item.user; // Access user data from the current item
              console.log("info:", user);
              let EachItem = `<div class="swiper-slide">
                  <div class="testimonial-item">
                      <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                      <h3>${user.name}</h3>
                      <h4>${user.email}</h4>
                      <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                          ${item.review}
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                      </p>
                  </div>
              </div>`;
              $("#reviewList").append(EachItem);
          });
        }
        spcReview();



    </script>