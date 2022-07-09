
let data;

function startGame(){
    $.ajax({
        method: "POST",
        url: 'logic.php',
        data: {

        },
        success: function () {
            clearField();
        }
    })
}

function clearField(){
    let btn;
    for (let i = 0; i < 3; i++){
        for (let j = 0; j < 3; j++){
            btn = document.getElementById(i.toString() + j.toString());
            btn.innerHTML = '';
        }
    }
}

function changeLvl(lvl){
    let text = document.getElementById("lvl");
    text.innerHTML = 'Level: ' + lvl;
}

function cageClick (field){
    let btn;
    for (let i = 0; i < 3; i++){
        for (let j = 0; j < 3; j++){
            if(field[i][j] === 1){
                btn = document.getElementById(i.toString() + j.toString());
                btn.innerHTML = 'x';
            }
            if(field[i][j] === 0){
                btn = document.getElementById(i.toString() + j.toString());
                btn.innerHTML = '0';
            }

        }
    }
}

function buttonClick (x, y) {

    $.ajax({
        method: "POST",
        url: 'functions.php',
        data: {
            'x': x,
            'y' : y
        },
        success: function (req) {
            data = JSON.parse(req);
            console.log(data);
            if(data === "draw"){
                $.ajax({
                    method: "POST",
                    url: 'level.php',
                    data: {
                        'changeLVL': 0,
                    },
                    success: function (req) {
                        data = JSON.parse(req);
                        console.log(data);
                        changeLvl(data);
                    }
                });
                alert("draw")
            }
            if(data === "win cross"){
                $.ajax({
                    method: "POST",
                    url: 'level.php',
                    data: {
                        'changeLVL': 1,
                    },
                    success: function (req) {
                        data = JSON.parse(req);
                        console.log(data);
                        changeLvl(data);
                    }

                });
                alert("win cross")
            }
            if(data === "win zero"){
                $.ajax({
                    method: "POST",
                    url: 'level.php',
                    data: {
                        'changeLVL': -1,
                    },
                    success: function (req) {
                        data = JSON.parse(req);
                        console.log(data);
                        changeLvl(data);
                    }

                });
                alert("win zero")
            }

            cageClick(data);
        }

    });



}



