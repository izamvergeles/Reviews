let images = document.querySelectorAll(".myRemove");

console.log(images);
let arraySend = document.getElementById("delimages");
let deletedPictures = [];

images.forEach((index) =>{
    index.onclick = () =>{
        index.style.display = "none";
        let filename = index.src.replace(/^.*[\\\/]/, '');
        deletedPictures.push(filename);
        arraySend.value = deletedPictures;
        console.log(deletedPictures);
    }
});




//Usar el split en el controlador para hacer el array


