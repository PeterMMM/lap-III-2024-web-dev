function outerFunction() {
    var outerVar = "I am from the outer function";
    function innerFunction() {
        console.log(outerVar); // This will log "I am from the outer function"
    }
    return innerFunction;
}
var closure = outerFunction();
closure(); // This will log "I am from the outer function" even though outerFunction has already finished executing

