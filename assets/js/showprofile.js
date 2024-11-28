const openModal = document.querySelector(".right-section .profile-photo");
const closeModalButton = document.querySelector("#close-modal");
const modal = document.querySelector("#modal");
const fade = document.querySelector("#fade");


const toggleModal = () => {
    [modal, fade].forEach((element) => {
        element.classList.toggle("hide");
    });
}

[closeModalButton, openModal, closeModalButton, fade].forEach((element) => {
    element.addEventListener("click", () => {
        toggleModal();
    });
});