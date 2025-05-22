<?php 

namespace App\Traits;

use GuzzleHttp\Client;
use App\Models\MeetingConfig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

/**
 * trait ZoomMeetingTrait
 */
trait ZoomMeetingTrait
{
    private $client;
    private $meeting_url = "https://api.zoom.us/v2/";
    private $meeting_auth_url = 'https://zoom.us/oauth/token?grant_type=account_credentials&';

    private $client_id;
    private $client_secret;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->meeting_url,
            'headers' => [
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
            ]
        ]);
    }

    public function toZoomTimeFormat(string $dateTime)
    {
        try {
            $date = new \DateTime($dateTime);

            return $date->format('Y-m-d\TH:i:s');
        } catch (\Exception $e) {
            //Log::error('ZoomDate->toZoomTimeFormat : '.$e->getMessage());
            return '';
        }
    }

    public function getKeys(){
        $store = Auth::user()->current_store;
        $data = MeetingConfig::where('store_id', $store)->where('name', 'zoom')->first();
        $data = Crypt::decryptString($data->keys);
        $data = explode(':', $data);

        $data = [
            'client_id' => $data[0],
            'client_secret' => $data[1],
            'account_id' => $data[2],
        ];

        return $data;
    }

    private function getToken()
    {
        $account_id = $this->getKeys()['account_id'];
        $url = $this->meeting_auth_url.'account_id='.$account_id;

        $response = $this->client->post($url, [
            'headers' => $this->getBasicHeader()
        ]);

        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            return $data['access_token'] ?? null;
        }

        return null;
    }

    public function createMeeting($data)
    {
        $token = $this->getToken();
        if (!$token) {
            return ['success' => false, 'data' => 'Failed to authenticate'];
        }

        $path = 'users/me/meetings';
        
        $response =  $this->client->post($path, [
            'headers' => $this->getBearerHeader($token),
            'body'    => json_encode([
                'topic'      => $data['topic'],
                'type'       => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $this->toZoomTimeFormat($data['start_time']),
                'duration'   => $data['duration'],
                'password' => $data['password'],
                'agenda'     => (! empty($data['agenda'])) ? $data['agenda'] : null,
                'timezone'     => 'America/Sao_Paulo',
                'settings'   => [
                    'host_video'        => ($data['host_video'] == "1") ? true : false,
                    'participant_video' => ($data['participant_video'] == "1") ? true : false,
                    'waiting_room'      => true,
                ],
            ]),
        ]);
    
        return [
            'success' => $response->getStatusCode() === 201,
            'data' => json_decode($response->getBody(), true)
        ];
    }

    private function getBasicHeader()
    {
        return [
            'Authorization' => 'Basic ' . $this->getCredentials(),
        ];
    }

    private function getBearerHeader($token)
    {
        return [
            'Authorization' => 'Bearer ' . $token,
        ];
    }

    private function getCredentials()
    {   
        $data = $this->getKeys();
        return base64_encode($data['client_id'] . ':' . $data['client_secret']);
    }
}

?>
