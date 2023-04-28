const formAuth = document.getElementById("form-auth");
const output = document.querySelector(".profile");



formAuth.addEventListener("submit",auth);

function auth(event){
    event.preventDefault();

    let data = new FormData(formAuth);

    fetch("API/auth.php",{
        method: 'POST',
        'Content-Type':'application/json',
        body: data
    }).then((response)=>{
        return response.json();
    }).then((json)=>{
        console.log(json);
        if(json.status){
            output.innerHTML = "вы авторизованны как " + json.name;
            formAuth.style.display = "none";
        }else{
            let p = document.createElement("p");
            p.innerHTML = "ошибка авторизации";
            output.prepend(p);
        }
    })
}