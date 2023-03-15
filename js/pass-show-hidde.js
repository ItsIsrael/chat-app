const pswrdField = document.querySelector(".form input[type='password']");
toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick = () => {
  if (pswrdField.type == "password") {
    pswrdField.type = "text";
  } else {
    pswrdField.type = "password";
  }
  if (toggleBtn.classList.contains("bi-eye-fill")) {
    toggleBtn.classList.remove("bi-eye-fill");
    toggleBtn.classList.add("bi-eye-slash-fill");
  } else {
    toggleBtn.classList.remove("bi-eye-slash-fill");
    toggleBtn.classList.add("bi-eye-fill");
  }
};



//! INPUT CHANGE ICON
const iconCloud = document.querySelectorAll(".icon-cloud");
const inputFile = document.querySelector(".input-file i");
inputFile.addEventListener( 'click', () => {
  if (iconCloud.classList.contains("bi-cloud-arrow-up-fill")) {
    iconCloud.classList.remove("bi-cloud-arrow-up-fill");
    iconCloud.classList.add("bi-cloud-check-fill");
    } else {
      iconCloud.classList.remove("bi-cloud-check-fill");
      iconCloud.classList.add("bi-cloud-arrow-up-fill");
      }
});



iconCloud.addEventListener('click',() =>{
  alert()
  console.log("holaaa")
})