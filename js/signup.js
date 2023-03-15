const form = document.querySelector(".signup form"),
  continueBtn = document.querySelector(".button input "),
  errorText = document.querySelector(".error-txt");

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  // AJAX
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "success") {
          window.location.href = "users.php";
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };

  let formData = new FormData(form);
  xhr.send(formData);
};

// ASYNC / AWAIT
// continueBtn.onclick = async () => {
//   try {
//     const response = await fetch("php/signup.php", {
//       method: "POST"
//     });
//     if (response.ok) {
//       const data = await response.text();
//       console.log(data);
//     } else {
//       throw new Error("Network response was not ok.");
//     }
//   } catch (error) {
//     console.error("There was a problem with the fetch operation:", error);
//   }
// }
