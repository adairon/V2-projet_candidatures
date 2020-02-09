const cardsDef = document.querySelectorAll('.cardDef')
const cardsDesc = document.querySelectorAll('.cardDesc')
const cardsAsc = document.querySelectorAll('.cardAsc')
const btntriDef = document.querySelector('#tri-def')
const btntriDesc = document.querySelector('#tri-desc')
const btntriAsc = document.querySelector('#tri-asc')
const titreBtn = document.querySelector('.titreBtn')

titreBtn.innerHTML ='Trier par date </br> '

btntriDesc.addEventListener('click', clicDesc)
function clicDesc(){

    for (cDef of cardsDef){
        cDef.style.display = "none"
    }
    for (cAsc of cardsAsc){
        cAsc.style.display = "none"
    }
    for (cDesc of cardsDesc){
        cDesc.style.display = "block"
    }
    titreBtn.innerHTML ='Tri : </br> les plus récentes'

}

btntriAsc.addEventListener('click', clicAsc)
function clicAsc(){

    for (cDef of cardsDef){
        cDef.style.display = "none"
    }
    for (cDesc of cardsDesc){
        cDesc.style.display = "none"
    }
    for (cAsc of cardsAsc){
        cAsc.style.display = "block"
    }
    titreBtn.innerHTML ='Tri : </br> les plus anciennes'
}

const navEtapes = document.querySelectorAll('.nav-etape')
const navToutes = document.querySelector('.nav-toutes')
const navEnv = document.querySelector('.nav-env')

// navToutes.classList.add('active')

if (location.pathname == "/candidatures/6"){
    navEnv.classList.add('active')
}

// if (window.location.href.indexOf('candidatures/6')>=0) {
//     navEnv.classList.add('active');
// }

