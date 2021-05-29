const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button");


sendBtn.onclick = () => {
    //Start ajax
    let xhr = new XMLHttpRequest(); //XML 객체 생성  
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response; // 서버에서 보낸 내용 받기 
                console.log(data);
                if (data == "success") {
                    location.href = "users.php";
                } else {
                    errorText.innerText = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    //ajax에서 php로 데이터보내기 
    let formData = new FormData(form);
    //creating new formData object 
    xhr.send(formData);
    //sending the form data to php 
}