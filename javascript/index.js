// code for POP-UPS inside index.html
const join = document.querySelector("#join"); // Pop up for academy

const bottn = document.querySelector("#cancell");
const overlay = document.querySelector("#overlay");

bottn.addEventListener("click", () => {
  document.querySelector("#joinpop").classList.remove("active");
  overlay.classList.remove("active");
});
join.addEventListener("click", (e) => {
  e.preventDefault();
  document.querySelector("#joinpop").classList.toggle("active");
  overlay.classList.toggle("active");
});
