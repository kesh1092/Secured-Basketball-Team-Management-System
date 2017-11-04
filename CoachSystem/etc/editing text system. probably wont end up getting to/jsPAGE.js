var checklist = document.getElementById("checklist");

var items = checklist.querySelectorAll("li");
var inputs = checklist.querySelectorAll("input");

for (var i = 0; i < items.length; i++) {
  items[i].addEventListener("click", editItem);
  inputs[i].addEventListener("blur", updateItem);
  inputs[i].addEventListener("keypress", itemKeypress);
}

function editItem() {
  this.className = "edit";
  var input = this.querySelector("input");
  input.focus();
  input.setSelectionRange(0, input.value.length);
}

//called by 'inputs'
function updateItem() { //previousElementSibling refers to span
  this.previousElementSibling.innerHTML = this.value; 
  this.parentNode.className = ""; //refers to li's className "edits"
}                                 //this comes from
                          //items = checklist.querySelectorAll("li");

//event is the key that is pressed or mouse button clicked
function itemKeypress(event) { //provides updated fx when enter 
  if (event.which === 13) { //button is pressed on the input
    updateItem.call(this);
  }
}


/*
var y = 0;
while(y < 3) //or for
{
    console.log( colors[y]);
    y++;
}


for(var i=0; i < 3; i++) //or for
{
    console.log( 'hey now!', colors[i]);
}



var colors = ['blue', 'green', 'red'];
var array2 = ['blue', 'green', ['pink', 'red']];
var x = 33;

//colors.shift();
//colors.pop();
 
for(var i=0; i < 3; ++i) //or for
{
    console.log( 'hey now!', colors[i]);
}

 
function asdf()
{
    colors.forEach(function(value, index) {
    alert('I have ' +value+ ' color');
    });
    
    colors.forEach(function(value, index) {
    console.log(value, index); });     
}




*/