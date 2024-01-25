<?php

session_start();
$username = $_SESSION['userData']['name'];
$avatar = $_SESSION['userData']['avatar'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="navbar bg-base-100">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl">Notifriends</a>
        </div>

        <div class="flex-none gap-2">
            <div class="form-control">
                <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
            </div>

            <label class="cursor-pointer grid place-items-center">
                <input type="checkbox" value="dark" class="toggle theme-controller bg-base-content row-start-1 col-start-1 col-span-2" />
                <svg class="col-start-1 row-start-1 stroke-base-100 fill-base-100" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="5" />
                    <path d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4" />
                </svg>
                <svg class="col-start-2 row-start-1 stroke-base-100 fill-base-100" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                </svg>
            </label>

            <button class="btn btn-xs sm:btn-sm md:btn-md lg:btn-lg" id="SSOButton" onclick="toggleSSOPrompt();">Sign In</button>

        </div>
    </div>

    <div id="SSOPrompt" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-75" style="display: none;">
        <div class="bg-white p-8 rounded-md">
            <!-- Your login form content goes here -->
            <button class="btn btn-xs sm:btn-sm md:btn-md lg:btn-lg" id="SSOButtonDiscord">Discord</button>
            <button href="/backend/steam/init-openid.php" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-lg" id="SSOButtonSteam">Steam</button>
        </div>
    </div>

    <script>
    var promptopen = false; // Initialize promptopen variable

    function toggleSSOPrompt() {
    console.log('Button clicked!');
    var ssoprompt = document.getElementById('SSOPrompt');
    ssoprompt.style.display = (ssoprompt.style.display === 'none') ? 'flex' : 'none';
    promptopen = !promptopen; // Toggle the promptopen variable
}


    // Add event listener to close the modal when clicking outside of it
    document.addEventListener('click', function (event) {
        var ssoprompt = document.getElementById('SSOPrompt');
        if (promptopen && event.target.closest('#SSOPrompt') === null) {
            ssoprompt.style.display = 'none';
            promptopen = false; // Update the promptopen variable
        }
    });
</script>

</body>

</html>
