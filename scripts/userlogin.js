window.onload = function(){
    var httpRequest;
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var loginBtn = document.getElementById("lBtn");

    lBtn.onclick=login;

    function login(){
        event.preventDefault(); 

        if (email.value === "" || password.value === "") {
            alert("Please fill in the required information!");
            return;
        }

        httpRequest = new XMLHttpRequest();
        var url = "login.php";
        httpRequest.open('POST', url);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send('email=' + encodeURIComponent(email.value)+ "&password=" + encodeURIComponent(password.value)); 
    }
    function processLogin() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                var response = httpRequest.responseText;
                if(response === "true") {
                    alert("Login successful");
                    window.location = "index.html";
                } else {
                    alert("Invalid!");
                }
            } else {
                alert('There was a problem with the request.');
            }
        }
    }


}