const API = "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=";


async function getData(route)
{
    const url = API + route;

    console.log("URL:", url);

    const response = await fetch(url);

    const text = await response.text();

    console.log(text);

    return JSON.parse(text);
}