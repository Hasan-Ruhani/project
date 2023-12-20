<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@example.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+1 5589 55488 55s</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="fulName" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" onclick="contactForm()" rows="5" placeholder="Message" required></textarea>
            </div>
            {{-- <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div> --}}
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<script>

        catchId();
        async function catchId(){       // this function use for only get profile id
            
            let searchParams = new URLSearchParams(window.location.search);
            let id = searchParams.get('id');

            let ress = await axios.get("/profileDetail/" + id);
            let details = ress.data.data;
            let profile_id = details[0].profile.id;
            // let profile_id = '';
            document.getElementById('profile_id').value=profile_id;
            // console.log('Profile ID:', profile_id);
        }

        async function contactForm() {

        let name = document.getElementById('fulName').value;
        let email = document.getElementById('email').value;
        let subject = document.getElementById('subject').value;
        let message = document.getElementById('message').value;
        let profile_id = document.getElementById('profile_id').value;
        console.log('Profile ID:', profile_id);
        console.log('Name:', name);
        console.log('Email:', email);
        console.log('Subject:', subject);
        console.log('Message:', message);

        if (name.length === 0) {
            alert('Name is required');
        } 
        if (email.length === 0) {
            alert('Email is required');
        } 
        else if (subject.length === 0) {
            alert('Subject is required');
        } 
        else if (message.length === 0) {
            alert('Message is required');
        }

        else { 
            let res = await axios.post(`/createSpcContact/${profile_id}`, {
                name: name,
                email: email,
                subject: subject,
                message: message
            });

            if (res.status === 201) {

                $("input[type=text], textarea, input[type=email]").val("");  // it work for reset all contact field
                alert('Congratulation! We have received your email');
                // document.getElementById("contactForm").reset();
                // await blogDetails();
            }

            else{
                alert('Something went wrong!!');
            }
        }
    }

</script>