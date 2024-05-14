var globalVar = "I am a global variable";
function myFunction() {
    console.log(globalVar); // This will log "I am a global variable"
}
myFunction();
console.log(globalVar); // This will also log "I am a global variable"
