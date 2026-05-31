// ========= balqeess part==============

document.addEventListener("DOMContentLoaded", function () {

    const searchInput = document.querySelector(".search-box input");
    const requestCards = document.querySelectorAll(".request-card");
    const filterButtons = document.querySelectorAll(".filter-btn");
    const requestCount = document.querySelector(".request-count");
    const noResults = document.querySelector(".no-results");

    let selectedFilter = "all";

    function filterRequests() {

        let visibleCount = 0;

        requestCards.forEach(function (card) {

            const searchValue = searchInput ? searchInput.value.toLowerCase() : "";
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
            noResults.style.display =
                visibleCount === 0 ? "block" : "none";
        }
    }

    if (searchInput) {
        searchInput.addEventListener("input", filterRequests);
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

});

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

        //event.preventDefault();


    });

}
// admin approve button

const approveButtons = document.querySelectorAll(".approve-btn");

approveButtons.forEach(button => {

    button.addEventListener("click", function () {
        //event.preventDefault();

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

// ================= NADA PART =================
// ================= LOGIN / REGISTER / PROFILE =================

document.addEventListener("DOMContentLoaded", function () {

    /* ================= LOGIN PAGE ================= */

    const loginForm = document.querySelector(".login-form");

    if (loginForm) {

        loginForm.addEventListener("submit", function (event) {

            const email = document.querySelector("#email");
            const password = document.querySelector("#password");

            if (email && email.value.trim() === "") {
                alert("Please enter your email.");
                event.preventDefault();
                return;
            }

            if (password && password.value.trim() === "") {
                alert("Please enter your password.");
                event.preventDefault();
                return;
            }

        });

    }


    /* ================= SKILLS TAG MANAGER ================= */

    function createSkillManager(options) {

        const input = document.querySelector(options.inputSelector);
        const addButton = document.querySelector(options.buttonSelector);
        const hiddenInput = document.querySelector(options.hiddenSelector);
        const tagsContainer = document.querySelector(options.containerSelector);

        if (!input || !addButton || !hiddenInput || !tagsContainer) {
            return null;
        }

        let skills = [];

        function cleanSkill(value) {
            return value.trim().replace(/,/g, "");
        }

        function loadInitialSkills() {
            const source = tagsContainer.getAttribute("data-skills") || hiddenInput.value || "";

            skills = source
                .split(",")
                .map(function (skill) {
                    return cleanSkill(skill);
                })
                .filter(function (skill) {
                    return skill !== "";
                });
        }

        function syncHiddenInput() {
            hiddenInput.value = skills.join(", ");
        }

        function renderSkills() {
            tagsContainer.innerHTML = "";

            skills.forEach(function (skill, index) {
                const tag = document.createElement("span");
                tag.className = "skill-tag";

                const text = document.createElement("span");
                text.textContent = skill;

                const removeButton = document.createElement("button");
                removeButton.type = "button";
                removeButton.textContent = "×";
                removeButton.className = "remove-skill-btn";

                removeButton.addEventListener("click", function () {
                    skills.splice(index, 1);
                    renderSkills();
                });

                tag.appendChild(text);
                tag.appendChild(removeButton);
                tagsContainer.appendChild(tag);
            });

            syncHiddenInput();
        }

        function addSkill() {
            const value = cleanSkill(input.value);

            if (value === "") {
                return;
            }

            const exists = skills.some(function (skill) {
                return skill.toLowerCase() === value.toLowerCase();
            });

            if (!exists) {
                skills.push(value);
                renderSkills();
            }

            input.value = "";
            input.focus();
        }

        addButton.addEventListener("click", addSkill);

        input.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                addSkill();
            }
        });

        loadInitialSkills();
        renderSkills();

        return {
            addSkill: addSkill,
            renderSkills: renderSkills,
            getSkills: function () {
                return skills;
            }
        };
    }


    /* ================= REGISTER PAGE ================= */

    const registerForm = document.querySelector(".register-form");

    if (registerForm) {

        const optionBoxes = document.querySelectorAll(".option-box");

        optionBoxes.forEach(function (box) {

            box.addEventListener("click", function () {

                optionBoxes.forEach(function (item) {
                    item.classList.remove("active");
                });

                box.classList.add("active");

            });

        });

        const password = document.querySelector("#password");
        const confirm = document.querySelector("#confirm");
        const errorText = document.querySelector(".password-error");

        if (password && confirm && errorText) {

            confirm.addEventListener("input", function () {

                if (password.value !== confirm.value) {
                    errorText.textContent = "Passwords do not match";
                    errorText.style.color = "red";
                } else {
                    errorText.textContent = "Passwords match";
                    errorText.style.color = "green";
                }

            });

        }

        const registerSkillManager = createSkillManager({
            inputSelector: "#skill-input",
            buttonSelector: ".register-form .add-skill-btn",
            hiddenSelector: "#skills",
            containerSelector: "#selected-skills"
        });

        registerForm.addEventListener("submit", function (event) {

            const name = document.querySelector("#name");
            const email = document.querySelector("#email");

            if (name && name.value.trim() === "") {
                alert("Please enter your full name.");
                event.preventDefault();
                return;
            }

            if (email && email.value.trim() === "") {
                alert("Please enter your university email.");
                event.preventDefault();
                return;
            }

            if (password && password.value.length < 6) {
                alert("Password must be at least 6 characters.");
                event.preventDefault();
                return;
            }

            if (password && confirm && password.value !== confirm.value) {
                alert("Passwords do not match.");
                event.preventDefault();
                return;
            }

            if (registerSkillManager && registerSkillManager.getSkills().length === 0) {
                alert("Please add at least one skill using the + button.");
                event.preventDefault();
                return;
            }

        });

    }


    /* ================= PROFILE PAGE ================= */

    const profilePage = document.querySelector(".profile-page");

    if (profilePage) {

        const editButton = document.querySelector(".edit-profile-btn");
        const profileForm = document.querySelector(".profile-edit-form");
        const editableFields = document.querySelectorAll(
            ".profile-edit-form input[name='full_name'], .profile-edit-form textarea[name='bio'], .profile-skill-input"
        );
        const profileSkillButton = document.querySelector(".profile-add-skill-btn");

        const photoInput = document.querySelector("#profile-photo-input");
        const photoForm = document.querySelector("#profile-photo-form");
        const profileImage = document.querySelector(".profile-image");
        const bioTextarea = document.querySelector(".profile-edit-form textarea[name='bio']");

        const profileSkillManager = createSkillManager({
            inputSelector: "#profile-skill-input",
            buttonSelector: ".profile-add-skill-btn",
            hiddenSelector: ".profile-edit-form .skills-hidden",
            containerSelector: ".profile-selected-skills"
        });

        if (editButton && profileForm) {

            let isEditing = false;

            editButton.addEventListener("click", function () {

                if (!isEditing) {

                    editableFields.forEach(function (field) {
                        field.disabled = false;
                    });

                    if (profileSkillButton) {
                        profileSkillButton.disabled = false;
                    }

                    editButton.textContent = "✓ Save Changes";
                    editButton.style.backgroundColor = "#16a34a";

                    isEditing = true;

                } else {

                    editableFields.forEach(function (field) {
                        field.disabled = false;
                    });

                    if (profileSkillButton) {
                        profileSkillButton.disabled = false;
                    }

                    profileForm.submit();

                }

            });

        }

        if (photoInput && profileImage && photoForm) {

            photoInput.addEventListener("change", function () {

                const file = photoInput.files[0];

                if (file) {
                    profileImage.src = URL.createObjectURL(file);
                    photoForm.submit();
                }

            });

        }

        if (bioTextarea) {

            const counter = document.createElement("small");
            counter.textContent = bioTextarea.value.length + " / 250 characters";
            bioTextarea.parentElement.appendChild(counter);

            bioTextarea.addEventListener("input", function () {

                counter.textContent = bioTextarea.value.length + " / 250 characters";

                if (bioTextarea.value.length > 250) {
                    counter.style.color = "red";
                } else {
                    counter.style.color = "#94a3b8";
                }

            });

        }

        const passwordToggle = document.querySelector(".change-password-toggle");
        const passwordForm = document.querySelector(".change-password-form");

        if (passwordToggle && passwordForm) {

            passwordForm.style.display = "none";

            passwordToggle.addEventListener("click", function () {

                if (passwordForm.style.display === "block") {
                    passwordForm.style.display = "none";
                } else {
                    passwordForm.style.display = "block";
                }

            });

        }

        const emailButton = document.querySelector(".email-toggle-btn");

        if (emailButton) {

            emailButton.addEventListener("click", function () {

                if (emailButton.textContent.includes("ON")) {
                    emailButton.textContent = "✉ Email Notifications: OFF";
                    emailButton.classList.add("is-off");
                } else {
                    emailButton.textContent = "✉ Email Notifications: ON";
                    emailButton.classList.remove("is-off");
                }

            });

        }

    }

});
