
<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">Our Students Says!</h1>
        </div>
        <div id="reviewList" class="owl-carousel testimonial-carousel position-relative">

        </div>
    </div>
</div>
<!-- Testimonial End -->

<script>
    getId();
    async function getId() {
        let searchParams = new URLSearchParams(window.location.search);
        let id = searchParams.get('id');

        let ress = await axios.get("/profileDetail/" + id);
        let details = ress.data.data;
        let profile_id = details[0].profile.id;
        document.getElementById('profile_id').value = profile_id;

        spcReview(profile_id);
    }

    async function spcReview(profile_id) {
        let res = await axios.get(`/spcUserReview/${profile_id}`);
        let user = res.data[0].user; 

        res.data.forEach((item, i) => {
            let EachItem = `<div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('assets/img/testimonial-1.jpg')}}" style="width: 80px; height: 80px;">
                <h5 class="mb-0">${user.name}</h5>
                <p>${user.email}</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">${item.review}</p>
                </div>
            </div>`;
            $("#reviewList").append(EachItem);
        });
    }


        //     let c_item = `
        //     <div class="owl-carousel testimonial-carousel position-relative">
        //     <div class="testimonial-item text-center">
        //         <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('assets/img/testimonial-1.jpg')}}" style="width: 80px; height: 80px;">
        //         <h5 class="mb-0">Client Name</h5>
        //         <p>Profession</p>
        //         <div class="testimonial-text bg-light text-center p-4">
        //         <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
        //         </div>
        //     </div>
        //     <div class="testimonial-item text-center">
        //         <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('assets/img/testimonial-2.jpg')}}" style="width: 80px; height: 80px;">
        //         <h5 class="mb-0">Client Name</h5>
        //         <p>Profession</p>
        //         <div class="testimonial-text bg-light text-center p-4">
        //         <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
        //         </div>
        //     </div> 
        //     <div class="testimonial-item text-center">
        //         <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('assets/img/testimonial-2.jpg')}}" style="width: 80px; height: 80px;">
        //         <h5 class="mb-0">Client Name</h5>
        //         <p>Profession</p>
        //         <div class="testimonial-text bg-light text-center p-4">
        //         <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
        //         </div>
        //     </div> 
        //     <div class="testimonial-item text-center">
        //         <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('assets/img/testimonial-2.jpg')}}" style="width: 80px; height: 80px;">
        //         <h5 class="mb-0">Client Name</h5>
        //         <p>Profession</p>
        //         <div class="testimonial-text bg-light text-center p-4">
        //         <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
        //         </div>
        //     </div>
        // </div>
        //     `;
        //     $(".container").append(c_item);

        //     console.log($(".container"));
      





</script>