document.addEventListener("DOMContentLoaded", function () {
    fetch('https://ipapi.co/json/')
    .then(response => response.json())
    .then(data => {
        document.getElementById("info").innerHTML = `
            <p><strong>IP:</strong> ${data.ip}</p>
            <p><strong>Provider:</strong> ${data.org || "Unknown"}</p>
            <p><strong>Country:</strong> ${data.country_name}</p>
            <p><strong>City:</strong> ${data.city}</p>
            <p><strong>OS:</strong> Unknown</p>
            <p><strong>Browser:</strong> Unknown</p>
        `;
    });
});
