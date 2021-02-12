# donor-drive-demo
Demo page using the DD API and Twitch embeds

##Setup
The repo requires an `npm install` at the project root to install dependencies required by  the tiny gulp file.

I chose to use PHP for the API calls and server-side logic. There are a couple of abstracted functions in the `functions.php` file, and the rest of the business logic is included at the top of `sections/viewer.php`.

##JS/jQuery
I chose to include jQuery for brevity. There are a few jQuery functions related to the view-switcher component in `scripts.js`.
