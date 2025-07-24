<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?php echo BASE_URL . "/public/css/style.css" ?>">

</head>

<body>
<header class="admin-header">
  <div class="admin-header-inner">
    <div class="search-container">
      <div class="search-bar">
        <input type="text" placeholder="Tìm kiếm...">
        <button>Tìm</button>
      </div>
    </div>
    <div class="user-info">
      <span><i class="fas fa-bell"></i> <span class="badge">3</span></span>
      <div class="user">
        <span><i class="fas fa-user"></i> Admin</span>
        <button class="logout"><i class="fas fa-sign-out-alt"></i></button>
      </div>
    </div>
  </div>
</header>
<script>
  document.querySelector('.dropdown-toggle').addEventListener('click', function () {
    const dropdownMenu = this.nextElementSibling;
    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
  });

  window.addEventListener('click', function (event) {
    if (!event.target.closest('.dropdown')) {
      const dropdownMenus = document.querySelectorAll('.dropdown-menu');
      dropdownMenus.forEach(menu => menu.style.display = 'none');
    }
  });
</script>

</body>

</html>