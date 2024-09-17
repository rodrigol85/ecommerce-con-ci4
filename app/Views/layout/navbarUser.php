<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url('userLogged/products')  ?>">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="<?php echo base_url('userLogged/products')  ?>">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('userLogged/contacts')  ?>">Contacts</a>
        </li>
      
      </ul>
    </div>
    <div>
      <ul class="cart-desktop navbar-nav ml-auto">
              <li class="nav-item">
                <span id="total-items-in-cart" style="display: none;">0</span>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('userLogged/chart'); ?>">
                  <i class="fas fa-shopping-cart" style="color: white;"></i>
                  <span class="badge badge-primary badge-pill js-totCartItems" id="totCartItems">
                
                  </span>
  
                </a>
              </li>
            </ul>
    </div>
    <div>
    <ul class="navbar-nav m-auto mb-2 mb-lg-0 d-flex justify-content-between"> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo session('email') ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url('userLogged/profile'); ?>">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url('userLogged/orders');  ?>">Orders</a></li>
         
          </ul>
        </li>
      
        <li class="nav-item" id="logout">
          <a class="nav-link" href="<?php echo base_url('logout-user'); ?>">Logout</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>