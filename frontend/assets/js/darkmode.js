
const themeSystem = document.getElementById("theme-system");
const themeLight = document.getElementById("theme-light");
const themeDark = document.getElementById("theme-dark");

const themeSystemMobile = document.getElementById("theme-system-mobile");
const themeLightMobile = document.getElementById("theme-light-mobile");
const themeDarkMobile = document.getElementById("theme-dark-mobile");

const html = document.documentElement;

function setTheme(theme){
    if(theme === "dark"){
        html.classList.add("dark");
        localStorage.setItem("theme","dark");
    }

    if(theme === "light"){
        html.classList.remove("dark");
        localStorage.setItem("theme","light");
    }

    if(theme === "system"){
        localStorage.removeItem("theme");

        if(window.matchMedia("(prefers-color-scheme: dark)").matches){
            html.classList.add("dark");
        }else{
            html.classList.remove("dark");
        }
    }
}

themeDark?.addEventListener("click", () => setTheme("dark"));
themeLight?.addEventListener("click", () => setTheme("light"));
themeSystem?.addEventListener("click", () => setTheme("system"));

themeDarkMobile?.addEventListener("click", () => setTheme("dark"));
themeLightMobile?.addEventListener("click", () => setTheme("light"));
themeSystemMobile?.addEventListener("click", () => setTheme("system"));

const savedTheme = localStorage.getItem("theme");

if(savedTheme){
    setTheme(savedTheme);
}else{
    setTheme("system");
}