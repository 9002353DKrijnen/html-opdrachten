document.addEventListener("DOMContentLoaded", function () {

   let savedLocation = localStorage.getItem("lastLocation");

   if (savedLocation) {
      document.getElementById("inputWeather").value = savedLocation;
   }
   // haal weer op 
   getWeather(savedLocation);
});
// functie voor het ophalen van het weer met de value
document.getElementById("get-weather").addEventListener("click", function () {
   let location = document.getElementById("inputWeather").value;
   localStorage.setItem("lastLocation", location);
   getWeather(location);
})
function getWeather(location) {

   let apiKey = '76641d90bdc070711ee20e7a5e684089';
   let url = `https://api.openweathermap.org/data/2.5/weather?q=${location}&appid=${apiKey}&units=metric&lang=nl`;
   // api uitvoeren
   fetch(url)
      .then(response => {
         // controleer of de API-oproep succesvol was
         if (!response.ok) {
            throw new Error('Weerdata niet gevonden');
         }
         // converteer de respond naar JSON 
         return response.json();
      })
      .then(data => {
         updateWeather(data);
      })
      .catch(error => {
         // toon foutmelding als er een fout optreedt
         document.getElementById("weatherResult").innerHTML = error.message;
      })

}
function updateWeather(data) {
   let weatherResult = document.getElementById("weatherResult");
   let sunriseTime = new Date(data.sys.sunrise * 1000);
   let sunsetTime = new Date(data.sys.sunset * 1000);
   weatherResult.innerHTML = `
   <h2>Weer in ${data.name} </h2>
   <p>Temperatuur: ${data.main.temp} °C</p>
   <p>Wind: ${data.wind.speed} m/s </p>
   <p> Luchtvochtigheid : ${data.main.humidity} % </p>
   <p> Zonsopkomst: ${sunriseTime}</p>
   <p> Zonsondergang: ${sunsetTime}</p>
   `;
}