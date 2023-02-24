function isAlphanumeric(s)
{
    return s.match(/^[a-z0-9]+$/i);
}

function checkEmail()
{
    // allows only emails ending in `up.edu.ph`
    return inpEmail.value.match(/^\w+([\.-]?\w+)*@up\.edu\.ph$/)
}

function verifyForm()
{
    if (isAlphanumeric(inpUsername.value) && checkEmail() && isAlphanumeric(inpPassword.value))
    {
        btnSubmit.disabled = false;
    }
    else 
    {
        btnSubmit.disabled = true;
    }
}

var inpUsername = document.getElementById("username");
var inpEmail = document.getElementById("email");
var inpPassword = document.getElementById("password");

var btnSubmit = document.getElementById("submit");

inpUsername.addEventListener("input", verifyForm);
inpEmail.addEventListener("input", verifyForm);
inpPassword.addEventListener("input", verifyForm);
