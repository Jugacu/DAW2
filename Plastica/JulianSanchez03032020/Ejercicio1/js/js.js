/*
@author Julián Sánchez
@version Examen 3 de marzo 2020
 */

const canvas = document.querySelector('#canvas');
const ctx = canvas.getContext('2d');


const cX = ctx.canvas.width / 2;
const cY = ctx.canvas.height / 2;

const r = 40;

let i = 0;

function draw() {
    ctx.fillStyle = 'white';
    ctx.rect(0, 0, canvas.width, canvas.height);
    ctx.fill();


    //moñeco izq
    // body
    ctx.beginPath();
    ctx.fillStyle = '#ddd';
    ctx.moveTo(cX - 220, r);
    ctx.lineTo(cX - 220, cY);
    ctx.str = 20;
    ctx.stroke();

    //left leg
    ctx.beginPath();
    ctx.fillStyle = '#ddd';
    ctx.moveTo(cX - 220, cY);
    ctx.lineTo(cX - 40 - 220, cY + 80);
    ctx.str = 20;
    ctx.stroke();

    //right leg
    ctx.beginPath();
    ctx.fillStyle = '#ddd';
    ctx.moveTo(cX - 220, cY);
    ctx.lineTo(cX + 40 - 220, cY + 80);
    ctx.str = 20;
    ctx.stroke();

    // head
    ctx.beginPath();
    ctx.fillStyle = '#cc9';
    ctx.arc(cX - 220, r, r, 0, 2 * Math.PI);
    ctx.fill();


    if (i === 1) {
        //left arm
        ctx.beginPath();
        ctx.fillStyle = '#ddd';
        ctx.moveTo(cX - 220, r * 2 + 20);
        ctx.lineTo(cX + 40 - 220, r * 2 + 90);
        ctx.str = 20;
        ctx.stroke();

        //right arm
        ctx.beginPath();
        ctx.fillStyle = '#ddd';
        ctx.moveTo(cX - 220, r * 2 + 20);
        ctx.lineTo(cX - 40 - 220, r * 2 + 90);
        ctx.str = 20;
        ctx.stroke();
    } else {
        //left arm
        ctx.beginPath();
        ctx.fillStyle = '#ddd';
        ctx.moveTo(cX - 220, r * 2 + 20);
        ctx.lineTo(cX + 60 - 220, r * 2 - 60);
        ctx.str = 20;
        ctx.stroke();

        //right arm
        ctx.beginPath();
        ctx.fillStyle = '#ddd';
        ctx.moveTo(cX - 220, r * 2 + 20);
        ctx.lineTo(cX - 40 - 220, r * 2 + 90);
        ctx.str = 20;
        ctx.stroke();
    }


    //moñeco centro
    // body
    ctx.beginPath();
    ctx.fillStyle = '#ddd';
    ctx.moveTo(cX, r);
    ctx.lineTo(cX, cY);
    ctx.str = 20;
    ctx.stroke();

    //left leg
    ctx.beginPath();
    ctx.fillStyle = '#ddd';
    ctx.moveTo(cX, cY);
    ctx.lineTo(cX - 40, cY + 80);
    ctx.str = 20;
    ctx.stroke();

    //right leg
    ctx.beginPath();
    ctx.fillStyle = '#ddd';
    ctx.moveTo(cX, cY);
    ctx.lineTo(cX + 40, cY + 80);
    ctx.str = 20;
    ctx.stroke();

    // head
    ctx.beginPath();
    ctx.fillStyle = '#cc9';
    ctx.arc(cX, r, r, 0, 2 * Math.PI);
    ctx.fill();


    if (i === 0) {
        //left arm
        ctx.beginPath();
        ctx.fillStyle = '#ddd';
        ctx.moveTo(cX, r * 2 + 20);
        ctx.lineTo(cX + 40, r * 2 + 90);
        ctx.str = 20;
        ctx.stroke();

        //right arm
        ctx.beginPath();
        ctx.fillStyle = '#ddd';
        ctx.moveTo(cX, r * 2 + 20);
        ctx.lineTo(cX - 40, r * 2 + 90);
        ctx.str = 20;
        ctx.stroke();
    } else if (i === 1) {
        //left arm
        ctx.beginPath();
        ctx.fillStyle = '#ddd';
        ctx.moveTo(cX, r * 2 + 20);
        ctx.lineTo(cX + 60, r * 2 - 60);
        ctx.str = 20;
        ctx.stroke();

        //right arm
        ctx.beginPath();
        ctx.fillStyle = '#ddd';
        ctx.moveTo(cX, r * 2 + 20);
        ctx.lineTo(cX - 40, r * 2 + 90);
        ctx.str = 20;
        ctx.stroke();
    }

    // moñeco derecha
    // body
    ctx.beginPath();
    ctx.fillStyle = '#ddd';
    ctx.moveTo(cX + 220, r);
    ctx.lineTo(cX + 220, cY);
    ctx.str = 20;
    ctx.stroke();

    //left leg
    ctx.beginPath();
    ctx.fillStyle = '#ddd';
    ctx.moveTo(cX + 220, cY);
    ctx.lineTo(cX - 40 + 220, cY + 80);
    ctx.str = 20;
    ctx.stroke();

    //right leg
    ctx.beginPath();
    ctx.fillStyle = '#ddd';
    ctx.moveTo(cX + 220, cY);
    ctx.lineTo(cX + 40 + 220, cY + 80);
    ctx.str = 20;
    ctx.stroke();

    // head
    ctx.beginPath();
    ctx.fillStyle = '#cc9';
    ctx.arc(cX + 220, r, r, 0, 2 * Math.PI);
    ctx.fill();


    if (i === 1) {
        //left arm
        ctx.beginPath();
        ctx.fillStyle = '#ddd';
        ctx.moveTo(cX + 220, r * 2 + 20);
        ctx.lineTo(cX + 40 + 220, r * 2 + 90);
        ctx.str = 20;
        ctx.stroke();

        //right arm
        ctx.beginPath();
        ctx.fillStyle = '#ddd';
        ctx.moveTo(cX + 220, r * 2 + 20);
        ctx.lineTo(cX - 40 + 220, r * 2 + 90);
        ctx.str = 20;
        ctx.stroke();
    } else {
        //left arm
        ctx.beginPath();
        ctx.fillStyle = '#ddd';
        ctx.moveTo(cX + 220, r * 2 + 20);
        ctx.lineTo(cX + 60 + 220, r * 2 - 60);
        ctx.str = 20;
        ctx.stroke();

        //right arm
        ctx.beginPath();
        ctx.fillStyle = '#ddd';
        ctx.moveTo(cX + 220, r * 2 + 20);
        ctx.lineTo(cX - 40 + 220, r * 2 + 90);
        ctx.str = 20;
        ctx.stroke();
    }

    i++;

    if (i > 1) {
        i = 0;
    }

    setTimeout(draw, 500)
}

draw();

