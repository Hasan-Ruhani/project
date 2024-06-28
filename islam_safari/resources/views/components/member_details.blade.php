<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<main class="profile-page">
  <section class="relative block h-500-px">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');
          ">
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
    </div>
  </section>
  
  <section class="relative py-16 bg-blueGray-200">
    <div class="container mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
        <div class="px-6">
          <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
              <div class="relative">
                <img id="img" alt="" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
              </div>
            </div>            
          </div>

          <div class="text-center mt-20">
            <h3 id="name" class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700">
              
            </h3>
            <div class=" text-blueGray-600">
                Role - <span id="designation"></span>
              </div>
              <strong>Join:</strong> <span id="date"></span>

              <div class="flex justify-center py-2 lg:pt-4 pt-8">
                <a target="_blank" id="facebook" href=""><i class="fab fa-facebook p-2 text-lg"></i></a>
                <a target="_blank" id="whatsapp" href=""><i class="fab fa-whatsapp p-2 text-lg"></i></a>
              </div>

          <div class="border-t border-blueGray-200 text-center">
            <div class="flex flex-wrap justify-center">
              <div class="w-full mt-2 lg:w-9/12 px-4">
                <p id="description" class="mb-4 leading-relaxed text-blueGray-700">
                  
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>


<script>
    profile_details();

    async function profile_details() {
        let searchParams = new URLSearchParams(window.location.search);
        let id = searchParams.get('id');

        let res = await axios.get("/profileDetail/" + id);
        let Details = await res.data['data'];

        // let date = Details['profile'].name;
        // console.log(date);

        const inputDate = Details[0]['profile'].created_at;
        const date = new Date(inputDate);
        const options = { day: '2-digit', month: 'long', year: 'numeric' };
        const formatter = new Intl.DateTimeFormat('en-GB', options);
        const [{ value: day }, , { value: month }, , { value: year }] = formatter.formatToParts(date);
        const formattedDate = `${day} ${month}, ${year}`;

        document.getElementById('img').src=Details[0]['profile'].image;
        let name = document.getElementById('name').textContent = Details[0]['name'];
        document.getElementById('designation').textContent = Details[0]['profile'].designation;
        document.getElementById('description').textContent = Details[0]['profile'].description;
        document.getElementById('date').textContent = formattedDate;

        console.log(name);

        document.getElementById('facebook').setAttribute('href', Details[0]['profile'].facebook);     // this method use when user provide link with "https://"
        document.getElementById('whatsapp').setAttribute('href', Details[0]['profile'].whatsapp);

        // document.getElementById('facebook').setAttribute('href', 'https://' + Details[0]['profile'].facebook);   // this method use when user provide link without "https://"
        // document.getElementById('linkedin').setAttribute('href', 'https://' + Details[0]['profile'].linkedin);
        // document.getElementById('github').setAttribute('href', 'https://' + Details[0]['profile'].github);


    }
</script>
