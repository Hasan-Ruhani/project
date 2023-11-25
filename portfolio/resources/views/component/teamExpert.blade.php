<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
            <h1 class="mb-5">Expert Instructors</h1>
        </div>
        <div id="memberList" class="row g-4">
            
        </div>
    </div>
</div>
<!-- Team End -->


<script>
teamExpert();
    async function teamExpert(){
        let res=await axios.get("/userList");
        // console.log(res);
        // console.log(res.data.data[0].profile.image);
        $("#memberList").empty()


        res.data['data'].forEach((item,i)=>{
            let EachItem= `<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                         <a href="/blog?id=${item['id']}"><img class="img-fluid" src="${item['profile'].image}" alt=""></a>
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href="${item['profile'].facebook}"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="${item['profile'].linkedin}"><i class="fab fa-linkedin"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href="${item['profile'].github}"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0"><a href="/blog?id=${item['id']}" class="nav-item nav-link">${item['name']}</a></h5>
                        <small>${item['profile'].designation}</small>
                    </div>
                </div>
            </div>`
            $("#memberList").append(EachItem);
        })
    }
</script>