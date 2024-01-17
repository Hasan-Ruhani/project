<!-- ======= Team Section ======= -->
<section id="team" class="team">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Team</h2>
        <p>Check our Team</p>
      </div>

      <div id="memberList" class="row">

        
          
        
      </div>
    </div>
  </section><!-- End Team Section -->

  <script>
    teamExpert();
        async function teamExpert(){
            let res=await axios.get("/userList");
            // console.log(res);
            // console.log(res.data.data[0].profile.image);
            // $("#memberList").empty()
    
            res.data['data'].forEach((item,i)=>{
                let EachItem= `<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                  <div class="member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="${item['profile'].image}" class="img-fluid" alt="">
              <div class="social">
                <a class="" target="_blank" href="${item['profile'].facebook}"><i class="bi bi-facebook"></i></a>
                <a class="" target="_blank" href="${item['profile'].linkedin}"><i class="bi bi-linkedin"></i></a>
                <a class="" target="_blank" href="${item['profile'].github}"><i class="bi bi-github"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4><a href="/profileDetails?id=${item['id']}" class="nav-item nav-link">${item['name']}</a></h4>
              <span>${item['profile'].designation}</span>
            </div>
          </div>
        </div>`
                $("#memberList").append(EachItem);
            });
        }
    </script>
