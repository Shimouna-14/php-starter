const modal = document.querySelector("dialog");
modal.style.cursor = "pointer";

modal.addEventListener("click", () => {
    modal.close();
    // modal.removeAttribute("open");
});
