window.onload = () => {
    reloj();
    setInterval(weather(), 72000);
}
function reloj() {
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()
    if (hora < 10) {
        hora = "0" + hora;
    }
    if (minuto < 10) {
        minuto = "0" + minuto;
    }
    if (segundo < 10) {
        segundo = "0" + segundo;
    }
    horaImprimible = hora + " : " + minuto + " : " + segundo;

    document.getElementById('time').value = horaImprimible;
    setTimeout("reloj()", 1000)
}
function weather() {
    const APIKEY = "5Ac0485P8wt94XeEc2xaSiOjN4BtzQKj";
    const cityKey = "305482";
    const URL = "https://dataservice.accuweather.com/currentconditions/v1/" + cityKey + "?apikey=" + APIKEY;
    $.ajax({
        url: URL,
        type: 'GET',
        success: function (response) {
            let temp = response[0].Temperature.Metric.Value;
            let icon = response[0].WeatherIcon;
            if (document.getElementById('icon') === null) {
                document.getElementById('icon-admin').setAttribute('src', getUrl()+'/img/weather/' + icon + "-s.png");
                document.getElementById('temp-admin').innerHTML = temp + "&#176;C";
                document.getElementById('temp-text').innerText = response[0].WeatherText;
            } else {
                document.getElementById('icon').setAttribute('src', getUrl()+'img/weather/' + icon + "-s.png");
                document.getElementById('temp').value = temp + "C";
            }
        }
    });
}
// function getUrl() {
//     return 'http://localhost/biblioteca/'
// }
function getUrl() {
    return 'https://remotehost.es/student33/dwes/'
}