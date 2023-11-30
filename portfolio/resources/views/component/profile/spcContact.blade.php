<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
            <h1 class="mb-5">Contact Me</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <h5>Get In Touch</h5>
                <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Office</h5>
                        <p class="mb-0">123 Street, New York, USA</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Mobile</h5>
                        <p class="mb-0">+012 345 67890</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Email</h5>
                        <p class="mb-0">info@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                    frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
            <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
               
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="fulName" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                <label for="message">Message</label>
                                <input type="text" id="profile_id" class="d-none">
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="button" onclick="contactForm()">Send Message</button>
                        </div>
                        
                    </div>
              
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

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
        // console.log('Profile ID:', profile_id);
        // console.log('Name:', name);
        // console.log('Email:', email);
        // console.log('Subject:', subject);
        // console.log('Message:', message);

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