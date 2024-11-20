// Select elements
const imageUploadInput = document.getElementById('image-upload');
const profileImage = document.querySelector('.img img'); 
const resetButton = document.querySelector('.reset-btn');

// Handle image upload
imageUploadInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = () => {
      profileImage.src = reader.result; 
    };
    reader.readAsDataURL(file);
  }
});

// Handle image reset
resetButton.addEventListener('click', () => {
  profileImage.src = './assets/stock.jpg'; 
  imageUploadInput.value = ''; 
});
