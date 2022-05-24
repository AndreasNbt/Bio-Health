var collection = document.getElementsByClassName("category_name");


for (let i = 0; i < collection.length;i++) {
    collection[i].addEventListener("click", function () {
        document.getElementById("product_category").setAttribute("value", collection[i].textContent);
    })
}



function openForm() {
    document.getElementById("category-form").style.display = "block";
    document.getElementById("add").style.display = "none";
}
  
function closeForm() {
    document.getElementById("category-form").style.display = "none";
    document.getElementById("add").style.display = "block";
}
  
