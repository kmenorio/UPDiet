function isAlphanumeric(s)
{
    return s.match(/^[a-z0-9]+$/i);
}

function checkUsername() 
{
    if(isAlphanumeric(inpUsername.value))
    {
        isValidUsername = true;
    }
    else
    {
        isValidUsername = false;
    }
    verifyForm();
}

function checkEmail()
{
    // allows only emails ending in `up.edu.ph`
    if(inpEmail.value.match(/^\w+([\.-]?\w+)*@up\.edu\.ph$/))
    {
        isValidEmail = true;
    }
    else
    {
        isValidEmail = false;
    }
    verifyForm();
}

function checkPassword() 
{
    if(isAlphanumeric(inpPassword.value))
    {
        isValidPassword = true;
    }
    else
    {
        isValidPassword = false;
    }
    verifyForm();
}

function verifyForm()
{
    if(isValidUsername && isValidEmail && isValidPassword)
    {
        btnSubmit.disabled = false;
        errorMsg.style.visibility = "hidden";
    }
    else 
    {
        btnSubmit.disabled = true;
        errorMsg.style.visibility = "visible";

        if(!isValidUsername)
        {
            errorMsg.textContent = "Invalid username.";
            return;
        }
        if(!isValidEmail)
        {
            errorMsg.textContent = "Invalid email.";
            return;
        }
        if(!isValidPassword)
        {
            errorMsg.textContent = "Invalid password.";
            return;
        }
    }
}

var inpUsername = document.getElementById("username");
var inpEmail = document.getElementById("email");
var inpPassword = document.getElementById("password");

var btnSubmit = document.getElementById("submit");

var errorMsg = document.getElementById("error");
if(errorMsg.textContent != "")
{
    errorMsg.style.visibility = "visible";
}

inpUsername.addEventListener("input", checkUsername);
inpEmail.addEventListener("input", checkEmail);
inpPassword.addEventListener("input", checkPassword);

var isValidUsername = false;
var isValidEmail = false;
var isValidPassword = false;