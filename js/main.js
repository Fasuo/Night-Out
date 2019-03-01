document.getElementById("login").addEventListener("click", login);
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
            console.log(data)
        }
    });
}
