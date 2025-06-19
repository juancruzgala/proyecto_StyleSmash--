const toggle =document.getElementById ("menu-sandwich");
const navLinks = document.getElementById ("nav-links");
toggle.addEventListener("click", () => {
 navLinks.classList.toggle("show");
});

