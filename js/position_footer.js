//get height of the main HTML tag
const main = document.querySelector('main');
let main_height = main.clientHeight;

//get height of footer
const footer = document.querySelector('footer');
let footer_height = footer.clientHeight;

//get viewport height
let vp_height = window.innerHeight;

//checking if there is enough content in "main" to fill the viewport
if(main_height<vp_height){
    footer.setAttribute("style","position: absolute; bottom:0; width:100vw");
} else {
    footer.setAttribute("style","positon:relative; width:100vw");
}
