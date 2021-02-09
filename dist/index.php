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
          <input type="radio" name="views" value="stream-chat" aria-label="Stream and Chat">
          <input type="radio" name="views" value="stream-only" aria-label="Stream Only">
          <input type="radio" name="views" value="chat-only" aria-label="Chat Only">
        </div>
      </div>
      <div class="main-window flex stream-chat">
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

    <link rel="javascript" href="assets/scripts.js">
  </body>
</html>
