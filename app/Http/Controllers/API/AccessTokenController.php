<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class AccessTokenController extends Controller
{
    public function generate_token()
    {
        // Substitute your Twilio Account SID and API Key details
        $accountSid = 'ACb2e10df4de871023950e85af4045fbe2';
        $apiKeySid = 'SKef275734c571ddefc5acaca0b4cda02b';
        $apiKeySecret = '5iUjXsRLydGOwOhjfw9KXg3Tgg0MLNUz';

        $identity = uniqid();

        // Create an Access Token
        $token = new AccessToken(
            $accountSid,
            $apiKeySid,
            $apiKeySecret,
            3600,
            $identity
        );

        // Grant access to Video
        $grant = new VideoGrant();
        $grant->setRoom('cool room');
        $token->addGrant($grant);

        // Serialize the token as a JWT
        echo $token->toJWT();
    }
}
