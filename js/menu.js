let changeMenuClass = document.getElementById("menu-section");
let changeLunchClass = document.getElementById("lunch-section");
let changeDinerClass = document.getElementById("diner-section");
let changeDrankClass = document.getElementById("drank-section");
let changeCocktailsClass = document.getElementById("cocktails-section");

let activateMenu = document.getElementById("menu");
let activateLunch = document.getElementById("lunch");
let activateDiner = document.getElementById("diner");
let activateDrank = document.getElementById("drank");
let activateCocktails = document.getElementById("cocktails");

let menuEnabled = false;
let lunchEnabled = false;
let dinerEnabled = false;
let drankEnabled = false;
let cocktailsEnabled = false;

document.getElementById("menu").onclick = () => {
    if (menuEnabled === false) {
        menuEnabled = true;
        lunchEnabled = false;
        dinerEnabled = false;
        drankEnabled = false;
        cocktailsEnabled = false;
    } else {
        menuEnabled = false;
        lunchEnabled = false;
        dinerEnabled = false;
        drankEnabled = false;
        cocktailsEnabled = false;
    }
    if (menuEnabled === false) {
        changeMenuClass.classList.replace("menu-off", "menu-on")
        changeLunchClass.classList.replace("menu-on", "menu-off")
        changeDinerClass.classList.replace("menu-on", "menu-off")
        changeDrankClass.classList.replace("menu-on", "menu-off")
        changeCocktailsClass.classList.replace("menu-on", "menu-off")
    }
    if (menuEnabled === true) {
        changeMenuClass.classList.replace("menu-off", "menu-on")
        changeLunchClass.classList.replace("menu-on", "menu-off")
        changeDinerClass.classList.replace("menu-on", "menu-off")
        changeDrankClass.classList.replace("menu-on", "menu-off")
        changeCocktailsClass.classList.replace("menu-on", "menu-off")
        activateMenu.classList.add("is-active")
        activateLunch.classList.remove("is-active")
        activateDiner.classList.remove("is-active")
        activateDrank.classList.remove("is-active")
        activateCocktails.classList.remove("is-active")
    }
}

document.getElementById("lunch").onclick = () => {
    if (lunchEnabled === false) {
        menuEnabled = false;
        lunchEnabled = true;
        dinerEnabled = false;
        drankEnabled = false;
        cocktailsEnabled = false;
    } else {
        menuEnabled = false;
        lunchEnabled = false;
        dinerEnabled = false;
        drankEnabled = false;
        cocktailsEnabled = false;
    }
    if (lunchEnabled === false) {
        changeMenuClass.classList.replace("menu-off", "menu-on")
        changeLunchClass.classList.replace("menu-on", "menu-off")
        changeDinerClass.classList.replace("menu-on", "menu-off")
        changeDrankClass.classList.replace("menu-on", "menu-off")
        changeCocktailsClass.classList.replace("menu-on", "menu-off")
        activateMenu.classList.add("is-active")
        activateLunch.classList.remove("is-active")
        activateDiner.classList.remove("is-active")
        activateDrank.classList.remove("is-active")
        activateCocktails.classList.remove("is-active")
    }
    if (lunchEnabled === true) {
        changeLunchClass.classList.replace("menu-off", "menu-on")
        changeMenuClass.classList.replace("menu-on", "menu-off")
        changeDinerClass.classList.replace("menu-on", "menu-off")
        changeDrankClass.classList.replace("menu-on", "menu-off")
        changeCocktailsClass.classList.replace("menu-on", "menu-off")
        activateLunch.classList.add("is-active")
        activateMenu.classList.remove("is-active")
        activateDiner.classList.remove("is-active")
        activateDrank.classList.remove("is-active")
        activateCocktails.classList.remove("is-active")
    }
}

