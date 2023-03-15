const form = document.querySelector(".typing-area"),
  inputField = form.querySelector(".input-field"),
  sendBtn = document.querySelector("button");
  const chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => e.preventDefault();
console.log("holaa")
//! SCROLL TO BOTTOM
const  scroll = () =>{
  chatBox.scrollTop = chatBox.scrollHeight;
  console.log("mas uno")
}
chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
}

chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
}

sendBtn.onclick = () => {
  // AJAX
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/insert-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputField.value = ""; //? inserted message into the database
        scroll();
      }
    }
  };

  let formData = new FormData(form);
  xhr.send(formData);
};


setInterval(() => {
  // AJAX
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        //? RENDER
        chatBox.innerHTML = data;
        if(! chatBox.classList.contains("active") ){
          scroll();
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
}, 500);






