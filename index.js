// code for POP-UPS inside index.html
const join = document.querySelector("#join"); // Pop up for academy
const ready = document.querySelector("#readyy"); // Pop up for ready store
const botn = document.querySelector(".cancel");
const bottn = document.querySelector("#cancell");
const overlay = document.querySelector("#overlay");

botn.addEventListener("click", () => {
  document.querySelector("#joinpop").classList.remove("active");
  document.querySelector("#readypop").classList.remove("active");
  overlay.classList.remove("active");
});
bottn.addEventListener("click", () => {
  document.querySelector("#joinpop").classList.remove("active");
  overlay.classList.remove("active");
});
join.addEventListener("click", (e) => {
  e.preventDefault();
  document.querySelector("#joinpop").classList.toggle("active");
  overlay.classList.toggle("active");
});
readyy.addEventListener("click", (e) => {
  e.preventDefault();
  document.querySelector("#readypop").classList.toggle("active");
  overlay.classList.toggle("active");
});

//code for Form validation inside store.php using jquery
