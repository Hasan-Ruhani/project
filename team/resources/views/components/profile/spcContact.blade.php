<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>
      
      <div>
        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3676.929825726361!2d89.5297455741584!3d22.842081623041818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9a931ae41367%3A0x2d04d8bf802ec945!2s172%20Rd%20no.%2013%2C%20Khulna!5e0!3m2!1sen!2sbd!4v1703139846814!5m2!1sen!2sbd" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>13 no road, 170 no House, mujgunni residential area</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@gmail.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+880 1786-490687</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          {{-- <form action="forms/contact.php" method="post" role="form" class="php-email-form" onsubmit="contactForm(event)">   this method used for before run contactForm then execute javaScript   --}}
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="fulName" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" id="claint_email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message" required></textarea>
              <input type="text" id="profile_id" class="d-none">
            </div>
            {{-- <div class="text-center"><button type="submit">Send Message</button></div> --}}
            <div class="text-center"><button type="submit" onclick="contactForm()">Send Message</button></div>
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
          // event.preventDefault();
          let sendButton = document.querySelector('button[type="submit"]');
          sendButton.disabled = true; // Disable the button to prevent multiple submissions
          sendButton.innerHTML = 'Sending...'; // Change the button text to indicate sending

          let name = document.getElementById('fulName').value;
          let email = document.getElementById('claint_email').value;
          let subject = document.getElementById('subject').value;
          let message = document.getElementById('message').value;
          let profile_id = document.getElementById('profile_id').value;

          console.log(name);
          console.log(email);
          console.log(subject);
          console.log(message);

          if (name.length === 0 || email.length === 0 || subject.length === 0 || message.length === 0) {
            alert('All fields are required');
              sendButton.innerHTML = 'Send Message'; // Change the button text back to original
              sendButton.disabled = false; // Enable the button
          } 
          else {
            try {
                let res = await axios.post(`/createSpcContact/${profile_id}`, {
                    name: name,
                    email: email,
                    subject: subject,
                    message: message
                });

                if ((res.status === 200) || (res.status === 201)) {
                    $("input[type=text], textarea, input[type=email]").val(""); // Reset all contact fields
                    // alert('Congratulations! We have received your email');
                } else {
                    alert('Something went wrong!!');
                }
              } 
            catch (error) {
                alert('Something went wrong!!');
              } 
            finally {
                sendButton.innerHTML = 'Send Message'; // Change the button text back to original
                sendButton.disabled = false; // Enable the button
              }
            }
        }

</script>