<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container" data-aos="zoom-in">

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div id="reviewList" class="swiper-slide">
            
          </div><!-- End testimonial item -->
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->


  <script>
            
        spcReview(5);
 
        function spcReview() {
            let searchParams = new URLSearchParams(window.location.search);
            let id = searchParams.get('id');
            console.log("id:", id);

            axios.get("/spcUserReview/" + id)
                .then((res) => {
                    let user = res.data[0].user;
                    console.log("info:", user);

                    res.data.forEach((item, i) => {
                        let EachItem = `<div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>${user.name}</h3>
                            <h4>${user.email}</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                ${item.review}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>`;
                        $("#reviewList").append(EachItem);
                    });
                })
                .catch((error) => {
                    console.error("Error fetching user review data:", error);
            });
        }


    </script>