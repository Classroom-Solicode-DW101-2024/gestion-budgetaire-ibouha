<?php
include "../partials/header_dashboard.php";

if (isset(["user"]['user_id'])) {
    header('location:../auth/login.php');
}
$showPopup = false;

if (isset($_SESSION['show_welcome_popup'])) {
    $showPopup = true;
    unset($_SESSION['show_welcome_popup']); // Show it only once
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpendWise |Dshboard</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


</head>

<body class="bg-gray-100 w-full h-full">
<?php if ($showPopup): ?>
<div x-data="{ show: true }" x-show="show" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
    <div class="bg-white rounded-xl p-6 max-w-md w-full shadow-lg" x-show="show" x-transition>
        <h2 class="text-2xl font-bold text-green-600 mb-4">Beau Travail !</h2>
        <p class="text-gray-700">
            Vous venez de faire un premier pas pour bien gérer votre argent !
            La deuxième étape consiste à ajouter votre première transaction.
        </p>
        <div class="mt-6 text-right">
            <button @click="show = false"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">
                OK
            </button>
        </div>
    </div>
</div>
<?php endif; ?>




</body>

</html>