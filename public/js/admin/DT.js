var DT = (function (w, $, undefined) {

    var dataTable, currentRow = 0,
        responsiveHelper_dt_basic = undefined,
        breakpointDefinition = {
            tablet : 1024,
            phone : 480
        },
        settings
    ;

    function create (selector, options) {
        settings = options;
        settings['preDrawCallback'] = options.preDrawCallback || function() {};
        settings['rowCallback'] = options.rowCallback || function() {};
        settings['fnDrawCallback'] = options.fnDrawCallback || function() {};
        dataTable = $(selector).DataTable({
             "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth" : true,
            processing: false,
            serverSide: true,
            stateSave: false,
            ajax: {
                url: '/admin/'+settings.resource+'/json',
                data: function(d) {
                    if (settings.data) {
                        for (var i in settings.data)
                        d[i] = oSettings.data[i];
                    }
                }
            },
            fnServerParams: function(data) {
                  data['order'].forEach(function(items, index) {
                      data['order'][index]['column'] = data['columns'][items.column]['data'];
                });
            },
            aoColumns: getColumns(),
            language: window.dtLanguage,
            preDrawCallback: function() {
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($(selector), breakpointDefinition);
                }
                settings.preDrawCallback();
            },
            rowCallback: function(nRow, aData) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
                settings.rowCallback(nRow, aData);
            },
            fnDrawCallback: function(oSettings) {
                $('a[rel="tooltip"]').tooltip();
                $('.datatable_filter input').focus();
                responsiveHelper_dt_basic.respond();
                settings.fnDrawCallback(oSettings);
                if (settings.columns.join().indexOf('stateSwicher') != -1) stateSwicher.onChange();
                if (settings.columns.join().indexOf('actions') != -1) actions.onDelete();
            },
            columnDefs: generateColumns(),
            order: [[ 1, "desc" ]]
        });
    }

    function getColumns () {
        var result = [], column;
        for (var i in settings.columns) {
            column = settings.columns[i].split('|', 1).join('');
            result.push({
                mData: column,
                sTitle: column
            });
        }
        return result;
    }

    function generateColumns() {
        var result = [], column;
        for (var i=0, l=settings.columns.length; i<l; i++) {
            var item = {};
            column = settings.columns[i];
            item['targets'] = i;
            if (settings.columns[i].indexOf('|') != -1) {
                item['render'] = (function (column) {
                    return function (d, type, row) {
                        return applyFilter(column, row);
                    };
                })(column);
            } else {
                item['render'] = (function (column) {
                    return function (d, type, row) {
                        return row[column];
                    };
                })(column);
            }
            result.push(item);
        }
        return result;
    }

    // title|limit:50

    function applyFilter(column, row) {
        var options = column.split('|');
        var filter = (options[1].indexOf(':') != -1)?options[1].split(':')[0]:options[1];
        return filters[filter](row, options[0], options[1]);
    }

    var filters = {
        image: function (row, prop, parameters) {
            return image.render(row.prop);
        },
        limit: function (row, prop, parameters) {
            var length = (parameters.indexOf(':') != -1) ? parameters.split(':')[1] : 34;
            return (row[prop].length > length)?'<a href="javascript:void(0);" rel="tooltip" data-placement="top" data-original-title=\''+row[prop]+'\' data-html="false">'+row[prop].substring(0, length)+'...'+'</a>':row[prop];
        },
        stateSwicher: function (row, prop, parameters) {
            var index = parameters.indexOf(':');
            if (index != -1) {
                var states = JSON.parse(parameters.slice(index+1));
                stateSwicher.setState(states);
            }
            return stateSwicher.render(row[prop], row);
        },
        actions:  function(row, prop, parameters) {
            return actions.render(row);
        }
    }

    //IMAGEN
    var image = {
        defaultImage: 'imagen-no-disponible.jpg',
        render: function (imagen) {
            var time = (new Date).getTime(), path;
            imagen = imagen || this.defaultImage;
            imagen += '?'+time;
            path = '/content/' + settings.resource + '/thumb/' + imagen;
            return '\
                <a href="javascript:void(0);" rel="tooltip" data-placement="top" data-original-title="<img width=\'150\' src=\''+path+'\' class=\'online\'>" data-html="true">\
                     <img style="width:30px; border: solid 1px #ccc" src="'+path+'"\
                </a>\
            ';
        }
    }
    //FIN IMAGEN

    //ESTADO
    var stateSwicher = {
        states: {
            0:{label:'danger', value:'Oculto'},
            1:{label:'success', value:'Visible'}
        },
        setState: function (states) {
            this.states = states;
        },
        render: function (index, row) {
            var currentState = this.states[index];
            return '<span data-id="'+row.id+'" data-estado="'+index+'" class="estado switch-state label label-'+currentState.label+'">'+currentState.value+'</span>'
        },
        onChange: function() {
            var $this, estado_id, state, waiting = false, data = {};
            var prop = settings.columns.join('|');
            prop = /\|([^\|]+)\|stateSwicher/.exec(prop)[1];
            $('#datatable').on('click', '.estado', function () {
                $this = $(this);
                estado_id = nextState($this.data('estado'));
                data[prop] = estado_id;
                data['id'] = $this.data('id');
                if (!waiting) {
                    waiting = true;
                    $.ajax({
                        type:'put',
                        url:'/admin/'+settings.resource+'/'+$this.data('id'),
                        data:data,
                        success: function (object) {
                            $this.replaceWith(stateSwicher.render(estado_id, object));
                            waiting = false;
                        }
                    });
                }
            });
        }
    }
    function nextState(index) {
        var indexes = [], i = 0, currentIndex, state;
        for (var key in stateSwicher.states) {
            indexes.push(key);
            if (key == index) currentIndex = i;
            i++;
        }
        return (++currentIndex >= i)?indexes[0]:indexes[currentIndex];
    }
    //FIN ESTADO

    //ACCIONES
    var actions = {
        render: function (row) {
            return '\
                <a href="/admin/'+settings.resource+'/'+row.id+'/edit" title="Editar" rel="tooltip" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>\
                <a data-id="'+row.id+'" title="Borrar" rel="tooltip" class="borrar btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>\
            ';
        },
        onDelete: function() {
            var $this, id;
            $('.borrar').on('click', function(e) {
                e.preventDefault();
                $this = $(this);
                id = $(this).attr('data-id');
                modals.delete.init().show();
                $('#modalBorrar .action').click(function () {
                    $('#modalBorrar .modal-footer button').unbind('click');
                    modals.loader();
                    $.ajax({
                        type:'delete',
                        url: '/admin/'+settings.resource+'/'+id,
                        success: function (response) {
                            modals.delete.hide();
                            if (response.success) {
                                $this.parents('tr').fadeOut(
                                    500,
                                    function () {
                                        $this.parents('tr').remove();
                                        if ($('#datatable tbody tr').length == 0) {
                                            dataTable.ajax.reload();
                                        }
                                    }
                                );
                            } else {
                                Box.small({title: response.error}).error().show();
                            }
                        }
                    });
                });
            });
        }
    }
    //FIN ACCIONES

    //MODALS
    var modals = {
        delete: {
            init: function () {
                $('#modalBorrar .modal-title .text').html('Borrar');
                $('#modalBorrar .modal-title .jarviswidget-loader').hide();
                $('#modalBorrar .modal-body .content').html('<p>¿Está seguro que desea borrar este item?</p>');
                $('#modalBorrar button.action').attr('data-id', false);
                $('#modalBorrar .modal-footer button').attr('disabled', false);
                $('#modalBorrar .modal-footer button.btn-default').show();
                $('#modalBorrar .modal-dialog').css('width', '');
                return this;
            },
            show: function () {
                $('#modalBorrar').modal('show');
            },
            hide: function () {
                $('#modalBorrar').modal('hide');
            }
        },
        loader: function () {
            $('#modalBorrar .modal-title .jarviswidget-loader').show();
            $('#modalBorrar .modal-body .content').html('Por favor espere...');
            $('#modalBorrar .modal-footer button').attr('disabled', true);
            return this;
        }
    }
    //FIN MODALS
    
    return {
        create : function (selector, data) {
            create(selector, data);
        }
    }
})(window, jQuery, undefined);
