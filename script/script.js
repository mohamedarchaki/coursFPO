/*=================================
=======  afficher menu     ========
===================================*/
let btnOpn = document.querySelector(".menu-btn");
let btnSpan = document.getElementById("menu-span"); 
btnOpn.addEventListener("click", () => {
    handleMenu(document.getElementById("menu")); 
});
/*================call function====================*/
function handleMenu(active) { 
    active.classList.toggle("active");
    btnSpan.innerText = (btnSpan.innerText === "menu") ? " close " : " menu ";
}

/*=================================
=======  use Scroll div    ========
===================================*/
