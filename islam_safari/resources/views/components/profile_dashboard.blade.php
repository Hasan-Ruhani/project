



    <main class="relative mt-40">
      <div class="mx-auto max-w-screen-xl px-4 pb-6 sm:px-6 lg:px-8 lg:pb-16">
        <div class="overflow-hidden rounded-lg bg-white shadow">
          <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
            
            <form class="divide-y divide-gray-200 lg:col-span-9" action="#" method="POST">
              <!-- Profile section -->
              <div class="py-6 px-4 sm:p-6 lg:pb-8">
                <div>
                  <h2 class="text-lg font-medium leading-6 text-gray-900">Profile</h2>
                  <p class="mt-1 text-sm text-gray-500">This information will be displayed publicly so be careful what
                    you share.</p>
                </div>

                <div class="mt-6 flex flex-col lg:flex-row">
                  <div class="flex-grow space-y-6">
                    <div>
                      <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                      <div>
                        <input type="text" name="email" id="email" autocomplete="given-name" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">                      </div>
                      </div>

                    <div>
                      <label for="description" class="block text-sm font-medium text-gray-700">Introduce yourself <span>(optional)</span></label>
                      <div class="mt-1">
                        <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm"></textarea>
                      </div>
                      <p class="mt-2 text-sm text-gray-500">You can elaborate on your current situation.
                      </p>
                    </div>
                  </div>

                  <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-shrink-0 lg:flex-grow-0">
                    <p class="text-sm font-medium text-gray-700" aria-hidden="true">Photo <span>(optional)</span></p>
                    <div class="mt-1 lg:hidden">
                      <div class="flex items-center">
                        <div class="inline-block h-12 w-12 flex-shrink-0 overflow-hidden rounded-full"
                          aria-hidden="true">
                          <img id="profileImageP" class="h-full w-full rounded-full" src="{{asset('assets/default.png')}}" alt="">
                        </div>
                        
                        <div class="ml-5 rounded-md shadow-sm">
                          <div
                            class="group relative flex items-center justify-center rounded-md border border-gray-300 py-2 px-3 focus-within:ring-2 focus-within:ring-sky-500 focus-within:ring-offset-2 hover:bg-gray-50">
                            <label for="mobile-user-photo" class="pointer-events-none relative text-sm font-medium leading-4 text-gray-700">
                              <span>Change</span>
                              <span class="sr-only"> user photo</span>
                            </label>
                            <input id="memberImgUpdateP" name="memberImgUpdate" oninput="document.getElementById('profileImageP').src=window.URL.createObjectURL(this.files[0])" type="file" class="absolute h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0">
                          </div>
                        </div>
                      </div>
                    </div>

                    
                    {{-- <img class="relative h-40 w-40 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=320&amp;h=320&amp;q=80" alt=""> --}}

                    <div class="relative hidden overflow-hidden rounded-full lg:block">
                      <img id="profileImage" class="relative h-40 w-40 rounded-full" src="{{asset('assets/default.png')}}" alt="">
                      <label for="desktop-user-photo" class="absolute inset-0 flex h-full w-full items-center justify-center bg-black bg-opacity-75 text-sm font-medium text-white opacity-0 focus-within:opacity-100 hover:opacity-100">
                          <span>Change</span>
                          <span class="sr-only">user photo</span>
                          <input oninput="document.getElementById('profileImage').src=window.URL.createObjectURL(this.files[0])" type="file" id="memberImgUpdate" name="memberImgUpdate" class="absolute inset-0 h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0">
                      </label>
                    </div>
                  </div>
                </div>

                <div class="mt-6 grid grid-cols-12 gap-6">
                  <div class="col-span-12 sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Your name</label>
                    <input type="name" name="name" id="name" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                    
                    <input type="text" class="d-none" id="updateID">
                    <input type="text" class="d-none" id="filePath">

                  </div>

                  <div class="col-span-12 sm:col-span-6">
                    <label for="number" class="block text-sm font-medium text-gray-700">Phone number</label>
                    <input type="text" name="number" id="number" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                  </div>

                  <div class="col-span-12 sm:col-span-6">
                    <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook URL <span>(optional)</span></label>
                    <input type="text" name="facebook" id="facebook" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                  </div>

                  <div class="col-span-12 sm:col-span-6">
                    <label for="whatsapp" class="block text-sm font-medium text-gray-700">WhatsApp URL <span>(optional)</span></label>
                    <input type="text" name="whatsapp" id="whatsapp" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                  </div>

                  <div class="col-span-12">
                    <label for="designation" class="block text-sm font-medium text-gray-700">Designation <span>(optional)</span></label>
                    <input type="text" name="designation" id="designation" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                    <p class="mt-2 text-sm text-gray-500">You can change your Designation.
                  </div>
                </div>
              </div>
              
                <div class="flex justify-end py-4 px-4">
                  <button id="updateButton" onclick="onUpdate(); location.reload();" type="button" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Save Change</button>
                  <button id="createButton" onclick="onCreate()" type="button" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Create Profile</button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </main>


    <script>

      FillUpUpdateForm();
      async function FillUpUpdateForm() {
          let id = document.getElementById('updateID').value;
          let res = await axios.get("/user-profile/" + id);
          let data = res.data['data'];

          if (data['profile']) {
              // Profile is available, show the "Update" button
              document.getElementById('updateButton').style.display = 'block';
              document.getElementById('createButton').style.display = 'none';
          }
          else {
              // Profile is not available, show the "Create" button
              document.getElementById('updateButton').style.display = 'none';
              document.getElementById('createButton').style.display = 'block';

              // Use default image if no profile is found
              document.getElementById('profileImage').src = '{{asset('assets/default.png')}}';
              document.getElementById('profileImageP').src = '{{asset('assets/default.png')}}';
          }
              document.getElementById('name').value = data['name'];
              document.getElementById('email').value = data['email'];
              document.getElementById('number').value = data['number'];
              document.getElementById('designation').value = data['profile'].designation;
              document.getElementById('description').value = data['profile'].description;
              document.getElementById('facebook').value = data['profile'].facebook;
              document.getElementById('whatsapp').value = data['profile'].whatsapp;

              // Check if the profile has an image, if not, use the default image
              let imageUrl = data['profile'].image ? `${data['profile'].image}` : '{{asset('assets/default.png')}}';
              document.getElementById('profileImage').src = imageUrl;
              document.getElementById('profileImageP').src = imageUrl;
      }

  
  
  
  
      async function onCreate() {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let designation = document.getElementById('designation').value || 'Student';
        let description = document.getElementById('description').value;
        let number = document.getElementById('number').value;
        let facebook = document.getElementById('facebook').value;
        let whatsapp = document.getElementById('whatsapp').value;
        let updateID = document.getElementById('updateID').value;
        let filePath = document.getElementById('filePath').value;
        let memberImgUpdate = document.getElementById('memberImgUpdate').files[0];

        let formData = new FormData();
        if (memberImgUpdate) {
            formData.append('image', memberImgUpdate);
        }
        formData.append('id', updateID);
        formData.append('name', name);
        formData.append('email', email);
        formData.append('designation', designation);
        formData.append('description', description);
        formData.append('number', number);
        formData.append('facebook', facebook);
        formData.append('whatsapp', whatsapp);
        formData.append('file_path', filePath);

        const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        };

        try {
            let res = await axios.post("/createProfile", formData, config);
            if (res.status === 201) {
                successToast('Request completed on create');
                location.reload(); // Reload the page after successful update
            } else {
                errorToast("Request failed! on create");
            }
        } catch (error) {
            console.error("Error creating profile: ", error);
            if (error.response && error.response.status === 422) {
                console.error("Validation errors: ", error.response.data.errors);
            }
            errorToast("Request failed due to an error! on create");
        }
    }

  
  
  
      async function onUpdate() {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let designation = document.getElementById('designation').value;
        let description = document.getElementById('description').value;
        let number = document.getElementById('number').value;
        let facebook = document.getElementById('facebook').value;
        let whatsapp = document.getElementById('whatsapp').value;
        let updateID = document.getElementById('updateID').value;
        let filePath = document.getElementById('filePath').value;
        let memberImgUpdate = document.getElementById('memberImgUpdate').files[0];
        let memberImgUpdateP = document.getElementById('memberImgUpdateP').files[0];

        let formData = new FormData();
        formData.append('image', memberImgUpdate);
        formData.append('image', memberImgUpdateP);
        formData.append('id', updateID);
        formData.append('name', name);
        formData.append('email', email);
        formData.append('designation', designation);
        formData.append('description', description);
        formData.append('number', number);
        formData.append('facebook', facebook);
        formData.append('whatsapp', whatsapp);
        formData.append('file_path', filePath);

        const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        };

        try {
            let res = await axios.post("/updateProfile", formData, config);

            if (res.status === 200 && res.data === 1) {
                successToast('Request completed on update');
                location.reload(); // Reload the page after successful update
            } else {
                errorToast("Request failed! on update");
            }
        } catch (error) {
            console.error("Error updating profile: ", error);
            errorToast("Request failed due to an error! on update");
        }
    }
  
  </script>
