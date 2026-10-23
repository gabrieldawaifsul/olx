const pickerTitle = document.getElementById("pickerTitle");

const pickerSect = document.getElementById("pickerSect");
const loginPickerButton = document.getElementById("loginPickerButton");
const signupPickerButton = document.getElementById("signupPickerButton");

const loginSect = document.getElementById("loginSect");

const signupSect = document.getElementById("signupSect");

function init(){
    loginSect.style = "display: none;";
    signupSect.style = "display: none;";
    pickerSect.style = "display: flex;";
}

init();

function pickLogin(){
    pickerSect.style = "display: none;";
    signupSect.style = "display: none;";

    loginSect.style = "display: flex;";
    pickerTitle.innerHTML = "entrar na sua conta";
}

function pickSignup(){
    pickerSect.style = "display: none;";
    loginSect.style = "display: none;";

    signupSect.style = "display: flex;";
    pickerTitle.innerHTML = "criar uma nova conta";
}