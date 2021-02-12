<?php

function CallAPI($url)
{
  $curl = curl_init();
  $timeout = 10;
  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    // CURLOPT_HEADER => 1,
    CURLOPT_URL => $url,
    CURLOPT_CONNECTTIMEOUT => $timeout
  ));

  $response = curl_exec($curl);
  $jsonResponse = json_decode($response, true);
  curl_close($curl);

  return $jsonResponse;
}

function getDomain($url){
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    if(preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)){
        return $regs['domain'];
    }
    return FALSE;
}
