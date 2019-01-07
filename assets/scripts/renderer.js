var formSubmitted = false;

window.onload = () => 
{
    document.getElementById("enableDesktopSite").addEventListener("click", () => 
    {
        viewport = document.querySelector("meta[name=viewport]");
viewport.setAttribute('content', 'width=960px, initial-scale=1.0, maximum-scale=1.0, user-scalable=0');

        document.getElementById("mobile").style.display = "none";
        document.getElementById("desktop").style.display = "block";
    });

    document.getElementById("notice-close").addEventListener("click", () => 
    {
        document.getElementById("banner").style.display = "none";
    });

    document.getElementById("submitButton").addEventListener("click", () =>
    {
        document.getElementById("submitButton").style.backgroundColor = "#00d7d2";
        document.getElementById("submitButton").innerHTML = "&check;";

        formSubmitted = true;
    });
    document.getElementById("submitButton").addEventListener("mouseover", () =>
    {
        if(!formSubmitted)
        {
            document.getElementById("submitButton").style.backgroundColor = "#031b4e";
        }
    });
    document.getElementById("submitButton").addEventListener("mouseout", () =>
    {
        if(!formSubmitted)
        {
            document.getElementById("submitButton").style.backgroundColor = "#0069ff";
        }
    });
}