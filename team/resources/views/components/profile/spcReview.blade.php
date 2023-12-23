<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container" data-aos="zoom-in">

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div id="items" class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/default.png" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>saul458@gmail.com</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  For the target group, the result is worth taking care of until the airline takes over. The accusers, however, need that, and need some discipline. Some faintness, but always a smile.                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
          </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->


  <script>
        async function spcReview() {
          let searchParams = new URLSearchParams(window.location.search);
          let id = searchParams.get('id');
          let res = await axios.get("/spcUserReview/" + id);

            if (res.data) {
              console.log(res.data);
              res.data.forEach((item, i) => {
              console.log(item);

              $newItem = `<div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/default.png" class="testimonial-img" alt="">
                  <h3>${item.user.name}</h3>
                  <h4>${item.user.email}</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      ${item.review}
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>`;

              $('#items').append($newItem);
            });
          }
        }
        spcReview();

    </script>