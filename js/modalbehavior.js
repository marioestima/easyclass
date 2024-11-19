function OpenModal() {
    const modal = document.getElementById("modal-window");
    modal.classList.toggle("open");

    modal.addEventListener("click", (e)=> {
        if (e.target.id == "close") {
            modal.classList.remove("open");
        }
    });

}