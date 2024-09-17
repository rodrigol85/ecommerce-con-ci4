<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url('be/home')  ?>">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('be/orders/pending_orders')  ?>">Pending Orders</a>
        </li>
      
      </ul>
    </div>
    <div>
    <ul class="navbar-nav m-auto mb-2 mb-lg-0 d-flex justify-content-between"> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url('be/users/users_list'); ?>">Users list</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url('be/categories/categories_list');  ?>">Create new category</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('be/products/products_list');  ?>">Products</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('be/products/create_product');  ?>">Create new Product</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url('be/orders/all_orders');  ?>">Orders List (all)</a></li>
          </ul>
        </li>
      
        <li class="nav-item" id="logout">
          <a class="nav-link" href="<?php echo base_url('logout'); ?>">Logout</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>