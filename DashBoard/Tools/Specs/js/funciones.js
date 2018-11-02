$(document).ready(function() {
    var _table_ = document.createElement('table'),
        _tbody_ = document.createElement('tbody'),
        _tr_ = document.createElement('tr'),
        _th_ = document.createElement('th'),
        _td_ = document.createElement('td');
    _table_.className = "table table-bordered table-hover"; 
    _table_.setAttribute("id", "myTable2");

    //utilizamos el evento keyup para coger la información
    //cada vez que se pulsa alguna tecla con el foco en el buscador
    $(".users").keyup(function() {
        //console.log($(this).html())
        //en info tenemos lo que vamos escribiendo en el buscador
        var info = $(this).val();
        //hacemos la petición al método poblaciones del controlador buscador
        //pasando la variable info
        $.post('usuarios', {
            info: info
        }, function(data) {
            //si autocompletado nos devuelve algo
            if (data != '') {
                console.log(data);
                url = "<center><a href=\"controlador2/editar/\"> <span class=\"glyphicon glyphicon - pencil\" aria-hidden=\"true\"></span></a></center>";
                html = $.parseHTML(url);

                for (var i = 0, l = data.length; i < l; i++) {
                    data[i][""] = "";
                   // data[i].Eliminar = "<h3>&quot;Hot&quot; Items <\/h3> <br \/> <ul id=\"items\" \/><\/div>";
                    //data[i].Exportar = "<input type='checkbox' class='checkbox'><label>Seleccioname!</label>";
                    $(".muestra_users").append(html);
                }
                //$(".muestra_users").html('');
                //buildHtmlTable(data);

                $(".muestra_users").html(buildHtmlTable2(data));
                $(".muestra_users").show();
                    var rows = $('#myTable2 tbody tr'),
        copyTable = $('#selectsTable tbody');

    rows.click(function() {
        var row = $(this),
            cloneRow = row.clone();

        cloneRow.children('td:last-child').html('<input type="submit" value="Eliminar" style="font-size: 12px; width: 100px;" class="delete btn btn-warning noExl">');

        copyTable.append(cloneRow);

        //row.prevAll().hide();
    });

    copyTable.on('click', '.delete', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });

                //$(".muestra_users").html(data);
            } else {

                $(".muestra_users").html('');

            }
        }, "json")

        /* function buildHtmlTable(myList) {
            var columns = addAllColumnHeaders(myList);

            for (var i = 0; i < myList.length; i++) {
                var row$ = $('<tr/>');
                for (var colIndex = 0; colIndex < columns.length; colIndex++) {
                    var cellValue = myList[i][columns[colIndex]];

                    if (cellValue == null) {
                        cellValue = "";
                    }

                    row$.append($('<td/>').html(cellValue));
                }
                $("#DataTable").append(row$);
            }
        }

        // Adds a header row to the table and returns the set of columns.
        // Need to do union of keys from all records as some records may not contain
        // all records
        function addAllColumnHeaders(myList) {
            var columnSet = [];
            var headerTr$ = $('<tr/>');

            for (var i = 0; i < myList.length; i++) {
                var rowHash = myList[i];
                for (var key in rowHash) {
                    if ($.inArray(key, columnSet) == -1) {
                        columnSet.push(key);
                        headerTr$.append($('<th/>').html(key));
                    }
                }
            }
            $("#DataTable").append(headerTr$);

            return columnSet;
        }
*/
        function buildHtmlTable2(arr) {
            var table = _table_.cloneNode(false),
                tbody = _tbody_.cloneNode(false),
                columns = addAllColumnHeaders(arr, tbody);
            for (var i = 0, maxi = arr.length; i < maxi; ++i) {
                var tr = _tr_.cloneNode(false);
                for (var j = 0, maxj = columns.length; j < maxj; ++j) {
                    var td = _td_.cloneNode(false);
                    cellValue = arr[i][columns[j]];
                    td.appendChild(document.createTextNode(arr[i][columns[j]] || ''));
                    tr.appendChild(td);
                }
                tbody.appendChild(tr);
            }
            table.appendChild(tbody);
            return table;
        }

        // Adds a header row to the table and returns the set of columns.
        // Need to do union of keys from all records as some records may not contain
        // all records
        function addAllColumnHeaders(arr, table) {
            var columnSet = [],
                tr = _tr_.cloneNode(false);
            for (var i = 0, l = arr.length; i < l; i++) {
                for (var key in arr[i]) {
                    if (arr[i].hasOwnProperty(key) && columnSet.indexOf(key) === -1) {
                        columnSet.push(key);
                        var th = _th_.cloneNode(false);
                        th.appendChild(document.createTextNode(key));
                        tr.appendChild(th);
                    }
                }
            }
            table.appendChild(tr);
            return columnSet;
        }

    })

})