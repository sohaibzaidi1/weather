@extends('layouts.app')

@section('title', 'Weather App')

@section('content')
    @if($weatherData)
        <div class="weather-card @if (strpos($weatherData['weather_text'], 'Sun') !== false) sunshine @elseif (strpos($weatherData['weather_text'], 'Rain') !== false) rainy @endif">
            <h1>Weather Information for {{ $weatherData['city'] }}</h1>
            <img class="weather-icon" src="{{ $weatherData['weather_icon'] }}" alt="Weather Icon">
            <div class="weather-info">
                <h2>{{ $weatherData['weather_text'] }}</h2>
                <p><strong>Temperature:</strong> {{ $weatherData['temperature_c'] }}°C / {{ $weatherData['temperature_f'] }}°F</p>
                <p><strong>Feels Like:</strong> {{ $weatherData['feelslike_c'] }}°C / {{ $weatherData['feelslike_f'] }}°F</p>
                <p><strong>Humidity:</strong> {{ $weatherData['humidity'] }}%</p>
                <p><strong>Visibility:</strong> {{ $weatherData['visibility_km'] }} km / {{ $weatherData['visibility_miles'] }} miles</p>
                <p><strong>Wind:</strong> {{ $weatherData['wind_mph'] }} mph / {{ $weatherData['wind_kph'] }} kph, {{ $weatherData['wind_dir'] }}</p>
                <p><strong>Pressure:</strong> {{ $weatherData['pressure_mb'] }} mb / {{ $weatherData['pressure_in'] }} inHg</p>
                <p><strong>Precipitation:</strong> {{ $weatherData['precip_mm'] }} mm / {{ $weatherData['precip_in'] }} in</p>
                <p><strong>UV Index:</strong> {{ $weatherData['uv_index'] }}</p>
                <p><strong>Gusts:</strong> {{ $weatherData['gust_mph'] }} mph / {{ $weatherData['gust_kph'] }} kph</p>
            </div>
        </div>
    @else
        <div class="weather-card">
            An unexpected error occurred. Please try refreshing the page or contact the developer for assistance.
        </div>
    @endif
@endsection

