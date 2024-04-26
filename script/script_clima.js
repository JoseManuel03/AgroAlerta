// Variables para la API
const apiKey = '07fcba920fd7d324c6718d56bcd5d7a9'; // Reemplaza 'TU_API_KEY' con tu clave API de OpenWeatherMap
const apiUrl = 'https://api.openweathermap.org/data/2.5/weather';

// Función para obtener datos de clima basados en la ubicación del dispositivo
async function getWeatherDataByLocation(latitude, longitude) {
    try {
        const response = await fetch(`${apiUrl}?lat=${latitude}&lon=${longitude}&appid=${apiKey}&units=metric`);
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al obtener datos de clima:', error);
    }
}

// Función para actualizar el card de clima con los datos obtenidos
async function updateWeatherCard() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(async position => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            const weatherData = await getWeatherDataByLocation(latitude, longitude);
            if (weatherData) {
                document.getElementById('location').innerHTML = `${weatherData.name}, ${weatherData.sys.country}<br>${new Date().toLocaleDateString()}`; // Actualiza la ubicación y la fecha
                document.querySelector('.temp').innerHTML = `${weatherData.main.temp}°`; // Actualiza la temperatura
            }
        }, error => {
            console.error('Error al obtener la ubicación:', error);
        }, { enableHighAccuracy: true }); // Habilitar alta precisión
    } else {
        console.error('Geolocalización no es compatible en este navegador.');
    }
}

// Llamar a la función para actualizar el card de clima al cargar la página
updateWeatherCard();
