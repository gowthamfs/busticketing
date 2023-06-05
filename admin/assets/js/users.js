
// add user form
const addNewBtn = document.getElementById("add-new-btn");
const addNewForm = document.getElementById("add-new-form");
const overlay = document.getElementById("overlay");
const closeBtn = document.getElementById("close-btn");
addNewBtn.addEventListener("click", () => {
  addNewForm.style.display = "block";
  overlay.style.display = "block";
  document.body.style.overflow = "hidden";
});
closeBtn.addEventListener("click", () => {
  addNewForm.style.display = "none";
  overlay.style.display = "none";
  document.body.style.overflow = "auto";
});
window.addEventListener("click", (e) => {
  if (e.target === overlay) {
      addNewForm.style.display = "none";
      overlay.style.display = "none";
      document.body.style.overflow = "auto";
  }
});




