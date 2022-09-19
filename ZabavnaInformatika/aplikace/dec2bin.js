function dec2bin(dec) {
    return (dec >>> 0).toString(2);
}

console.log(dec2bin(62));
console.log(dec2bin(78));

console.log(dec2bin(79));
console.log(dec2bin(68));