



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
                        <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">                      </div>
                    </div>

                    <div>
                      <label for="about" class="block text-sm font-medium text-gray-700">Introduce yourself <span>(optional)</span></label>
                      <div class="mt-1">
                        <textarea id="about" name="about" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm"></textarea>
                      </div>
                      <p class="mt-2 text-sm text-gray-500">You can elaborate on your current situation.
                      </p>
                    </div>
                  </div>

                  <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-shrink-0 lg:flex-grow-0">
                    <p class="text-sm font-medium text-gray-700" aria-hidden="true">Photo</p>
                    <div class="mt-1 lg:hidden">
                      <div class="flex items-center">
                        <div class="inline-block h-12 w-12 flex-shrink-0 overflow-hidden rounded-full"
                          aria-hidden="true">
                          <img class="h-full w-full rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=320&amp;h=320&amp;q=80" alt="">
                        </div>
                        <div class="ml-5 rounded-md shadow-sm">
                          <div
                            class="group relative flex items-center justify-center rounded-md border border-gray-300 py-2 px-3 focus-within:ring-2 focus-within:ring-sky-500 focus-within:ring-offset-2 hover:bg-gray-50">
                            <label for="mobile-user-photo" class="pointer-events-none relative text-sm font-medium leading-4 text-gray-700">
                              <span>Change</span>
                              <span class="sr-only"> user photo</span>
                            </label>
                            <input id="mobile-user-photo" name="user-photo" type="file" class="absolute h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="relative hidden overflow-hidden rounded-full lg:block">
                      <img class="relative h-40 w-40 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=320&amp;h=320&amp;q=80" alt="">
                      <label for="desktop-user-photo" class="absolute inset-0 flex h-full w-full items-center justify-center bg-black bg-opacity-75 text-sm font-medium text-white opacity-0 focus-within:opacity-100 hover:opacity-100">
                        <span>Change</span>
                        <span class="sr-only"> user photo</span>
                        <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0">
                      </label>
                    </div>
                  </div>
                </div>

                <div class="mt-6 grid grid-cols-12 gap-6">
                  <div class="col-span-12 sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Your name</label>
                    <input type="name" name="name" id="fname" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                  </div>

                  <div class="col-span-12 sm:col-span-6">
                    <label for="number" class="block text-sm font-medium text-gray-700">Phone number</label>
                    <input type="text" name="number" id="number" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                  </div>

                  <div class="col-span-12">
                    <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                    <input type="text" name="url" id="url" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                  </div>

                  <div class="col-span-12 sm:col-span-6">
                    <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                    <input type="text" name="company" id="company" autocomplete="organization" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm">
                  </div>
                </div>
              </div>

              
                <div class="mt-4 flex justify-end py-4 px-4 sm:px-6">
                  <button type="button" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Cancel</button>
                  <button type="submit" class="ml-5 inline-flex justify-center rounded-md border border-transparent bg-sky-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
