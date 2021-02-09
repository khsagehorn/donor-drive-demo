<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hunter Sagehorn DonorDrive Demo</title>
    <link rel="stylesheet" href="assets/styles.css">
  </head>
  <body>
    <section class="viewer-section content-width">
      <div class="util flex space-between">
        <h1>Stream</h1>
        <div class="views">
          <input type="radio" name="view" value="stream-chat" aria-label="Stream and Chat" checked="checked">
          <input type="radio" name="view" value="stream-only" aria-label="Stream Only">
          <input type="radio" name="view" value="chat-only" aria-label="Chat Only">
        </div>
      </div>
      <div id="main-window" class="stream-chat">
        <div class="video">
          <?php
            include 'functions.php';
            $participant = CallAPI('https://testdrive.donordrive.com/api/events/942/participants');
            $streamURL = $participant[0]["links"]["stream"];
            $parentURL = $_SERVER['HTTP_HOST'];
          ?>
          <iframe
            src="<?= $streamURL. '&parent='. $parentURL; ?>"
            height="570px"
            width="100%"
            >
          </iframe>
        </div>
        <div class="chat">
          <iframe src="<?= 'https://www.twitch.tv/embed/twitchgaming/chat?parent='. $parentURL; ?>"
                  height="570px"
                  width="100%">
          </iframe>
        </div>
      </div>
    </section>

    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous">
    </script>
    <script src="scripts.js"></script>
  </body>
</html>
