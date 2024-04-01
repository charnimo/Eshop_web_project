
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="aperture" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
    <circle cx="12" cy="12" r="10"/>
    <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/>
  </symbol>
  <symbol id="cart" viewBox="0 0 16 16">
    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>

  
  <symbol id="chevron-right" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
  </symbol>
</svg>


<nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand d-md-none" href="#">
      <svg class="bi" width="24" height="24"><use xlink:href="#aperture"/></svg>
      Aperture
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasLabel">Aperture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item mb-2"><a class="nav-link" href="/homepage.php"> <svg class="bi" width="24" height="24"><use xlink:href="#aperture"/></svg>
          </a></li>
          <li class="nav-item mb-2"><a class="nav-link" href="/homepage.php">Acceuil</a></li>
          <li class="nav-item mb-2"><a class="nav-link" href="/products.php">Product</a></li>
          <li class="nav-item mb-2"><a class="nav-link" href="/contact.html">Contact Us</a></li>
          <li class="nav-item mb-2"><a class="nav-link" href="/Checkout.php">
            <svg class="bi" width="24" height="24"><use xlink:href="#cart"/></svg>
          </a></li>
          <li class="nav-server-side-login" style="display: flex; align-items: center; justify-content: space-between;">
            <?php
            if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
                echo '<li class="nav-item mb-2"><a href="logout.php" class="nav-link"></li>
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>';
            } else {
                echo '<li class="nav-item mb-2"><a href="login.php" class="nav-link"></li>
                <i class="fas fa-user"></i> Login
              </a>';
            }
            ?>

            <div id="user-status" style="margin-left: 100px;">  
                <?php
                if (isset($_SESSION['admin'])) {
                    echo "Logged in as:  Admin";
                } else if (isset($_SESSION['user'])) {
                    echo "Logged in as:  " . $_SESSION['user'];
                } else {
                    echo "Not logged in";
                }
                ?>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

