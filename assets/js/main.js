const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const a = urlParams.get('a')
if (a !== null) alert(a);


function checkTextOnly(text, limit){
    if(/\d/.test(text)){
        alert('Contain number');
        return;
    }
    checkSymbol(text);
    checkLimit(text, limit);
}

function checkNumberOnly(text, limit){
    if(!/^\d+$/.test(text)){
        alert('Contain text');
        return;
    }
    checkSymbol(text);
    checkLimit(text, limit);
}

function checkSymbol(text){
    if(/\W/.test(text)){
        alert('Contain symbol');
        return;
    }
}

function checkLimit(text, limit){
    if(text.length>limit){
        alert('Above limit : ' + limit + ' Character');
        return;
    }
}

fetch("dummy.json")
    .then((response) => response.json())
    .then(displayBlog);

function displayBlog(data) {
    var i = 1;
    data.posts.forEach((post) => {
        const postElement = document.createElement("div");
        postElement.classList.add("col-12");
        postElement.classList.add("col-md-4");
        postElement.classList.add("card");
        postElement.classList.add("pricing");

        const divChildElement = document.createElement("div");
        divChildElement.classList.add("card-child");
        postElement.appendChild(divChildElement);

        const titleElement = document.createElement("h2");
        titleElement.textContent = post.title;
        divChildElement.appendChild(titleElement);

        const textElement = document.createElement("p");
        textElement.textContent = post.text.length > 150
        ? post.text.slice(0, 147) + "..."
        : post.text;

        divChildElement.appendChild(textElement);
        console.log(postElement);

        document.getElementById("content10").appendChild(postElement);
    });
}







function myFunction() {
    console.log("Hello World!");
 }
let intervalId = setInterval(myFunction, 5000);
clearInterval(intervalId);