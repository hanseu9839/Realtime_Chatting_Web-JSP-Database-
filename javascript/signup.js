const form = document.querySelector(".signup form"),
    continueBtn = form.querySelector(".button input");

form.onsubmit = (e) => {
    e.preventDefault(); //preventing form  submitting
}
continueBtn.onclick = () => {
    console.log("Hello");
}