const table = document.getElementById('table');
const modal = document.getElementById('modalId');
const inputs = document.querySelectorAll(".update");
const botones = document.querySelectorAll('.editar');

botones.forEach(editar => {
    editar.addEventListener("click", (e)=>{
        // console.log(e.target.parentElement.parentElement.children[4].firstChild.src);
        if(e.target.matches(".btn-primary")){
        // console.log(e.target.parentElement.parentElement);
        // console.log(e.target.parentElement.parentElement.children[1]);
        let data = e.target.parentElement.parentElement.children;
        filldata1(data); 
        }
        else if(e.target.matches(".fa-solid")){
            console.log(e.target.parentElement.parentElement);
            // console.log(e.target.parentElement.parentElement.children[1]);
            let data = e.target.parentElement.parentElement.parentElement.children;
            filldata1(data);   
        }
    });
});

const filldata1 = (data)=>{
    let count = 0;
    for(let i of inputs){
        count++;
        // console.log(data[count].firstChild.nodeName);
        // console.log(i.src);

        // console.log(i.src);

        // if(data[count].firstChild.nodeName==("IMG")){
        //     console.log("Hola");
        // }
        // if(i.src=="http://localhost/proyecto2/crud.php#"){
        // console.log("Aqui va el src");
        // }
        console.log(data[count].type);
        if(data[count].textContent.indexOf("$")==0){
            data[count].textContent = data[count].textContent.replace('$', '');
        }
        else if(i.src=="http://localhost/proyecto2/crud.php#"){
        //  console.log(data[count].firstChild.src);
         i.src=data[count].firstChild.src;
         i.style.width="100%";
        //  break;
        }
        // else{
        // }
        i.value=data[count].textContent;
    }
    // console.log(data.target);
}

// table.addEventListener("click", (e)=>{
// console.log(e.target.parentElement.parentElement.children);
//     if(e.target.parentElement.matches(".btn-primary")){
//         e.stopPropagation();
//         console.log(e.target.parentElement.parentElement.parentElement);
//         let data = e.target.parentElement.parentElement.children;
//         filldata(data); 
//     }
//     if()
// });