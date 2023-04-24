const formInsert = document.getElementById("form-insert-students");
const formInsertGroup = document.getElementById("form-insert-group");
const msg = document.querySelector(".message");
const contat = document.querySelector(".content");



formInsertGroup.addEventListener("submit",(event)=>{
    event.preventDefault();
    let formDataGroup = new FormData(formInsertGroup);

    let xhrg = new XMLHttpRequest();
    xhrg.open("POST","insertGroup.php");
    xhrg.send(formDataGroup);
    xhrg.onload = ()=>{
        if(xhrg.response == "ок"){
            msg.innerHTML="группа добавленна!";
            msg.classList.add("success");
            msg.classList.add("showmessage");

            let div = document.createElement("div");
            let title = formDataGroup.get("title");
            div.innerHTML = `${title}`;
            contat.append(div);
        }else{
            msg.innerHTML = "Ошибка";
            msg.classList.add("reject");
            msg.classList.add("showmessage"); 
        }
    };
});

formInsert.addEventListener("submit",(event)=>{
    event.preventDefault();
    let formData = new FormData(formInsert);

    let xhr = new XMLHttpRequest();
    xhr.open("POST","insert-student.php");
    xhr.send(formData);
    xhr.onload = ()=>{
        if(xhr.response == "ok)"){
            msg.innerHTML="студент добавлен!";
            msg.classList.add("success");
            msg.classList.add("showmessage");

            let div = document.createElement("div");
            let fname = formData.get("fname");
            let lname = formData.get("lname");
            let age = formData.get("age");
            let gender = formData.get("gender");
            div.innerHTML = `${lname},${fname},${gender},${age}`;
            contat.append(div);
        }else{
            msg.innerHTML="ошибка";
            msg.classList.add("reject");
            msg.classList.add("showmessage");
        }
    };
});

const btnsLike = document.querySelectorAll(".like");

function setLike(str1,str2){
    return function(event){
    let idStudent = event.target.closest(".student").dataset.id;
    
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "API/setLike.php?id=" + idStudent);

    xhr.onload = function(){
        if(xhr.response=='ok'){
            let num = +event.target.closest(".student").querySelector(".num-like").innerHTML;
            event.target.closest(".student").querySelector(".num-like").innerHTML = num + 1;        
            console.log(str1);
        }else{
            console.log(str2);
        }
            
    }
    xhr.send();
}
}

for(btn of btnsLike){
    btn.addEventListener("click", setLike("успешно","ошибка"));
}