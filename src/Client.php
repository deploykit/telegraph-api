<?php

namespace Deploykit\Telegraph;

use Deploykit\Telegraph\Entities\Account;

class Client
{
    protected $url = 'https://api.telegra.ph/';

    protected $http;

    public function __construct($httpClient = null)
    {
        $this->http = $httpClient ?: new \GuzzleHttp\Client(['base_uri' => $this->url]);
    }

    public function createAccount($shortName, $authorName = '', $authorUrl = '')
    {
        $response = $this->http->post('/createAccount', [
            'json' => [
                'short_name' => $shortName,
                'author_name' => $authorName,
                'author_url' => $authorUrl
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        return new Account($response['result']);
    }

    public function editAccountInfo($account, $shortName = '', $authorName = '', $authorUrl = '')
    {
        $response = $this->http->post('/editAccountInfo', [
            'json' => [
                'access_token' => $this->getAccessToken($account),
                'short_name' => $shortName,
                'author_name' => $authorName,
                'author_url' => $authorUrl
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        return new Account($response['result']);
    }

    public function getAccountInfo($account, $fields = ['short_name', 'author_name', 'author_url'])
    {
        $availableFields = ['short_name', 'author_name', 'author_url', 'auth_url', 'page_count'];

        foreach ($fields as $field) {
            if (!in_array($field, $availableFields)) {
                throw new \Exception();
            }
        }

        $response = $this->http->post('/getAccountInfo', [
            'json' => [
                'access_token' => $this->getAccessToken($account),
                'fields' => $fields
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        return new Account($response['result']);
    }

    public function revokeAccessToken($account)
    {
        $response = $this->http->post('/revokeAccessToken', [
            'json' => [
                'access_token' => $this->getAccessToken($account)
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        return new Account($response['result']);
    }

    /**
     * @param  \Deploykit\Telegraph\Entities\Account|string  $account
     * @return  mixed
     */
    protected function getAccessToken($account)
    {
        if ($account instanceof Account) {
            return $account['access_token'];
        }

        return $account;
    }
}