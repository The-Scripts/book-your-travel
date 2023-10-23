document.addEventListener("DOMContentLoaded", function () {
    const btnAll = document.getElementById("btnAll");
    const btnPrev = document.getElementById("btnPrev");
    const btnNext = document.getElementById("btnNext");
    const trips = document.querySelectorAll(".trip");

    btnAll.addEventListener("click", function () {
        showAllTrips();
    });

    btnNext.addEventListener("click", function () {
        filterTrips("nadchodzące");
    });

    btnPrev.addEventListener("click", function () {
        filterTrips("ukończone");
    });

    function showAllTrips() {
        trips.forEach((trip) => {
            trip.parentElement.style.display = "flex";
        });
    }

    function filterTrips(dateOfTrip) {
        trips.forEach((trip) => {
            const tripDate = trip.querySelector(".tag").textContent.toLowerCase();
            if (tripDate.includes(dateOfTrip)) {
                trip.parentElement.style.display = "flex";
            } else {
                trip.parentElement.style.display = "none";
            }
        });
    }
});
