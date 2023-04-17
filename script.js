const formInsert = document.getElementById("form-insert-students");
const msg = document.querySelector(".message");
const contat = document.querySelector(".content");

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

