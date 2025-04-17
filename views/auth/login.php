
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SpendWise | Login</title>
  <!-- Tailwind -->
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
  <!-- Alpine -->
  <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
  <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!-- Custom style -->
  <link rel="stylesheet" href="../../public/css/style.css" />
  <!-- Poppins font -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    .bg-cream {
      background-color: #FFF9F0;
    }

    .text-darken {
      color: #2F327D;
    }
  </style>
</head>

<body class="antialiased bg-cream">
  <?php include "../partials/header.php"; ?>

  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-md w-full" data-aos="fade-up" data-aos-duration="1000">
      <div class="text-center my-8">
        <h1 class="text-4xl font-bold text-darken">Welcome back to <span class="text-yellow-500">SpendWise</span></h1>
        <p class="text-gray-500 mt-2">Log in to your account</p>
      </div>

      <div class="bg-white rounded-xl shadow-xl p-8">
        <form action="../../actions/handle_login.php" method="POST">
          <!-- Email -->
          <div class="mb-6">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
            <input type="email" id="email" name="email"
              value="<?php echo $_SESSION['old_login']['email'] ?? ''; ?>"
              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition"
              placeholder="Enter your email"  />
            <?php if (isset($_SESSION['login_errors']['email'])): ?>
              <p class="text-red-500 text-sm mt-1"><?php echo $_SESSION['login_errors']['email']; ?></p>
            <?php endif; ?>
          </div>

          <!-- Password -->
          <div class="mb-6">
            <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
            <input type="password" id="password" name="password"
              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition"
              placeholder="Enter your password" />
            <?php if (isset($_SESSION['login_errors']['password'])): ?>
              <p class="text-red-500 text-sm mt-1"><?php echo $_SESSION['login_errors']['password']; ?></p>
            <?php endif; ?>
          </div>

          <!-- Submit Button -->
          <button type="submit"
            class="w-full bg-yellow-500 text-white font-bold rounded-lg py-3 px-4 focus:outline-none transform transition hover:scale-105 duration-300 ease-in-out">
            Login
          </button>
        </form>

        <p class="text-center mt-8 text-gray-600">
          Don’t have an account?
          <a href="register.php" class="text-yellow-500 font-semibold hover:text-yellow-600">Register</a>
        </p>
      </div>

      <div class="mt-8 text-center">
        <a href="../../" class="inline-flex items-center text-gray-600 hover:text-yellow-500">
          <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
          </svg>
          Back to home
        </a>
      </div>
    </div>
  </div>

  <?php include "../partials/footer.php"; ?>

  <!-- AOS -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <?php
  unset($_SESSION['login_errors']);
  unset($_SESSION['old']);
  ?>
</body>

</html>