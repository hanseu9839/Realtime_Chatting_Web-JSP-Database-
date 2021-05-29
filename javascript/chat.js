const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault(); //preventing form  submitting
}

sendBtn.onclick = () => {
    //Start ajax
    let xhr = new XMLHttpRequest(); //XML 객체 생성  
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = ""; //데이터베이스에 메시지를 삽입한 후 입력 필드를 비웁니다.
                scrollToBottom();
            }
        }
    }
    //ajax에서 php로 데이터보내기 
    let formData = new FormData(form);
    //creating new formData object 
    xhr.send(formData);
    //sending the form data to php 
}
setInterval(() => {
    //Start ajax
    let xhr = new XMLHttpRequest(); //XML 객체 생성  
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                scrollToBottom();
                if (!chatBox.classList.contains("active")) {
                    scrollToBottom();
                }
            }
        }
    }
    //ajax에서 php로 데이터보내기 
    let formData = new FormData(form);
    //creating new formData object 
    xhr.send(formData);
    //sending the form data to php 

}, 500) //이 기능은 500ms 후에 실행 계속 

function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}