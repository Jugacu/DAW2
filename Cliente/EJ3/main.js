// ej 1
const par = (number) => {
    for (let i = 0; i < number; i++) {
        if (i % 2 === 0) {
            console.log(i);
        }
    }
};
par(10);

// ej 2
const mediaType = Object.freeze({
    "ALL": 0,
    "EVEN": 1,
    "ODD": 2,
});

const media = (number, type = mediaType.ALL) => {
    let sum = 0;
    for (let i = 0; i < number; i++) {
        switch (type) {
            case mediaType.ALL:
                sum++;
                break;
            case mediaType.EVEN:
                if (i % 2 === 0) {
                    sum++;
                }
                break;
            case mediaType.ODD:
                if (i % 2 !== 0) {
                    sum++;
                }
                break;
        }

    }
    console.log(sum / number);
};
media(1, mediaType.EVEN);

// ej 3
const multiply = (number) => {
    for (let i = 0; i <= 10; i++) {
        console.log(`${number} * ${i} = ${number * i}`)
    }
};
multiply(2);

// ej 4
const decToBinary = (number) => {
    console.log(
        parseInt(number, 10).toString(2)
    )
};
decToBinary(10);

//ej 5
const dectToHex = (number) => {
    console.log(
        parseInt(number, 10).toString(16).toUpperCase()
    )
};
dectToHex(1);

//ej 6
const power = (number, exponent) => {
    let sum = number;
    for (let i = 1; i < exponent; i++) {
        sum *= number;
    }
    console.log(sum);
};
power(2, 2);

// ej 7
const isPrime = (number) => {
    let prime = true;
    for (let i = 2; i <= Math.sqrt(number); i++) {
        if (number % i === 0) {
            prime = false;
            break;
        }
    }
    return prime && (number > 1);
};

console.log(isPrime(413));

// ej 8
const leftPyramid = (number) => {
    let content = "<p>";
    for (let i = 1; i <= number; i++) {
        for (let j = 1; j <= number; j++) {
            content += (j <= i) ? i : '*';
        }
        content += "<br>";
    }

    content += "</p>";
    document.body.innerHTML = document.body.innerHTML + '<br>' + content;
};
leftPyramid(5);

// ej 9
const pyramid = (number) => {
    let content = "<p>";
    for (let i = 0; i < number; i++) {
        for (let j = 1; j <= number; j++) {
            if (j === number - i) {
                for (let k = 0; k < i * 2 + 1; k++) {
                    content += i;
                }
                break;
            } else {
                content += "&nbsp;&nbsp;";
            }
        }
        content += "<br>";
    }

    content += "</p>";
    document.body.innerHTML = document.body.innerHTML + '<br>' + content;
};

pyramid(5);

// 10
const invertedPyramid = (number) => {
    let content = "<p>";
    for (let i = number; i >= 0; i--) {
        for (let j = number - 1; j >= 0; j--) {
            if (j === number - i) {
                for (let k = i * 2 + 1; k >= 0; k--) {
                    content += i;
                }
                break;
            } else {
                content += "&nbsp;&nbsp;";
            }
        }
        content += "<br>";
    }

    content += "</p>";
    document.body.innerHTML = document.body.innerHTML + '<br>' + content;
};
invertedPyramid(7);