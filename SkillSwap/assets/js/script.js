// ========= balqeess part==============
document.addEventListener("DOMContentLoaded", function () {

    // ================= BROWSE REQUESTS PAGE =================

    const searchInput = document.querySelector(".search-box input");
    const requestCards = document.querySelectorAll(".request-card");
    const filterButtons = document.querySelectorAll(".filter-btn");
    const requestCount = document.querySelector(".request-count");
    const noResults = document.querySelector(".no-results");

    let selectedFilter = "all";

    function filterRequests() {

        if (!searchInput || requestCards.length === 0) {
            return;
        }

        const searchValue = searchInput.value.toLowerCase();
        let visibleCount = 0;

        requestCards.forEach(function (card) {

            const cardText = card.innerText.toLowerCase();
            const cardType = card.getAttribute("data-type");

            const matchesSearch = cardText.includes(searchValue);

            const matchesFilter =
                selectedFilter === "all" ||
                cardType === selectedFilter;

            if (matchesSearch && matchesFilter) {
                card.style.display = "flex";
                visibleCount++;
            } else {
                card.style.display = "none";
            }

        });

        if (requestCount) {
            requestCount.innerText =
                "Showing " + visibleCount + " of " + requestCards.length + " requests";
        }

        if (noResults) {
            if (visibleCount === 0) {
                noResults.style.display = "block";
            } else {
                noResults.style.display = "none";
            }
        }
    }

    if (searchInput) {
        searchInput.addEventListener("keyup", filterRequests);
    }

    filterButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            filterButtons.forEach(function (btn) {
                btn.classList.remove("active");
            });

            button.classList.add("active");

            selectedFilter = button.getAttribute("data-filter");

            filterRequests();

        });

    });

    filterRequests();



    // ================= POST REQUEST PAGE =================

    const requestForm = document.querySelector(".request-form");

    if (requestForm) {

        requestForm.addEventListener("submit", function (event) {

            const title = document.querySelector('input[name="title"]');
            const description = document.querySelector('textarea[name="description"]');
            const preferredTime = document.querySelector('input[name="preferred_time"]');

            if (title && title.value.trim() === "") {
                alert("Please enter a skill title.");
                event.preventDefault();
                return;
            }

            if (description && description.value.trim().length < 10) {
                alert("Description must be at least 10 characters.");
                event.preventDefault();
                return;
            }

            if (preferredTime && preferredTime.value.trim() === "") {
                alert("Please enter your preferred time.");
                event.preventDefault();
                return;
            }

            alert("Request posted successfully!");

        });

    }



    // ================= SESSION TYPE CARDS =================

    const sessionCards = document.querySelectorAll(".session-card");

    sessionCards.forEach(function (card) {

        card.addEventListener("click", function () {

            sessionCards.forEach(function (item) {
                item.classList.remove("active");
            });

            card.classList.add("active");

            const radio = card.querySelector('input[type="radio"]');

            if (radio) {
                radio.checked = true;
            }

        });

    });



    // ================= POPULAR TAGS =================

    const tags = document.querySelectorAll(".popular-tags span");
    const titleInput = document.querySelector('input[name="title"]');

    tags.forEach(function (tag) {

        tag.addEventListener("click", function () {

            if (titleInput) {
                titleInput.value = tag.innerText;
            }

        });

    });

});
// ================= TALA PART =================

function sendMessage() {
    alert("Message sent successfully!");
}

function showNotification() {
    alert("You have new notifications!");
}

function scheduleSession() {
    alert("Session scheduled!");
}

// ================= Rimas part =================

// contact form

const contactForm = document.querySelector(".contact-form form");

if (contactForm) {

    contactForm.addEventListener("submit", function (event) {

        event.preventDefault();

        alert("Message sent successfully!");

    });

}
// admin approve button

const approveButtons = document.querySelectorAll(".approve-btn");

approveButtons.forEach(button => {

    button.addEventListener("click", function () {

        alert("Student approved successfully!");

    });

});

// dashboard quick action

const dashboardButton = document.querySelector(".dashboard-btn");

if (dashboardButton) {

    dashboardButton.addEventListener("click", function () {

        alert("Dashboard action completed!");

    });

}