document.addEventListener("DOMContentLoaded", function () {
    const lookupButton = document.querySelector("#lookup");
    const countryField = document.querySelector("#country");
    const result = document.querySelector("#result");

    lookupButton.addEventListener("click", function () {
        const country = countryField.value.trim();

        fetch("world.php?country=" + encodeURIComponent(country))
            .then(function (response) {
                return response.text();
            })
            .then(function (data) {
                result.innerHTML = data;
            })
            .catch(function (error) {
                console.error("Error:", error);
                result.innerHTML = "An error occurred while retrieving country information.";
            });
    });
});