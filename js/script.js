function checkData() {

    let value = $("#x").val().replace(/,/g, '.');

    if (!$.isNumeric(value) && value != "-" && value != "") {
        $("#x").val("");
        $("#wrongXAlert").stop(true, true).fadeIn( 200 ).delay( 1000 ).fadeOut( 200 );
    }

    if ((-3 > value) || (value > 3)) {
        $("#x").val("");
        $("#wrongXAlert").stop(true, true).fadeIn( 200 ).delay( 1000 ).fadeOut( 200 );
    }
}

// function checkFields() {
//     let value = $("#x").val().replace(/,/g, '.');
//     let correctFields = true;
//     if (value.length === 0) {
//         correctFields = false;
//     }

//     if (!($('input[type="radio"]').is(":checked") || $('#y option').is(":selected"))) {
//         correctFields = false;
//     }

//     if (!$("#r").val()) {
//         correctFields = false;
//     }

//     if (correctFields) {
//         $("#x").val(value);
//         $('.mainTable').addClass("zoomOut");
//     } else {
//         event.preventDefault();
//         $('#wrongInputAlert').stop(true, true).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
//     }
// }

function histBtnPressed() {
    $(".arrow-icon").toggleClass("open");
    if($("#histWrap").hasClass("active")) {
        hideTable();
    } else {
        showTable();
    }
}

function showTable() {
    
    let rows = getHistory();

    if(rows.length == 0) {
        $('#histMessage').stop(true,true).fadeIn( 300 ).delay( 1000 ).fadeOut( 300 );
        return;
    }
    $(".extendBtn").toggleClass("active");
    $("#historyTableBody").html(rows.join(""));
    $("#histWrap").toggleClass("active");
}

function hideTable() {
    $(".extendBtn").toggleClass('active');
    $("#histWrap").toggleClass("active");
    $('#dot').stop(true,true).fadeOut();
    $('#arrow').stop(true,true).fadeOut();
}

function equal(obj, newObj) {
    return (obj.x === newObj.x) && (obj.y === newObj.y) && (obj.r === newObj.r) && (obj.result === newObj.result);
}

function save(x, y, r, result) {
    let obj = {
        x: x,
        y: y,
        r: r,
        result: result
    };
    //console.log(obj);
    let allData = [];
    if (sessionStorage.userData) {
        previousObjs = sessionStorage.getItem('userData');
        allData.push(previousObjs);
        let rxp = /{([^}]+)}/g;
        let curMatch;
        while (curMatch = rxp.exec(allData)) {
            if(equal(JSON.parse("{" + curMatch[1] + "}"), obj)) return;
        }
        allData.push(JSON.stringify(obj));
        sessionStorage.setItem('userData', allData);
    } else {
        allData.push(obj);
        sessionStorage.setItem('userData', JSON.stringify(obj));
    }
}

function getHistory() {
    let rxp = /{([^}]+)}/g;
    let curMatch;
    let rows = [], j = 0;
    if (sessionStorage.userData) {
        userAttempts = sessionStorage.getItem('userData');
        while (curMatch = rxp.exec(userAttempts)) {
                        obj = JSON.parse("{" + curMatch[1] + "}");
                        let x = obj.x.toString().replace(".", ",").length > 15 ?
                            (obj.x.toString().replace(".", ",").substring(0, 15) + "…") :
                            obj.x.toString().replace(".", ",");
                        let y = obj.y.toString().replace(".", ",").length > 15 ?
                            (obj.y.toString().replace(".", ",").substring(0, 15) + "…") :
                            obj.y.toString().replace(".", ",");
                        let r = obj.r.toString().replace(".", ",").length > 15 ?
                            (obj.r.toString().replace(".", ",").substring(0, 15) + "…") :
                            obj.r.toString().replace(".", ",");
                        rows[j++] = '<tr height="30px"><td width="130px" >';
                        rows[j++] = '<span title=\"' + obj.x.toString() + '\"' + '>' + x + '</span>';
                        rows[j++] = '</td><td width="130px" >';
                        rows[j++] = '<span title=\"' + obj.y.toString() + '\"' + '>' + y + '</span>';
                        rows[j++] = '</td><td width="130px" >';
                        rows[j++] = '<span title=\"' + obj.r.toString() + '\"' + '>' + r + '</span>';
                        rows[j++] = '</td><td width="130px" >';
                        rows[j++] = obj.result.toString() == "true" ? '<span style="color:#008000;text-align:center;">Попадание</span>' : '<span style="color:#B22222;text-align:center;">Промах</span>';
                        rows[j++] = '</td></tr>';
        }
    }
    return rows;
}

