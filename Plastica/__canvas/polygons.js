function seedOfLife(X, Y, R, side, id) {
    let c = document.getElementById(id);
    let ctx = c.getContext("2d");
    ctx.globalCompositeOperation = "xor";
    let x;
    let y;
    let rad = (Math.PI / 180) * (360 / side);
    for (let i = 0; i < side; i++) {
        ctx.beginPath();

        x = X + R * Math.cos(rad * i);
        y = Y + R * Math.sin(rad * i);
        ctx.arc(x, y, R, 0, Math.PI * 2);

        if (i % 2 == 0) {
            ctx.fillStyle = "blue";
        } else {
            ctx.fillStyle = "red";
        }

        ctx.fill();
        ctx.closePath();
    }
}

function star(X, Y, R, side, id, step) {
    let paso = step;
    let c = document.getElementById(id);
    let ctx = c.getContext("2d");
    ctx.beginPath();
    let x;
    let y;
    let estrella = side / step;
    let rad = 2 * Math.PI / estrella;
    for (let i = 0; i < side; i++) {
        x = X + R * Math.cos(rad * i);
        y = Y + R * Math.sin(rad * i);
        ctx.lineTo(x, y);
    }
    ctx.fillStyle = "#6ab150";
    ctx.strokeStyle = "black";
    ctx.lineWidth = 3;

    ctx.closePath();
    ctx.stroke();
    ctx.fill();
}

function polygon(X, Y, R, side, id) {
    let c = document.getElementById(id);
    let ctx = c.getContext("2d");
    ctx.beginPath();
    let x;
    let y;
    let rad = (Math.PI / 180) * (360 / side);
    for (let i = 0; i < side; i++) {
        x = X + R * Math.cos(rad * i);
        y = Y + R * Math.sin(rad * i);
        ctx.lineTo(x, y);
    }
    ctx.fillStyle = "#6ab150";
    ctx.strokeStyle = "black";
    ctx.lineWidth = 3;

    ctx.closePath();
    ctx.fill();
    ctx.stroke();

}