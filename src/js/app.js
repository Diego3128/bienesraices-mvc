document.addEventListener('DOMContentLoaded', function () {
    eventListeners();
    userPreferences();
});


function userPreferences() {
    // check if the user has already declare a mode, otherwise use their system preferences
    if (localStorage.getItem('colorMode')) {
        const colorMode = localStorage.getItem('colorMode');
        document.body.classList.add(colorMode);
        return;
    }

    const changeMode = (e) => {
        //console.log(e);//MediaQueryListEvent
        if (e.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
            document.body.classList.add('light-mode');
        }
    }
    // check system preferences
    const darkModeQuery = window.matchMedia('(prefers-color-scheme: dark)');
    darkModeQuery.addEventListener('change', changeMode);
    // call right away to check the current state || if it matches dark then apply the style
    changeMode(darkModeQuery);
}

function darkMode() {
    // toggle class 'dark-mode' to the body element
    document.body.classList.toggle('dark-mode');
    //save the setting in the locol storage to future check with userPreferences function..
    localStorage.setItem('colorMode', document.body.classList.contains('dark-mode') ? 'dark-mode' : 'light-mode');
}

function burguerMenu() {
    const navigation = document.querySelector('.bar .navigation');
    const burguerMenuElement = document.querySelector('.burguer-icon');

    navigation.classList.toggle('show')
    burguerMenuElement.classList.toggle('rotate');
}
function createInput(e) {
    //check value of input radio seleteted
    const element = e.target;

    if (element.type === "radio") {
        const value = element.value;
        //container
        const container = document.querySelector(".contact-method");
        //new input
        let div = document.createElement("div");
        div.setAttribute("id", "defaultContact");
        //delete previous input
        const previousInput = document.getElementById("defaultContact") || null;
        const fields = document.getElementById("fields") || null;
        if (previousInput) previousInput.remove();
        if (fields) fields.remove();
        //create new input
        if (value === "telefono") {
            let fields = document.createElement('div');
            fields.setAttribute("id", "fields");
            fields.innerHTML = `
                <p>Eija la hora y fecha para la llamada:</p>
                <div>
                    <label for=" fecha">Fecha</label>
                    <input type="date" id="fecha" name="contacto[fecha]">
                </div>
                <div>
                    <label for="hora">Hora</label>
                    <input type="time" id="hora" value="13:00" min="09:00" max="18:00" name="contacto[hora]">
                </div>`;

            div.innerHTML = `<label for="telefono">Telefono</label>
            <input type="tel" placeholder="Tu Telefono" id="telefono" name="contacto[telefono]" maxlength="10">`;

            container.after(fields);
        }

        if (value === "e-mail") {
            div.innerHTML = `<label for="email">E-mail</label>
                    <input type="email" placeholder="Tu E-mail" id="email" name="contacto[email]" maxlength="50" required>`;
        }
        //append new input
        container.append(div);

    }

}
function eventListeners() {

    try {
        const mobileMenu = document.querySelector('.mobile-menu');
        const darkModeIcon = document.querySelector('.dark-mode-btn');

        const radioContainer = document.querySelector(".contact-method");

        mobileMenu.addEventListener('click', burguerMenu);
        darkModeIcon.addEventListener('click', darkMode);
        radioContainer.addEventListener('change', createInput);

    } catch (e) {
        //in some pages some elements won't be available
    }
}