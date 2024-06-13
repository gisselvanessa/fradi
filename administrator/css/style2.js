
function menu(){
  var option=document.querySelector( ".menuppal" ).classList.toggle("is_active");
  var option2=document.querySelector(".hamburger2").classList.toggle("is-active");
// console.log('click');
// console.log(id);
// console.log(option);
// console.log(option2);
}
window.addEventListener('click', function(e) {
/*2. Si el div con id clickbox contiene a e. target*/
if (document.getElementById('menuside').contains(e.target)) {
  // console.log(e.target);
  // console.log("Clicked in Box");

} else {
  // console.log("Clicked outside Box");
  var option=document.querySelector( ".menuppal" ).classList.remove("is_active");
  var option=document.querySelector( ".hamburger2" ).classList.remove("is-active");

  // console.log(e.target);
}
})