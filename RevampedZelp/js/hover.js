$(init);

function init()
{
    $("ul").hover(highlight, plain);
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
        {"background": "#eeeeee",
         "color":      "black"}
    );
}
