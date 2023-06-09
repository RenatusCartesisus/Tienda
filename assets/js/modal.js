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
        console.log(document.getElementById('file').value);
    });
});

const filldata1 = (data)=>{
    let count = 0;
    //let nombre = inputs[4].src;
    for(let i of inputs){
       
            if(data[count].textContent.indexOf("$")==0){
                data[count].textContent = data[count].textContent.replace('$', '');
                i.value=data[count].textContent;
            }
            else{
                i.value=data[count].textContent;
            }
            if(i.src){
                let directorio = i.src;
                // console.log(directorio.toUpperCase());
                if(directorio=="http://localhost/proyecto2/crud.php#"||directorio.includes("/img")){
                //  console.log(data[count].firstChild.src);
                 i.src=data[count].firstChild.src;
                 i.style.width="100%";
                //  break;
                }
            }
            count++;
            console.log(i.value);
        }
        // else{

        // }
    // }
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