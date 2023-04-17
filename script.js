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