function clearHist() {
    sessionStorage.clear();
    hideTable();
}

function setTime() {
    $("#time").html(new Date().toLocaleTimeString());
}

function okPressed() {
    $('.mainTable').addClass("zoomOut");
}

function setDotCoordResponse() {
    let xField = document.getElementById("xField");
    let yField = document.getElementById("yField");
    let rField = document.getElementById("rField");
    
    if(!($("#xField").length && $("#yField").length && $("#rField").length)) return;
    let x = parseFloat($("#xField").attr("title"));
    let y = parseFloat($("#yField").attr("title"));
    let r = parseFloat($("#rField").attr("title"));
    let result = $('#resultField').text() == "попадание";
    showDot(x, y, r, result);
}

function makeRowsClickable() {
    let table = document.getElementById("historyTableBody");
    for (let i = 0, row; row = table.rows[i]; i++) {
        row.setAttribute("onclick", "rowClicked(this);");
    }
}


function rowClicked(row) {
    let children = row.children;
    let x = parseFloat(children[0].firstChild.title);
    let y = parseFloat(children[1].firstChild.title);
    let r = parseFloat(children[2].firstChild.title);
    let result = children[3].firstChild.innerHTML.toString() == "Попадание";
    showDot(x, y, r, result);
}

function showDot(x, y, r, result) {
    let realX = 100 + 70 * (x/r);
    let realY = 100 - 70 * (y/r);
    //console.log(x, y);
    if(realX < 0 || realY < 0 || realX > 200 || realY > 200) {
        $('#dot').stop(true,true).fadeOut();
        $('#arrow').stop(true,true).fadeOut()
        .attr("transform", getTransform(x, y, realX, realY))
        .stop(true,true).fadeIn();
    } else {
        $('#dot').stop(true,true).fadeOut()
        .attr("cx", realX).attr("cy", realY)
        .attr("fill", result ? "green" : "red")
        .stop(true, true).fadeIn();
        $('#arrow').stop(true,true).fadeOut();
    }
}

class Point {
    constructor(x, y) {
        this.x = x;
        this.y = y;
    }
}

class Line {
    constructor(x1, y1, x2, y2) {
        this.x1 = x1;
        this.y1 = y1;
        this.x2 = x2;
        this.y2 = y2;
        if(x1 != x2) {
        this.k = (y2-y1)/(x2-x1);
        } else this.k = 0;
        if(x1 != x2) {
        this.b = (x2*y1 - x1*y2)/(x2 - x1);
        } else this.b = 0;
    }

    intersect(other) {
        if(other.x1==other.x2) {
            return(new Point(other.x1, this.k == 0 ? 100 : this.k*other.x1+this.b))
        } else if (other.y1==other.y2) {
            return(new Point(this.k == 0 ? 100 : (other.y1-this.b)/this.k, other.y1));
        } else return(new Point(0,0));
    }
}

class Transform {
    constructor(x, y, rot) {
        this.x = x;
        this.y = y;
        this.rot = rot;
    }

    setPoint(point) {
        this.x = point.x;
        this.y = point.y;
    }

    toString() {
        return "translate(" + this.x + ", " + this.y + ") rotate(" + this.rot + ")";
    }
}

function getTransform(x, y, realX, realY) {
    let result = new Transform(100, 100, 0);
    let line = new Line(100, 100, realX, realY);
    let angleLine = new Line(0, 0, x, y);
    let atan = Math.atan2(y, x);
    let degree = atan * 180/Math.PI;
    if(x == 100) degree = realY < 0 ? 90 : 270;
    result.rot = 180 - degree;
    if(degree >= 135 || degree <= -135) {
        result.setPoint(line.intersect(new Line(0,0,0,200))); //left
    }
    else if(degree >= 45 && degree <= 135) {
        result.setPoint(line.intersect(new Line(0,0,200,0))); //up
    }
    else if(degree <= 45 && degree >= -45) {
        result.setPoint(line.intersect(new Line(200,0,200,200))); //right
    }
    else if(degree >= -135 && degree <= -45) {
        result.setPoint(line.intersect(new Line(0,200,200,200))); //down
    }
    return result.toString();
}