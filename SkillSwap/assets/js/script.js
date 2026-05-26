
<!-- ========= balqeess part============== -->
// browse requests - filter system

const searchInput = document.querySelector(".search-filter input");
const categoryFilter = document.querySelector(".search-filter select");
const requestCards = document.querySelectorAll(".request-card");

function filterRequests() {
    const searchValue = searchInput.value.toLowerCase();
    const selectedCategory = categoryFilter.value.toLowerCase();

    requestCards.forEach(card => {
        const text = card.innerText.toLowerCase();

        const matchesSearch = text.includes(searchValue);

        const matchesCategory =
            selectedCategory === "all categories" ||
            text.includes(selectedCategory);

        if (matchesSearch && matchesCategory) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}

if (searchInput && categoryFilter) {
    searchInput.addEventListener("keyup", filterRequests);
    categoryFilter.addEventListener("change", filterRequests);
}

// post requests form validation

const requestForm = document.querySelector(".request-form");

if (requestForm) {
    requestForm.addEventListener("submit", function (event) {

        const title = document.querySelector('input[name="title"]').value;
        const description = document.querySelector('textarea[name="description"]').value;

        if (title.trim() === "") {
            alert("Please enter a skill title.");
            event.preventDefault();
            return;
        }

        if (description.trim().length < 10) {
            alert("Description must be at least 10 characters.");
            event.preventDefault();
            return;
        }

        alert("Request posted successfully!");
    });
}
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