$(init);

function init()
{
    $("li").hover(highlight, plain);
}

function highlight()
{
    $(this).css(
        {"background": "red",
         "color":      "white"}
    );
}

function plain()
{
    $(this).css(
        {"background": "white",
         "color":      "black"}
    );
}
