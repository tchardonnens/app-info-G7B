var tabs = document.getElementById("tabs");
var contents = document.getElementById("contents");


function cleanSelection(){
  tabs.getElementsByClassName("selected")[0].classList.remove("selected");
  contents.getElementsByClassName("visual")[0].classList.remove("visual");
}

tabs.addEventListener("click", function(event){
  var tabClicked = event.target.id;
  var itemSelected = tabClicked.substring(tabClicked.lastIndexOf("_"));

  cleanSelection();

  event.target.parentElement.classList.add("selected");

  contents.querySelector("#content"+ itemSelected).classList.add("visual");
});