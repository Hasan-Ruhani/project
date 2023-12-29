<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
          <h3>Write a comment...</h3>
      </div>
      

        <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="review" id="review" placeholder="Comment...">
              </div>
              <div class="col-md-3 form-group">
                <button type="submit" onclick="comment()">Comment</button>
              </div>
            </div>
         </form>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<script>

    async function comment(){
        let searchParams = new URLSearchParams(window.location.search);
        let id = searchParams.get('id');
        // let res = await axios.post("/createSpcReview/" + id);

        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let review = document.getElementById('review').value;

        if(name.length === 0){
            errorToast('Name is required');
        }
        else if(email.length === 0){
            errorToast('Name is required');
        }
        else if(review.length === 0){
            errorToast('Review is required');
        }
        
        else{
            console.log(res);
            try {
                let res = await axios.post(`/createSpcReview/" + id`, {
                    name: name,
                    email: email,
                    review: review
                });
                

                if (res.status === 201) {
                    $("input[type=text], textarea, input[type=email]").val(""); // Reset all contact fields
                    // alert('Congratulations! We have received your email');
                } 
                else {
                    alert('Something went wrong!!');
                }
              } 
            catch (error) {
                alert('Something went wrong!!');
              } 
        }
    }

</script>