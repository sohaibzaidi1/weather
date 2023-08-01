<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    protected $apiKey;
    /**
     * WeatherController constructor.
     */
    public function __construct() {
        $this->apiKey = Config::get('app.weather_API_key');
    }

    public function index() {
 
        $city = 'Karachi'; // Replace with your desired location or you can get current location from client system
 
        $response = Http::get("http://api.weatherapi.com/v1/current.json?key={$this->apiKey}&q={$city}");

        // Validate the API response
        if ($response->failed() || $response->status() !== 200 || empty($response['current'])) {
            $weatherData = [];
            return view('index', compact('weatherData'));
        }

        $data = json_decode($response->getBody(), true);

        $weatherData = [
            'city' => $data['location']['name'],
            'last_updated' => $data['current']['last_updated'],
            'temperature_c' => $data['current']['temp_c'],
            'temperature_f' => $data['current']['temp_f'],
            'is_day' => $data['current']['is_day'],
            'weather_text' => $data['current']['condition']['text'],
            'weather_icon' => $data['current']['condition']['icon'],
            'weather_code' => $data['current']['condition']['code'],
            'wind_mph' => $data['current']['wind_mph'],
            'wind_kph' => $data['current']['wind_kph'],
            'wind_degree' => $data['current']['wind_degree'],
            'wind_dir' => $data['current']['wind_dir'],
            'pressure_mb' => $data['current']['pressure_mb'],
            'pressure_in' => $data['current']['pressure_in'],
            'precip_mm' => $data['current']['precip_mm'],
            'precip_in' => $data['current']['precip_in'],
            'humidity' => $data['current']['humidity'],
            'cloud' => $data['current']['cloud'],
            'feelslike_c' => $data['current']['feelslike_c'],
            'feelslike_f' => $data['current']['feelslike_f'],
            'visibility_km' => $data['current']['vis_km'],
            'visibility_miles' => $data['current']['vis_miles'],
            'uv_index' => $data['current']['uv'],
            'gust_mph' => $data['current']['gust_mph'],
            'gust_kph' => $data['current']['gust_kph'],
        ];

        return view('index', compact('weatherData'));
    }
}
