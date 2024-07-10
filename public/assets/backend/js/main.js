// // search box show
// var search_box_show = document.getElementById("search_box_show");
// let search_box_card = document.getElementById("search_box_card");
// // let main_navbar = document.getElementById("main_navbar");

// // Define the onclick function
// function handleClick() {
//     setTimeout(function () {
//         search_box_card.classList.remove("d-none");
//     }, 500);
// }
// // Attach the onclick event listener
// search_box_show.addEventListener("click", handleClick);

// // // search box hide
// var search_box_hide = document.getElementById("search_box_hide");
// let search_box_card_show = document.getElementById("search_box_card");

// function handleHideClick() {
//     setTimeout(function () {
//         search_box_card_show.classList.add("d-none");
//     }, 300);
// }

// search_box_hide.addEventListener("click", handleHideClick);

function manuToggle()
{
    let sidebar = document.getElementById("sidebar");
    let content = document.getElementById("content");
    sidebar.classList.toggle("d-none");
    sidebar.classList.toggle("col-sm-2");
    sidebar.classList.toggle("col-3");
    sidebar.classList.toggle("col-0");
    content.classList.toggle('col-md-9');
    content.classList.toggle('col-sm-10');
    content.classList.toggle('col-9');
    content.classList.toggle('col-12');
    content.classList.toggle('col-md-12');
}
