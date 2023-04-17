const formInsert = document.getElementById("form-insert-students");
formInsert.addEventListener("submit",(event)=>{
    event.preventDefault();
    let formData = new FormData(formInsert);
    let xhr = new XMLHttpRequest();
    xhr.open("POST","insert-student.php");
    xhr.send(formData);

    xhr.onload = ()=>{
        console.log(xhr.response)
    };
});
