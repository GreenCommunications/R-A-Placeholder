var formSubmitted = false;

window.onload = () => 
{
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

    document.getElementById("mm").addEventListener("click", () =>{
        document.getElementById("mobile-sitemap").className = "aniIn";
    });
    document.getElementById("mmc").addEventListener("click", () =>{
        document.getElementById("mobile-sitemap").className = "aniOut";
    });
}