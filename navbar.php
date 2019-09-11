<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
   <div class="container">
      <a class="navbar-brand" href="/phpoop">OOP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="/phpoop">Home </a>
            </li>
            <li class="nav-item active">
               <a class="nav-link" href="/phpoop">About</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Post
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
               <a class="dropdown-item" href="/phpoop/posts">Posts</a>
               <a class="dropdown-item" href="<?php echo APPROOT . '/posts/create.php' ?>">Create Post</a>
               
               </div>
            </li>
         
         </ul>

         <ul class="navbar-nav ml-auto">
            
            <?php if (isset($_SESSION['id'])) : ?>
               <li class="nav-item active">
                  <a class="nav-link" href="#">Welcom <?php echo $_SESSION['username']; ?> </a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link" href="/phpoop/logout.php">Logout </a>
               </li>

            <?php else : ?>
               <li class="nav-item active">
                  <a class="nav-link" href="<?php echo APPROOT . '/register.php' ?>">Register </a>
               </li>
               <li class="nav-item">
               
                  <a class="nav-link" href="<?php echo APPROOT . '/login.php' ?>">Login</a>
               </li>
            <?php endif; ?>
         </ul>
      </div>
   </div>
</nav>
