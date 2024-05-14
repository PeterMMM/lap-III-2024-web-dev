function myFunction() {
    if (true) {
        var functionVar = "I am a function-scoped variable";
        let blockVar = "I am a block-scoped variable";
        const constVar = "I am also a block-scoped variable";
    }
    console.log(functionVar); // This will log "I am a function-scoped variable"
    // console.log(blockVar); // This will throw an error because blockVar is not defined in this scope
    // console.log(constVar); // This will throw an error because blockVar is not defined in this scope
}
myFunction();
