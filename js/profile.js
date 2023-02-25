import { md5 } from "./md5.js";

function isAlphanumeric(s)
{
    return s.match(/^[a-z0-9]+$/i);
}

function onEnableUsernameEdit()
{
    dispUsername.hidden = true;
    formUsername.hidden = false;
}

function onCancelUsernameEdit()
{
    dispUsername.hidden = false;
    formUsername.hidden = true;

    inpUsername.value = lblUsername.innerText;
    btnEditUsernameSave.disabled = true;
}

function verifyUsername()
{
    if(isAlphanumeric(inpUsername.value))
    {
        btnEditUsernameSave.disabled = false;
    }
    else
    {
        btnEditUsernameSave.disabled = true;
    }
}

var dispUsername = document.getElementById("dispUsername");
var lblUsername = document.getElementById("txtUsername");
var btnEditUsername = document.getElementById("btnEditUsername");
var formUsername = document.getElementById("formUsername");
var inpUsername = document.getElementById("inpUsername");
var btnEditUsernameSave = document.getElementById("btnEditUsernameSave");
var btnEditUsernameCancel = document.getElementById("btnEditUsernameCancel");

inpUsername.value = lblUsername.innerText;

btnEditUsername.addEventListener("click", onEnableUsernameEdit);
btnEditUsernameCancel.addEventListener("click", onCancelUsernameEdit);

inpUsername.addEventListener("input", verifyUsername);

function onEnablePasswordEdit()
{
    btnEditPassword.hidden = true;
    formPassword.hidden = false;
}

function onCancelPasswordEdit()
{
    btnEditPassword.hidden = false;
    formPassword.hidden = true;

    inpCurrentPassword.value = "";
    inpNewPassword.value = "";
    btnEditPasswordSave.disabled = true;
}

function verifyPassword()
{
    if(isAlphanumeric(inpNewPassword.value) && md5(inpCurrentPassword.value) == txtPassword.innerText)
    {
        btnEditPasswordSave.disabled = false;
    }
    else
    {
        btnEditPasswordSave.disabled = true;
    }
}

var btnEditPassword = document.getElementById("btnEditPassword");
var formPassword = document.getElementById("formPassword");
var inpCurrentPassword = document.getElementById("inpCurrentPassword");
var inpNewPassword = document.getElementById("inpNewPassword");
var btnEditPasswordSave = document.getElementById("btnEditPasswordSave");
var btnEditPasswordCancel = document.getElementById("btnEditPasswordCancel");
var txtPassword = document.getElementById("txtPassword");

btnEditPassword.addEventListener("click", onEnablePasswordEdit);
btnEditPasswordCancel.addEventListener("click", onCancelPasswordEdit);

inpCurrentPassword.addEventListener("input", verifyPassword);
inpNewPassword.addEventListener("input", verifyPassword);