<header class="header">

   <section class="flex">

      <a href="admin_panel.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_panel.php">HOME</a>
         <a href="products.php">MENU</a>
         <a href="placed_orders.php">ORDERS</a>
         <a href="admin_accounts.php">ADMINS</a>
         <a href="users_accounts.php">USERS</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="register_admin.php" class="option-btn">register</a>
         </div>
         <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
      </div>

   </section>

</header>