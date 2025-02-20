document.addEventListener("DOMContentLoaded", function () {
    fetch('logger.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById("info").innerHTML = `
                <p><strong>IP:</strong> ${data.ip}</p>
                <p><strong>Provider:</strong> ${data.provider}</p>
                <p><strong>Country:</strong> ${data.country}</p>
                <p><strong>City:</strong> ${data.city}</p>
                <p><strong>OS:</strong> ${data.os}</p>
                <p><strong>Browser:</strong> ${data.browser}</p>
            `;
        });
});
