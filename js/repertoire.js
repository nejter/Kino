var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;

var yyyy = today.getFullYear();
if (dd < 10) {
    dd = '0' + dd;
}
if (mm < 10) {
    mm = '0' + mm;
}
var today = yyyy + '-' + mm + '-' + dd;

document.getElementById('swarzedz').addEventListener('click', () => {
    document.getElementById('cities').value = 'Swarzędz'
})
document.getElementById('lubon').addEventListener('click', () => {
    document.getElementById('cities').value = 'Luboń'
})
document.getElementById('tarnowo').addEventListener('click', () => {
    document.getElementById('cities').value = 'Tarnowo Podgórne'
})
document.getElementById('poznan').addEventListener('click', () => {
    document.getElementById('cities').value = 'Poznań'
})
document.getElementById('performanceDate').flatpickr({
    minDate: today,
    allowInput: true
});

window.onload = () => {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "movieApi.php",
        success: function (data) {
            console.log(data);
            const results = data.results;
            $.ajax({
                type: "POST",
                url: "repertoire.php",
                data: { movies: results },
                success: function () {
                    console.log('movies: ' + JSON.stringify(results[0]))
    /*                 for (let i = 0; i < 2; i++) {
                        $("#div" + i).remove();
                        const div = document.createElement("div"),
                            bookBox = document.getElementById("bookBox"),
                            exampleBox = document.getElementById("exampleBox"),
                            photo = document.getElementById('photo'),
                            title = document.getElementById("title"),
                            price = document.getElementById("price"),
                            description = document.getElementById("description"),
                            buyButton = document.getElementById("buyButton");
                        const cookieParams = [];
                        cookieParams.push(bookArray[i].title, bookArray[i].price, bookArray[i].isbn13);
                        div.id = 'div' + i;
                        div.innerHTML = exampleBox.innerHTML;
                        div.className = "col-lg-4 col-md-6 mb-4";
                        photo.src = bookArray[i].image;
                        title.innerText = bookArray[i].title;
                        price.innerText = bookArray[i].price === "$0.00" ? "$10.00" : bookArray[i].price;
                        description.innerText = bookArray[i].subtitle;

                        buyButton.innerHTML = '<button type="submit" class="btn btn-primary" name="buyBook" id="buyBook" onclick="setCookies(\'' + cookieParams + '\')">Kup</button>';
                        bookBox.appendChild(div);
                    }
                    const div0 = document.getElementById("div0");
                    div0.setAttribute('style', 'display: none'); */
                }
            });
        }
    });
}