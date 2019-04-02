

function login(){
    let username= document.getElementById("username").value;
    let password= document.getElementById("password").value;
    $.ajax({
        url: "php/login.php",
        type: "POST",
        data: {
            username: username,
            password: password
        },
        success: function (data) {
            location.reload();
        }
    });
}
function register(){
    let username= document.getElementById("username").value;
    let password= document.getElementById("password").value;
    $.ajax({
        url: "php/register.php",
        type: "POST",
        data: {
            username: username,
            password: password
        }
    });
}
