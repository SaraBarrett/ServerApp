document.getElementById("cat-fact").addEventListener("click", function () {
  fetch("https://catfact.ninja/fact")
    .then((response) => response.json())
    .then((data) => {
      const p = document.createElement("p");
      p.textContent = data.fact;
      document.body.appendChild(p);
    });
});

document.getElementById("dog-image").addEventListener("click", function () {
  fetch("https://dog.ceo/api/breeds/image/random")
    .then((response) => response.json())
    .then((data) => {
      const img = document.createElement("img");
      img.src = data.message;
      document.body.appendChild(img);
    });
});

document.getElementById("weather-btn").addEventListener("click", function () {
  fetch(
    "https://api.open-meteo.com/v1/forecast?latitude=41.15&longitude=-8.61&daily=temperature_2m_max,temperature_2m_min,precipitation_sum&timezone=auto"
  )
    .then((response) => response.json())
    .then((data) => {
      const today = data.daily.time[0];
      const max = data.daily.temperature_2m_max[0];
      const min = data.daily.temperature_2m_min[0];

      const p = document.createElement("p");
      p.textContent =
        "para hoje no Porto " +
        today +
        " a mínima é " +
        min +
        " e a máxima é" +
        max;

      document.body.appendChild(p);
    });
});
