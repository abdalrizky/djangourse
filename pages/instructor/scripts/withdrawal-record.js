// Get elements
const withdrawalBtn = document.getElementById("withdrawalBtn");
const withdrawalModal = document.getElementById("withdrawalModal");
const closeBtn = document.querySelector(".close-btn");

// Show the modal when the button is clicked
withdrawalBtn.addEventListener("click", () => {
  withdrawalModal.style.display = "block";
});

// Close the modal when the close button is clicked
closeBtn.addEventListener("click", () => {
  withdrawalModal.style.display = "none";
});

// Close the modal when clicking outside the modal content
window.addEventListener("click", (event) => {
  if (event.target === withdrawalModal) {
    withdrawalModal.style.display = "none";
  }
});
