function tri(numbers, order) {
    if (order === "asc") {
        numbers.sort(function(a, b) {
            return a - b;
        });
    } else if (order === "desc") {
        numbers.sort(function(a, b) {
            return b - a;
        });
    }
    return numbers; 
}

console.log(tri([1, 3, 5, 8, 89, 23, 12, 2], "asc"));
console.log(tri([7, 5, 18, 16, 9, 88, 33], "desc"));