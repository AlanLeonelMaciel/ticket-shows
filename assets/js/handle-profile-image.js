const profileImage = document.getElementById('profile-image');
const profileImageInput = document.getElementById('profile-image-input');
const uploadForm = document.getElementById('upload-form');

profileImage.addEventListener('click', () => {
    profileImageInput.click();
});

profileImageInput.addEventListener('change', function () {
    uploadForm.submit();
});