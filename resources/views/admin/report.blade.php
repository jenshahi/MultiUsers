<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Report</title>

    <link rel="stylesheet" href="http://kendo.cdn.telerik.com/2017.1.118/styles/kendo.common.min.css"/>
    <link rel="stylesheet" href="http://kendo.cdn.telerik.com/2017.1.118/styles/kendo.rtl.min.css"/>
    <link rel="stylesheet" href="http://kendo.cdn.telerik.com/2017.1.118/styles/kendo.silver.min.css"/>
    <link rel="stylesheet" href="http://kendo.cdn.telerik.com/2017.1.118/styles/kendo.mobile.all.min.css"/>

    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://kendo.cdn.telerik.com/2017.1.118/js/jszip.min.js"></script>
    <script src="http://kendo.cdn.telerik.com/2017.1.118/js/kendo.all.min.js"></script>
</head>
<body>

<div>
    <h1> This is Reporting System </h1>
</div>

<div id="example">
    <div class="box wide">
        <div class="box-col">
            <h4>Save data changes</h4>
            <ul class="options">
                <li>
                    <button class="k-button" id="save">Save changes</button>
                    <button class="k-button" id="cancel">Cancel changes</button>
                </li>
            </ul>
        </div>
    </div>

    <div id="spreadsheet" style="width: 100%"></div>
    <script>
        $(function() {
            var crudServiceBaseUrl = "https://demos.telerik.com/kendo-ui/service";

            var dataSource = new kendo.data.DataSource({
                transport: {
                    read:  {
                        url: crudServiceBaseUrl + "/Products",
                        dataType: "jsonp"
                    },
                    update: {
                        url: crudServiceBaseUrl + "/Products/Update",
                        dataType: "jsonp"
                    },
                    destroy: {
                        url: crudServiceBaseUrl + "/Products/Destroy",
                        dataType: "jsonp"
                    },
                    create: {
                        url: crudServiceBaseUrl + "/Products/Create",
                        dataType: "jsonp"
                    },
                    parameterMap: function(options, operation) {
                        if (operation !== "read" && options.models) {
                            return {models: kendo.stringify(options.models)};
                        }
                    }
                },
                batch: true,
                change: function() {
                    $("#cancel, #save").toggleClass("k-state-disabled", !this.hasChanges());
                },
                schema: {
                    model: {
                        id: "ProductID",
                        fields: {
                            ProductID: { type: "number" },
                            ProductName: { type: "string" },
                            UnitPrice: { type: "number" },
                            Discontinued: { type: "boolean" },
                            UnitsInStock: { type: "number" }
                        }
                    }
                }
            });

            $("#spreadsheet").kendoSpreadsheet({
                columns: 20,
                rows: 100,
                toolbar: true,
                sheetsbar: true,
                sheets: [{
                    name: "Products",
                    dataSource: dataSource,
                    rows: [{
                        height: 40,
                        cells: [
                            {
                                bold: "true",
                                background: "#9c27b0",
                                textAlign: "center",
                                color: "white"
                            },{
                                bold: "true",
                                background: "#9c27b0",
                                textAlign: "center",
                                color: "white"
                            },{
                                bold: "true",
                                background: "#9c27b0",
                                textAlign: "center",
                                color: "white"
                            },{
                                bold: "true",
                                background: "#9c27b0",
                                textAlign: "center",
                                color: "white"
                            },{
                                bold: "true",
                                background: "#9c27b0",
                                textAlign: "center",
                                color: "white"
                            }]
                    }],
                    columns: [
                        { width: 100 },
                        { width: 415 },
                        { width: 145 },
                        { width: 145 },
                        { width: 145 }
                    ]
                }]
            });

            $("#save").click(function() {
                if (!$(this).hasClass("k-state-disabled")) {
                    dataSource.sync();
                }
            });

            $("#cancel").click(function() {
                if (!$(this).hasClass("k-state-disabled")) {
                    dataSource.cancelChanges();
                }
            });
        });
    </script>
</div>
</body>
</html>