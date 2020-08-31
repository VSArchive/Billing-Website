window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        document.getElementById("fab").style.color = "dodgerblue"
        document.getElementById("navbar").style.background = "#FFFFFF"
        document.getElementById("logo").style.color = "#00B4FF"
        document.getElementById("text").style.color = "#00FFFF"
    } else {
        document.getElementById("navbar").style.background = "transparent"
        document.getElementById("fab").style.color = "transparent"
    }
}

function home() {
    document.getElementById("about-n").classList.remove('active');
    document.getElementById("home-n").classList.add('active');
    document.getElementById("contact-n").classList.remove('active');
}

function about() {
    document.getElementById("about-n").classList.add('active');
    document.getElementById("home-n").classList.remove('active');
    document.getElementById("contact-n").classList.remove('active');
}

function contact() {
    document.getElementById("contact-n").classList.add('active');
    document.getElementById("about-n").classList.remove('active');
    document.getElementById("home-n").classList.remove('active');
}

function back(){
    window.history.back();
}

function updateSalePrice(){
    document.getElementById('sale_price').value = document.getElementById('price').value * document.getElementById('count').value
}