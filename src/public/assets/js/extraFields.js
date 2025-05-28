document.addEventListener("DOMContentLoaded", function () {
    const userTypeSelection = document.querySelector(".user-level")
    const cards = document.querySelectorAll(".level");
    const signUpForm = document.querySelector(".auth-container");
    const extraFields = document.getElementById("extra-fields");
 

    if (!extraFields) {
        console.error("Elemento #extra-fields não encontrado");
        return;
    }

    let selectedUserType = null;
    let currentStep = 0;

    function showSignUpForm() {
        userTypeSelection.classList.add("hide");
        signUpForm.classList.remove("hide");
    }


    levels.forEach(level => {
        level.addEventListener("click", () => {
            levels.forEach(l => l.classList.remove("selected"));
            level.classList.add("selected");
            selectedUserType = level.getAttribute("data-type");
            authContainer.classList.remove("hide");
            userTypeSelectedSpan.textContent = selectedUserType.charAt(0).toUpperCase() + selectedUserType.slice(1);
        });
    });

    function createField(labelText, inputType, inputName, placeholder, accept = "") {
        const formGroup = document.createElement("div");
        formGroup.classList.add("form-group");

        const label = document.createElement("label");
        label.textContent = labelText;
        label.setAttribute("for", inputName);

        const input = document.createElement("input");
        input.setAttribute("type", inputType);
        input.setAttribute("name", inputName);
        input.setAttribute("placeholder", placeholder);
        if (accept) input.setAttribute("accept", accept);

        formGroup.appendChild(label);
        formGroup.appendChild(input);
        return formGroup;
    }

    function addExtraFields(userType) {
        extraFields.innerHTML = "";
        if (userType === "user-student") {
            userType = "student";
            localStorage.setItem("usertype", userType);
        }
        else if (userType === "user-teacher") {
            userType = "teacher";
            extraFields.appendChild(createField("Escola onde leciona", "text", "teacher_school", "Insira o nome da escola"));
            extraFields.appendChild(createField("Documento comprovatório", "file", "teacher_doc", "", ".pdf,.jpg,.jpeg,.png"));
            localStorage.setItem("usertype", userType);
        } else if (userType === "user-admin") {
            userType = "admin";
            extraFields.appendChild(createField("Código da instituição", "text", "admin_code", "Insira o código fornecido"));
            extraFields.appendChild(createField("Documento de autorização", "file", "admin_doc", "", ".pdf,.jpg,.jpeg,.png"));
            localStorage.setItem("usertype", userType);
        }
    }


    function nextStep() {
        const steps = document.querySelectorAll(".form-step");
        if (currentStep < steps.length - 1) {
            steps[currentStep].classList.remove("active");
            currentStep++;
            steps[currentStep].classList.add("active");
        }
    }

    function prevStep() {
        const steps = document.querySelectorAll(".form-step");
        if (currentStep > 0) {
            steps[currentStep].classList.remove("active");
            currentStep--;
            steps[currentStep].classList.add("active");
        }
    }

    cards.forEach(card => {
        card.addEventListener("click", () => {
            selectedUserType = card.getAttribute("data-type");
            addExtraFields(selectedUserType);
            showSignUpForm();
        });
    });
    document.querySelectorAll(".next-btn").forEach(button => {
        button.addEventListener("click", nextStep);
    });
    document.querySelectorAll(".prev-btn").forEach(button => {
        button.addEventListener("click", prevStep);
    });
});
