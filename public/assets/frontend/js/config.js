// let body = document.getElementById("body"),
// loaderBook = document.getElementById("loader-book"),
// topbar = document.getElementById("topbar"),
// navbar = document.getElementById("navbar"),
// mainContent = document.getElementById("main-content");
// var linkElement = document.getElementById('loaderLinkId');

// function showLoader()
// {
// }
// function hideLoader()
// {
//     body.classList.remove("loader-body");
//     loaderBook.classList.add("d-none");
//     linkElement.parentNode.removeChild(linkElement);
//     topbar.classList.remove("d-none");
//     navbar.classList.remove("d-none");
//     mainContent.classList.remove("d-none");
// }

function successToast(msg) 
{
    Toastify({
        gravity: "bottom",
        position: "center",
        text: msg,
        className: "mb-5",
        style: {
            background: "green"
        },
        // duration: 3000

    }).showToast();
}

function errorToast(msg) 
{
    Toastify({
        gravity: "bottom",
        position: "center",
        text: msg,
        className: "mb-5",
        style: {
            background: "red",
        },
        // duration: 3000

    }).showToast();
}