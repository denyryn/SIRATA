const profileImageContainer = document.getElementById("profile_image");
const newProfileImageContainer = document.getElementById("new_profile_image");
const editProfileBtn = document.getElementById("editProfileBtn");
const newProfileImagePreview = document.getElementById(
    "new_profile_image_preview",
);
const profileImagePreview = document.getElementById("profile_image_preview");

editProfileBtn.addEventListener("click", () => {
    profileImageContainer.classList.toggle("hidden");
    newProfileImageContainer.classList.toggle("hidden");
});

function loadFile(event) {
    const image = event.target.files[0];
    const imageUrl = URL.createObjectURL(image);
    newProfileImagePreview.src = imageUrl;
    profileImagePreview.src = imageUrl;
}
