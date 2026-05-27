
// ========= balqeess part==============
// ================= BROWSE REQUESTS =================

const searchInput = document.querySelector(".search-box input");

const requestCards = document.querySelectorAll(".request-card");

const filterButtons = document.querySelectorAll(".filter-btn");

let selectedFilter = "all";

function filterRequests() {

    const searchValue =
        searchInput.value.toLowerCase();

    requestCards.forEach(card => {

        const text =
            card.innerText.toLowerCase();

        const cardType =
            card.dataset.type;

        const matchesSearch =
            text.includes(searchValue);

        const matchesType =
            selectedFilter === "all" ||
            cardType === selectedFilter;

        if(matchesSearch && matchesType) {

            card.style.display = "flex";

        }

        else {

            card.style.display = "none";

        }

    });

}

if(searchInput) {

    searchInput.addEventListener(
        "keyup",
        filterRequests
    );

}

filterButtons.forEach(button => {

    button.addEventListener("click", function () {

        filterButtons.forEach(btn => {

            btn.classList.remove("active");

        });

        button.classList.add("active");

        selectedFilter =
            button.dataset.filter;

        filterRequests();

    });

});



// ================= POST REQUEST =================

const requestForm =
    document.querySelector(".request-form");

if(requestForm) {

    requestForm.addEventListener(
        "submit",
        function (event) {

            const title =
                document.querySelector(
                    'input[name="title"]'
                ).value;

            const description =
                document.querySelector(
                    'textarea[name="description"]'
                ).value;

            const preferredTime =
                document.querySelector(
                    'input[name="preferred_time"]'
                ).value;

            if(title.trim() === "") {

                alert(
                    "Please enter a skill title."
                );

                event.preventDefault();

                return;

            }

            if(description.trim().length < 10) {

                alert(
                    "Description must be at least 10 characters."
                );

                event.preventDefault();

                return;

            }

            if(preferredTime.trim() === "") {

                alert(
                    "Please enter your preferred time."
                );

                event.preventDefault();

                return;

            }

            alert(
                "Request posted successfully!"
            );

        }
    );

}
// ================= SESSION TYPE =================

const sessionCards =
    document.querySelectorAll(".session-card");

sessionCards.forEach(card => {

    card.addEventListener("click", function () {

        sessionCards.forEach(item => {

            item.classList.remove("active");

        });

        card.classList.add("active");

        const radio =
            card.querySelector(
                'input[type="radio"]'
            );

        if(radio) {

            radio.checked = true;

        }

    });

});
// ================= POPULAR TAGS =================

const tags =
    document.querySelectorAll(".popular-tags span");

const titleInput =
    document.querySelector(
        'input[name="title"]'
    );

tags.forEach(tag => {

    tag.addEventListener("click", function () {

        if(titleInput) {

            titleInput.value =
                tag.innerText;

        }
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

// =================  RIMASSS ALMUNTI  Part  =================

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



// ==========Durar's part ==========

/* =========================================================
   ACTIVE NAVBAR LINK
   Highlights current page in navbar
   ========================================================= */

const currentPage = window.location.pathname.split("/").pop();

const navLinks = document.querySelectorAll(".site-header nav a");

navLinks.forEach(link => {

    const linkPage = link.getAttribute("href");

    if (linkPage === currentPage) {

        link.style.color = "#2563eb";
        link.style.fontWeight = "700";

    }

});


/* =========================================================
   SMOOTH SCROLLING
   ========================================================= */

document.querySelectorAll('a[href^="#"]').forEach(anchor => {

    anchor.addEventListener("click", function (e) {

        e.preventDefault();

        const target = document.querySelector(this.getAttribute("href"));

        if (target) {

            target.scrollIntoView({
                behavior: "smooth"
            });

        }

    });

});


/* =========================================================
   SIMPLE BUTTON ANIMATION
   ========================================================= */

const buttons = document.querySelectorAll("button, .primary-button, .secondary-button");

buttons.forEach(button => {

    button.addEventListener("mouseenter", () => {

        button.style.transform = "translateY(-2px)";
        button.style.transition = "0.2s";

    });

    button.addEventListener("mouseleave", () => {

        button.style.transform = "translateY(0px)";

    });

});


/* =========================================================
   GUEST ALERT FOR PROTECTED ACTIONS
   ========================================================= */

const protectedButtons = document.querySelectorAll(".login-required");

protectedButtons.forEach(button => {

    button.addEventListener("click", (e) => {

        alert("Please log in first to continue.");

    });

});
/* ================= BLUR TO CLEAR SCROLL EFFECT ================= */

document.addEventListener("DOMContentLoaded", function () {

    const revealElements = document.querySelectorAll(
        ".home-stat-card, .skill-card, .mentor-row, .value-card, .info-card, .work-step, .session-card, .question-card"
    );

    revealElements.forEach(function (element) {
        element.classList.add("scroll-reveal");
    });

    function revealOnScroll() {
        revealElements.forEach(function (element) {

            const elementTop = element.getBoundingClientRect().top;
            const screenHeight = window.innerHeight;

            if (elementTop < screenHeight - 80) {
                element.classList.add("show");
            }

        });
    }

    window.addEventListener("scroll", revealOnScroll);

    revealOnScroll();

});