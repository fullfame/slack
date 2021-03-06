<?php namespace FullFame\Slack;

use GuzzleHttp\Client as Guzzle;

/**
 * Class SlackClient
 * @package FullFame\Slack
 */
class SlackClient {

  /**
   * The Slack incoming webhook endpoint
   *
   * @var string
   */
  protected $endpoint;
  
  /**
   * The channel we should send messages to
   * by default
   *
   * @var string
   */
  protected $defaultChannel;

  /**
   * The username we should send messages as
   * by default
   *
   * @var string
   */
  protected $defaultUsername;

  /**
   * Guzzle HTTP client
   *
   * @var \GuzzleHttp\Client
   */
  protected $client;

  /**
   * Instantiate a new client
   *
   * @param \GuzzleHttp\Client $client
   * @param string $endpoint
   * @param string $defaultChannel
   * @param string $defaultUsername
   */
  public function __construct(Guzzle $client, 
                            $endpoint,
                            $defaultChannel,
                            $defaultUsername) {
    
    $this->client = $client;
    $this->endpoint = $endpoint;
    $this->defaultChannel = $defaultChannel;
    $this->defaultUsername = $defaultUsername;

  }

    /**
     * Sends a message to a Slack channel
     *
     * @param array $payload
     * @throws \Exception
     * @internal param string $message The message to send
     * @internal param string $channel An optional non-default channel
     * @internal param string $username An optional non-default username
     * @return void
     */
  public function send($message, $channel = null, $username = null, $overrides = []) {

      $payload = [
          'text'     => $message,
          'channel'  => $channel ? : $this->defaultChannel,
          'username' => $username ? : $this->defaultUsername,
      ];
      $payload = array_merge($payload, $overrides);
      $payload = json_encode($payload);
    
    $this->client->post($this->endpoint, ['body' => $payload]);

  }

}
