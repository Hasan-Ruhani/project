<!-- source https://github.com/spacemadev/elevate-free-tailwind-business-template/ -->
<section class="bg-gray-100 mt-5 py-32">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8 text-primary">Meet Our Students</h2>

        <div id="memberList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            
        </div>
    </div>
</section>



<script>
    $(document).ready(function() {
        getStudents();

        async function getStudents() {

            let res = await axios.get("/userList");
            let profiles = res.data.data;
            $("#memberList").empty();

            profiles.forEach(item => {
                let EachItem = `<div class="bg-white rounded-lg shadow-md p-6 my-6 text-center">
                    <img src="${item['profile'].image}" alt="Team Member 1" class="w-full rounded-full mb-4">
                <h3 class="text-xl font-semibold mb-1">${item['name']}</h3>
                <p class="text-gray-700 mb-1">Role: ${item['profile'].designation}</p>
       
                <button
                    class="middle none center mr-4 rounded-lg bg-blue-500 py-2.5 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    data-ripple-light="true">
                    <a href="/profileDetails?id=${item['id']}">View Profile</a>
                 </button>
                 </div>`

                $("#memberList").append(EachItem);
            });
        }
    });
</script>