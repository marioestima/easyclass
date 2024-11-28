const navEls = document.querySelectorAll('a');
const sidebar = document.getElementById('aside');


navEls.forEach(link => {
    link.addEventListener("click", () => {
        navEls.forEach(el => el.classList.remove("active"));
        link.classList.add("active");
    });

});