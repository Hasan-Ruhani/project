
<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Latest From <span class="text-primary">Our Blog</span></h1>
        <div id="memberList" class="row g-4 justify-content-center">
            
            <div class="col-lg-6 col-xl-4">
                <div class="blog-item wow fadeIn" data-wow-delay="0.1s">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="img/blog-1.jpg" class="img-fluid w-100" alt="">
                        <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0 end-0">01 Jan 2045</div>
                    </div>
                    <div class="p-4">
                        <div class="blog-meta d-flex justify-content-between pb-2">
                            <div class="">
                                <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted me-2">By Admin</small></a>
                                <small><i class="fa fa-comment-alt me-2 text-muted"></i><a href="" class="text-muted me-2">12 Comments</small></a>
                            </div>
                            <div class="">
                                <a href=""><i class="fas fa-bookmark text-muted"></i></a>
                            </div>
                        </div>
                        <a href="" class="d-inline-block h4 lh-sm mb-3">Importance of “Piller” of Islam</a>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                        aliquip ex ea commodo consequat.</p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->



<div id="memberList"></div>

<script>
    $(document).ready(function() {
        teamExpert();

        async function teamExpert() {
            try {
                let res = await axios.get("/userList");
                let profiles = res.data.data;
                displayRandomProfiles(profiles);
            } catch (error) {
                console.error("Error fetching user list:", error);
            }
        }

        function displayRandomProfiles(profiles) {
            // Shuffle the profiles array
            profiles = profiles.sort(() => Math.random() - 0.5);
            // Select the first two profiles from the shuffled array
            let selectedProfiles = profiles.slice(0, 2);

            // Clear the member list before appending new items
            $("#memberList").empty();

            selectedProfiles.forEach(item => {
                let EachItem = `
                    <div class="col-lg-6 col-xl-4">
                        <div class="blog-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="blog-img position-relative overflow-hidden">
                                <img src="${item['profile'].image}" class="img-fluid w-100" alt="">
                                
                            <div class="p-4">
                                <div class="blog-meta d-flex justify-content-between pb-2">
                                    <div class="">
                                        <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted me-2">By Admin</small></a>
                                        <small><i class="fa fa-comment-alt me-2 text-muted"></i><a href="" class="text-muted me-2">${item['profile'].designation}</small></a>
                                    </div>
                                    <div class="">
                                        <a href=""><i class="fas fa-bookmark text-muted"></i></a>
                                    </div>
                                </div>
                                <a href="/profileDetails?id=${item['id']}" class="d-inline-block h4 lh-sm mb-3">${item['name']}</a>
                               
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                                <a href="#" class="btn btn-primary px-3">More Details</a>
                            </div>
                        </div>
                    </div>
                `;
                $("#memberList").append(EachItem);
            });
        }
    });
</script>



{{-- <img class="relative w-40" src="${item['profile'].image}" alt=""> --}}