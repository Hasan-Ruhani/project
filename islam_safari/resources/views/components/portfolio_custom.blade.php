<div class="container">
  <!-- Filter Controls - Simple Mode -->
  <div class="row">
    <ul class="simplefilter">
      Simple filter controls:
      <li class="fltr-controls active" data-filter="all">All</li>
      <li class="fltr-controls" data-filter="1">Cityscape</li>
      <li class="fltr-controls" data-filter="2">Landscape</li>
      <li class="fltr-controls" data-filter="3">Industrial</li>
      <li class="fltr-controls" data-filter="4">Daylight</li>
      <li class="fltr-controls" data-filter="5">Nightscape</li>
    </ul>
  </div>

  <div class="row push-down">
    <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
    attribute, which starts from the value 1 and goes up from there -->
    <div class="filtr-container">
      <div class="filtr-item" data-category="1, 5" data-sort="Busy streets">
        <img
          class="img-responsive"
          src="uploads/img/city_1.jpg"
          alt="sample image"
        />
        <span class="item-desc">Busy Streets</span>
      </div>
      <div
        class="filtr-item"
        data-category="2, 5"
        data-sort="Luminous night"
      >
        <img
          class="img-responsive"
          src="uploads/img/nature_2.jpg"
          alt="sample image"
        />
        <span class="item-desc">Luminous night</span>
      </div>
      <div class="filtr-item" data-category="1, 4" data-sort="City wonders">
        <img
          class="img-responsive"
          src="uploads/img/city_3.jpg"
          alt="sample image"
        />
        <span class="item-desc">city wonders</span>
      </div>
      <div class="filtr-item" data-category="3" data-sort="In production">
        <img
          class="img-responsive"
          src="uploads/img/industrial_1.jpg"
          alt="sample image"
        />
        <span class="item-desc">in production</span>
      </div>
      <div
        class="filtr-item"
        data-category="3, 4"
        data-sort="Industrial site"
      >
        <img
          class="img-responsive"
          src="uploads/img/industrial_2.jpg"
          alt="sample image"
        />
        <span class="item-desc">industrial site</span>
      </div>
      <div
        class="filtr-item"
        data-category="2, 4"
        data-sort="Peaceful lake"
      >
        <img
          class="img-responsive"
          src="uploads/img/nature_1.jpg"
          alt="sample image"
        />
        <span class="item-desc">peaceful lake</span>
      </div>
      <div class="filtr-item" data-category="1, 5" data-sort="City lights">
        <img
          class="img-responsive"
          src="uploads/img/city_2.jpg"
          alt="sample image"
        />
        <span class="item-desc">city lights</span>
      </div>
      <div class="filtr-item" data-category="2, 4" data-sort="Dreamhouse">
        <img
          class="img-responsive"
          src="uploads/img/nature_3.jpg"
          alt="sample image"
        />
        <span class="item-desc">dreamhouse</span>
      </div>
      <div
        class="filtr-item"
        data-category="3"
        data-sort="Restless machines"
      >
        <img
          class="img-responsive"
          src="uploads/img/industrial_3.jpg"
          alt="sample image"
        />
        <span class="item-desc">restless machines</span>
      </div>
    </div>
  </div>



  <script type="text/javascript">
    // Expose this filterizr as a global for debugging
    window.filterizr = new window.Filterizr('.filtr-container', {
      controlsSelector: '.fltr-controls',
      gutterPixels: 15,
      spinner: {
        enabled: true,
      },
    });
  </script>


