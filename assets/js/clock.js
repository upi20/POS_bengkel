function startTime() {
    let today = new Date();
    let Y = today.getFullYear();
    let M = today.getMonth();
    let d = today.getDate();
    let D = today.getDay();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();

    let checkTime = (i)=>{
        if (i < 10) {i = "0" + i}{
            return i;
        }  // add zero in front of numbers < 10
    }
    let checkDay = (i)=>{
        let day = '';
        switch (i) {
            case 0:
                day = 'Sun';
                break;
            case 1:
                day = 'Mon';
                break;
            case 2:
                day = 'Tue';
                break;
            case 3:
                day = 'Wed';
                break;
            case 4:
                day = 'Thu';
                break;
            case 5:
                day = 'Fri';
                break;
            case 6:
                day = 'Sat';
                break;

            default:
                day = 'undefined';
                break;
        }
        return day;
    }
    let checkMonth = (i)=>{
        let month = '';
        switch (i) {
            case 0:
                month = 'Jan';
                break;
            case 1:
                month = 'Feb';
                break;
            case 2:
                month = 'Mar';
                break;
            case 3:
                month = 'Apr';
                break;
            case 4:
                month = 'May';
                break;
            case 5:
                month = 'Jun';
                break;
            case 6:
                month = 'Jul';
                break;
            case 7:
                month = 'Aug';
                break;
            case 8:
                month = 'Sep';
                break;
            case 9:
                month = 'Oct';
                break;
            case 10:
                month = 'Nov';
                break;
            case 11:
                month = 'Dec';
                break;

            default:
                month = 'undefined';
                break;
        }
        return month;
    }

    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);

    D = checkDay(D);
    M = checkMonth(M);
    document.getElementById('clockTopbar').innerHTML = D+', '+d+' '+M+' '+Y +' '+ h + ":" + m + ":" + s;
    let t = setTimeout(startTime, 1000);
}
startTime();
