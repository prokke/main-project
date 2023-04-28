const formAuth = document.getElementById("form-auth");
const output = document.querySelector(".profile");



formAuth.addEventListener("submit",auth);

function auth(event){
    event.preventDefault();

    let data = new FormData(formAuth);

    fetch("API/auth.php",{
        method: 'POST',
        body: data
    }).then((response)=>{
        return response.text();
    }).then((text)=>{
        if(text){
            output.innerHTML = "вы авторизованны";
            formAuth.style.display = "none";
        }else{
            let p = document.createElement("p");
            p.innerHTML = "ошибка авторизации";
            output.prepend(p);
        }
    })
}