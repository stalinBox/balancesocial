<!DOCTYPE html>
<html>
<head>
    <base href="http://demos.telerik.com/kendo-ui/sortable/events">
    <style>html { font-size: 14px; font-family: Arial, Helvetica, sans-serif; }</style>
    <title></title>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1026/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1026/styles/kendo.material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1026/styles/kendo.material.mobile.min.css" />

    <script src="https://kendo.cdn.telerik.com/2017.3.1026/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.3.1026/js/kendo.all.min.js"></script>
    

    <link rel="stylesheet" href="../content/shared/styles/examples-offline.css">
    <script src="../content/shared/js/console.js"></script>
</head>
<body>

        <div id="example">
            <div class="demo-section k-content list-wrapper">
                <h4>Reorder Items</h4>
                <ul id="sortable-left" style="min-height: 41px;">
                    <li class="list-left">Item 1</li>
                    <li class="list-left">Item 2</li>
                    <li class="list-left">Item 3</li>
                </ul>

                <ul id="sortable-right" style="min-height: 41px;">
                    <li class="list-right">Item 1</li>
                    <li class="list-right">Item 2</li>
                    <li class="list-right">Item 3</li>
                </ul>
            </div>

            <div class="box">
                <h4>Console log</h4>
                <div class="console"></div>
            </div>

            <script>
                $(document).ready(function() {
                    $("#sortable-left").kendoSortable({
                        connectWith: "#sortable-right",
                        hint: function(element) {
                            return element.clone().addClass("hint");
                        },
                        placeholder: function(element) {
                            return element.clone().addClass("placeholder");
                        },
                        start: onStart,
                        move: onMove,
                        end: onEnd,
                        change: onChange,
                        cancel: onCancel
                    });

                    $("#sortable-right").kendoSortable({
                        connectWith: "#sortable-left",
                        hint: function(element) {
                            return element.clone().addClass("hint");
                        },
                        placeholder: function(element) {
                            return element.clone().addClass("placeholder");
                        },
                        start: onStart,
                        move: onMove,
                        end: onEnd,
                        change: onChange,
                        cancel: onCancel
                    });
                });

                function onStart(e) {
                    var id = e.sender.element.attr("id");
                    kendoConsole.log(id + " start: " + e.item.text());
                }

                function onMove(e) {
                    var id = e.sender.element.attr("id"),
                        placeholder = e.list.placeholder;

                    kendoConsole.log(id + " move to index: " + this.indexOf(placeholder));
                }

                function onEnd(e) {
                    var id = e.sender.element.attr("id"),
                        text = e.item.text(),
                        oldIndex = e.oldIndex,
                        newIndex = e.newIndex;

                    kendoConsole.log(id + " end: " + text + " oldIndex: " + oldIndex + " newIndex: " + newIndex + " action: " + e.action);
                }

                function onChange(e) {
                    var id = e.sender.element.attr("id"),
                        text = e.item.text(),
                        newIndex = e.newIndex,
                        oldIndex = e.oldIndex;

                    kendoConsole.log(id + " change: " + text + " newIndex: " + newIndex + " oldIndex: " + oldIndex + " action: " + e.action);
                }

                function onCancel(e) {
                    kendoConsole.log("cancel");
                }

            </script>

            <style>
                #example {
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                }

                .list-wrapper {
                    overflow: hidden;
                }

                #sortable-left, #sortable-right {
                    width: 200px;
                    margin-right: 30px;
                    padding: 0;
                    float: left;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }

                .list-right, .list-left {
                    list-style-type: none;
                    margin: 5px;
                    width: 168px;
                    padding: 8px 10px;
                    text-align: center;
                    color: #ffffff;
                    border: 1px solid transparent;
                    border-radius: 4px;
                    cursor: move;
                }

                .list-left {
                    background-color: #52aef7;
                }

                .list-right {
                    background-color: #e62757;
                }

                .placeholder {
                    border: 1px dashed #ccc;
                    background-color: #fff;
                    color: #333;
                }

                .hint {
                    opacity: 0.4;
                }
            </style>
        </div>


</body>
</html>