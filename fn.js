var localVar = "I am a outside variable";

function myFunction() {
    var localVar = "I am a local variable";
    console.log(localVar); // This will log "I am a local variable"
}
myFunction();
console.log(localVar); // This will throw an error because localVar is not defined outside the function