document.getElementById("diner").onclick = () => {
    if (dinerEnabled === false) {
        menuEnabled = false;
        lunchEnabled = false;
        dinerEnabled = true;
        drankEnabled = false;
        cocktailsEnabled = false;
    } else {
        menuEnabled = false;
        lunchEnabled = false;
        dinerEnabled = false;
        drankEnabled = false;
        cocktailsEnabled = false;
    }
    if (dinerEnabled === false) {
        changeMenuClass.classList.replace("menu-off", "menu-on")
        changeLunchClass.classList.replace("menu-on", "menu-off")
        changeDinerClass.classList.replace("menu-on", "menu-off")
        changeDrankClass.classList.replace("menu-on", "menu-off")
        changeCocktailsClass.classList.replace("menu-on", "menu-off")
        activateMenu.classList.add("is-active")
        activateLunch.classList.remove("is-active")
        activateDiner.classList.remove("is-active")
        activateDrank.classList.remove("is-active")
        activateCocktails.classList.remove("is-active")
    }
    if (dinerEnabled === true) {
        changeDinerClass.classList.replace("menu-off", "menu-on")
        changeMenuClass.classList.replace("menu-on", "menu-off")
        changeLunchClass.classList.replace("menu-on", "menu-off")
        changeDrankClass.classList.replace("menu-on", "menu-off")
        changeCocktailsClass.classList.replace("menu-on", "menu-off")
        activateDiner.classList.add("is-active")
        activateMenu.classList.remove("is-active")
        activateLunch.classList.remove("is-active")
        activateDrank.classList.remove("is-active")
        activateCocktails.classList.remove("is-active")
    }
}

document.getElementById("drank").onclick = () => {
    if (drankEnabled === false) {
        menuEnabled = false;
        lunchEnabled = false;
        dinerEnabled = false;
        drankEnabled = true;
        cocktailsEnabled = false;
    } else {
        menuEnabled = false;
        lunchEnabled = false;
        dinerEnabled = false;
        drankEnabled = false;
        cocktailsEnabled = false;
    }
    if (drankEnabled === false) {
        changeMenuClass.classList.replace("menu-off", "menu-on")
        changeLunchClass.classList.replace("menu-on", "menu-off")
        changeDinerClass.classList.replace("menu-on", "menu-off")
        changeDrankClass.classList.replace("menu-on", "menu-off")
        changeCocktailsClass.classList.replace("menu-on", "menu-off")
        activateMenu.classList.add("is-active")
        activateLunch.classList.remove("is-active")
        activateDiner.classList.remove("is-active")
        activateDrank.classList.remove("is-active")
        activateCocktails.classList.remove("is-active")
    }
    if (drankEnabled === true) {
        changeDrankClass.classList.replace("menu-off", "menu-on")
        changeMenuClass.classList.replace("menu-on", "menu-off")
        changeDinerClass.classList.replace("menu-on", "menu-off")
        changeLunchClass.classList.replace("menu-on", "menu-off")
        changeCocktailsClass.classList.replace("menu-on", "menu-off")
        activateDrank.classList.add("is-active")
        activateMenu.classList.remove("is-active")
        activateDiner.classList.remove("is-active")
        activateLunch.classList.remove("is-active")
        activateCocktails.classList.remove("is-active")
    }
}

document.getElementById("cocktails").onclick = () => {
    if (cocktailsEnabled === false) {
        menuEnabled = false;
        lunchEnabled = false;
        dinerEnabled = false;
        drankEnabled = false;
        cocktailsEnabled = true;
    } else {
        menuEnabled = false;
        lunchEnabled = false;
        dinerEnabled = false;
        drankEnabled = false;
        cocktailsEnabled = false;
    }
    if (cocktailsEnabled === false) {
        changeMenuClass.classList.replace("menu-off", "menu-on")
        changeLunchClass.classList.replace("menu-on", "menu-off")
        changeDinerClass.classList.replace("menu-on", "menu-off")
        changeDrankClass.classList.replace("menu-on", "menu-off")
        changeCocktailsClass.classList.replace("menu-on", "menu-off")
        activateMenu.classList.add("is-active")
        activateLunch.classList.remove("is-active")
        activateDiner.classList.remove("is-active")
        activateDrank.classList.remove("is-active")
        activateCocktails.classList.remove("is-active")
    }
    if (cocktailsEnabled === true) {
        changeCocktailsClass.classList.replace("menu-off", "menu-on")
        changeMenuClass.classList.replace("menu-on", "menu-off")
        changeDinerClass.classList.replace("menu-on", "menu-off")
        changeDrankClass.classList.replace("menu-on", "menu-off")
        changeLunchClass.classList.replace("menu-on", "menu-off")
        activateCocktails.classList.add("is-active")
        activateMenu.classList.remove("is-active")
        activateDiner.classList.remove("is-active")
        activateDrank.classList.remove("is-active")
        activateLunch.classList.remove("is-active")
    }
}