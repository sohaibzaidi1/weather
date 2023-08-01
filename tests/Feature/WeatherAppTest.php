<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WeatherAppTest extends TestCase
{
    use RefreshDatabase;

    public function it_displays_weather_information()
    {
        // Mock the weather data for Karachi to be returned by the API
        $weatherData = [
            'city' => 'Karachi',
            'temperature_c' => 30.0,
            'temperature_f' => 86.0,
            'humidity' => 70,
            'wind_mph' => 8.0,
            'wind_kph' => 12.9,
            'wind_dir' => 'E',
            'pressure_mb' => 1010.0,
            'pressure_in' => 29.83,
            'precip_mm' => 0.0,
            'precip_in' => 0.0,
            'feelslike_c' => 32.0,
            'feelslike_f' => 89.6,
            'visibility_km' => 10.0,
            'visibility_miles' => 6.2,
            'uv_index' => 5.0,
            'gust_mph' => 10.0,
            'gust_kph' => 16.1,
            'weather_text' => 'Sunny',
            'weather_icon' => 'https://example.com/sunny.png',
        ];

        // Mock the API response using Laravel's Http facade
        \Illuminate\Support\Facades\Http::fake([
            'http://api.weatherapi.com/v1/current.json' => \Illuminate\Support\Facades\Http::response(['current' => $weatherData], 200),
        ]);

        // Make a GET request to the weather route
        $response = $this->get('/');

        // Assert that the response is successful (status 200)
        $response->assertStatus(200);

        // Assert that the view was rendered with the weather data
        $response->assertViewHas('weatherData', $weatherData);

        // Assert that the weather data is displayed on the page
        $response->assertSee($weatherData['city']);
        $response->assertSee($weatherData['temperature_c']);
        $response->assertSee($weatherData['temperature_f']);
        $response->assertSee($weatherData['humidity']);
        $response->assertSee($weatherData['wind_mph']);
        $response->assertSee($weatherData['wind_kph']);
        $response->assertSee($weatherData['wind_dir']);
        $response->assertSee($weatherData['pressure_mb']);
        $response->assertSee($weatherData['pressure_in']);
        $response->assertSee($weatherData['precip_mm']);
        $response->assertSee($weatherData['precip_in']);
        $response->assertSee($weatherData['feelslike_c']);
        $response->assertSee($weatherData['feelslike_f']);
        $response->assertSee($weatherData['visibility_km']);
        $response->assertSee($weatherData['visibility_miles']);
        $response->assertSee($weatherData['uv_index']);
        $response->assertSee($weatherData['gust_mph']);
        $response->assertSee($weatherData['gust_kph']);
        $response->assertSee($weatherData['weather_text']);
        $response->assertSee($weatherData['weather_icon']);
    }
}
