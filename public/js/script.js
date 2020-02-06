/*const cards = document.querySelectorAll('.card');
const btntriDesc = document.querySelector('#tri-desc')
const btntriAsc = document.querySelector('#tri-asc')

btntriDesc.addEventListener('click', clicDesc)
function clicDesc(){
    for (card of cards){
        let indexCard = this.dataset.index;
        // card.style.order=indexCard
        console.log(indexCard)
    }

}*/

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
