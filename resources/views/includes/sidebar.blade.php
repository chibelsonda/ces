<nav class="offcanvas offcanvas-start show" tabindex="-1" id="offcanvasx" data-bs-keyboard="false" data-bs-backdrop="true" data-bs-scroll="true">
    <div class="offcanvas-header border-bottom">
      <a href="/" class="d-flex align-items-center text-decoration-none offcanvas-title d-sm-block">
        <h3>
          <i class="bi bi-card-list"></i>
          {{ config('app.name', 'Laravel') }}
        </h3>
      </a>
    </div>
    <div class="offcanvas-body px-0">
      
      <ul class="list-unstyled ps-0">
        <li class="mb-1">
          <button
            class="btn btn-toggle align-items-center rounded"
            data-bs-toggle="collapse"
            data-bs-target="#home-collapse"
            aria-expanded="true"
          >
            Home
          </button>
          <div class="collapse show" id="home-collapse" style="">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="/" class="rounded">Overview</a></li>
              <li><a href="#" class="rounded">Updates</a></li>
              <li><a href="#" class="rounded">Reports</a></li>
            </ul>
          </div>
        </li>
        <li class="mb-1">
          <button
            class="btn btn-toggle align-items-center rounded collapsed"
            data-bs-toggle="collapse"
            data-bs-target="#dashboard-collapse"
            aria-expanded="false"
          >
            Dashboard
          </button>
          <div class="collapse" id="dashboard-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="#" class="rounded">Overview</a></li>
              <li><a href="#" class="rounded">Weekly</a></li>
              <li><a href="#" class="rounded">Monthly</a></li>
              <li><a href="#" class="rounded">Annually</a></li>
            </ul>
          </div>
        </li>
        <li class="mb-1">
          <button
            class="btn btn-toggle align-items-center rounded collapsed"
            data-bs-toggle="collapse"
            data-bs-target="#orders-collapse"
            aria-expanded="false"
          >
            Orders
          </button>
          <div class="collapse" id="orders-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="#" class="rounded">New</a></li>
              <li><a href="#" class="rounded">Processed</a></li>
              <li><a href="#" class="rounded">Shipped</a></li>
              <li><a href="#" class="rounded">Returned</a></li>
            </ul>
          </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
          <button
            class="btn btn-toggle align-items-center rounded collapsed"
            data-bs-toggle="collapse"
            data-bs-target="#account-collapse"
            aria-expanded="false"
          >
            Account
          </button>
          <div class="collapse" id="account-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="#" class="rounded">New...</a></li>
              <li><a href="#" class="rounded">Profile</a></li>
              <li><a href="#" class="rounded">Settings</a></li>
              <li><a href="#" class="rounded">Sign out</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </nav>