window.onload = () => 
{
    document.getElementById("enableDesktopSite").addEventListener("click", () => 
    {
        viewport = document.querySelector("meta[name=viewport]");
viewport.setAttribute('content', 'width=960px, initial-scale=1.0, maximum-scale=1.0, user-scalable=0');

        document.getElementById("mobile").style.display = "none";
        document.getElementById("desktop").style.display = "block";
    });
}