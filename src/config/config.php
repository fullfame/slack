<?php

return [
  
  /*
  |--------------------------------------------------------------------------
  | Incoming webhook endpoint
  |--------------------------------------------------------------------------
  |
  | The endpoint Slack generated for you.
  |
  */

  'endpoint' => '',

  /*
  |--------------------------------------------------------------------------
  | Default channel
  |--------------------------------------------------------------------------
  |
  | We will post to this channel by default. It can either be a channel such
  | as #general, a private #group or @username.
  |
  */

  'default_channel' => '#general',

  /*
  |--------------------------------------------------------------------------
  | Default Bot Name
  |--------------------------------------------------------------------------
  |
  | The name the of the Bot that the message will appear to come from.
  |
  */
  
  'default_username' => 'PHP Bot',

];
