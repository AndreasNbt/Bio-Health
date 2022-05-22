function deleteProduct(productIndex) {
    document.getElementById("product" + productIndex).remove()
}

function updateSearchKeys(search_key) {
    for (i = 0 ; i < document.getElementsByName("hidden_search_key").length ; i++) {
        console.log(i + 1)
        document.getElementsByName("hidden_search_key")[i].value = search_key;
    }
    console.log("New search key is: " + search_key);
}