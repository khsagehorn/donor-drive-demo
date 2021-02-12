<?php
  include 'functions.php';
  $eventID = 942;
  $participantID = 2046;

  // GET Participants of given Event ID
  $participants = CallAPI("https://testdrive.donordrive.com/api/events/$eventID/participants");

  // Use the supplied participant ID number to find them in the array of participants
  foreach($participants as $struct) {
    if ($participantID == $struct[participantID]){
      $participant = $struct;
      break;
    }
  }

  // Assign URLs from participant data
  $donateURL = $participant["links"]["donate"];
  $streamURL = $participant["links"]["stream"];

  // GET Activity of given Participant
  $activity = CallAPI("https://testdrive.donordrive.com/api/participants/$participantID/activity");

  // Build the activity list from the three most recent activities
  $activityList = '';
  $i = 0;
  foreach ($activity as $li) {
    if ($i < 3){
      $amount = $donor = $img = $title = $date = '';
      $message = 'anonymous';
      $activityList .= '<li class="activity flex"><span class="amount">$'. $li[amount].
                       '</span><div class="content"><span class="title">'. $li[title]. '</span><p class="message">'. $li["message"]. '</p></div></li>';
    }
    $i++;
  }

  // The Twitch feeds require our 'parent' domain, so we assign that here
  $parentURL = $_SERVER['HTTP_HOST'];

?>
<div class="views-overlay">
  <div class="btn-group">
    <div class="stream-only-input">
      <input type="radio" name="view" value="stream-only" aria-label="Stream Only">
      <label for="stream-only">Stream Only</label>
    </div>
    <div class="chat-only-input">
      <input type="radio" name="view" value="chat-only" aria-label="Chat Only">
      <label for="chat-only">Chat Only</label>
    </div>
    <div class="cancel">
      <input type="radio" name="view" value="cancel" aria-label="Cancel">
      <label for="cancel">Cancel</label>
    </div>
  </div>
</div>

<section class="viewer-section content-width">
  <div class="util flex space-between">
    <h1>Stream</h1>
    <div class="views">
      <div class="stream-chat-input">
        <input type="radio" name="view" value="stream-chat" aria-label="Stream and Chat">
      </div>
      <div class="stream-only-input active">
        <input type="radio" name="view" value="stream-only" aria-label="Stream Only">
      </div>
      <div class="chat-only-input">
        <input type="radio" name="view" value="chat-only" aria-label="Chat Only">
      </div>
    </div>
    <div class="views-mobile"></div>
  </div>
  <div id="main-window" class="stream-only">
    <div class="video">
      <iframe
        src="<?= $streamURL. '&parent='. $parentURL; ?>"
        height="100%"
        width="100%">
      </iframe>
    </div>
    <div class="chat">
      <iframe
        src="<?= 'https://www.twitch.tv/embed/twitchgaming/chat?parent='. $parentURL; ?>"
        height="100%"
        width="100%">
      </iframe>
    </div>
  </div>
  <div class="activity-container flex">
    <ul class="activity-list flex x3">
      <?= $activityList; ?>
    </ul>
    <a href="<?= $donateURL; ?>" class="btn donate-btn">Donate</a>
  </div>
</section>
