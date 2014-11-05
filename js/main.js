function SearchPath(start, destination) {
    $.get("php/ajaxEndpoints.php",
        {
            Function: "SearchPath",
            Start: start,
            Destination: destination
        },
        updatePathDisplayArea, "json");
}

function updatePathDisplayArea(data) {
    var displayArea = $([id == "route"]);

    displayArea.empty();

    displayArea.append("<list>");

    for (var system in data.Systems) {
        displayArea.append("<item onclick=CCPEVE.SetDestination(" + system.ID + ")>" + system.Name + "</item>");
    }

    displayArea.append("</list>");

}
