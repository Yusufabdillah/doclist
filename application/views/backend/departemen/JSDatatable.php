<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 13:06
 */
?>
<script type="text/javascript">
    $('#server_data').mDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    // sample GET method
                    method: 'GET',
                    url: '<?= site_url($this->router->fetch_class().'/AJAX'); ?>',
                    map: function(raw) {
                        // sample data mapping
                        var dataSet = raw;
                        if (typeof raw.data !== 'undefined') {
                            dataSet = raw.data;
                        }
                        return dataSet;
                    },
                },
            },
            pageSize: 5,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true
        },

        // layout definition
        layout: {
            theme: 'default', // datatable theme
            class: '', // custom wrapper class
            scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
            // height: 450, // datatable's body's fixed height
            footer: false // display/hide footer
        },

        // column sorting
        sortable: true,

        pagination: true,

        toolbar: {
            // toolbar items
            items: {
                // pagination
                pagination: {
                    // page size select
                    pageSizeSelect: [5, 10, 20, 30, 50, 100],
                },
            },
        },

        search: {
            input: $('#generalSearch'),
            onEnter: true
        },

        columns: [
            {
                field: 'Aksi',
                width: 100,
                title: "&#9997;",
                textAlign: 'center',
                sortable: false,
                overflow: 'visible',
                template: function (row) {
                    var encodeID = function () {
                        var tmp = null;
                        $.ajax({
                            async: false,
                            type: "POST",
                            url: '<?= site_url($this->router->fetch_class().'/AJAX'); ?>',
                            data: {
                                'fungsi' : 'encode',
                                'idDepartemen' : row.idDepartemen
                            },
                            success: function(data){
                                tmp = data;
                            }
                        });
                        return tmp;
                    }();
                    return '\
                    <div class="btn-toolbar" role="toolbar">\
                        <div class="btn-group" role=""group>\
                            <a class="m-btn btn btn-secondary m-btn--hover-info" href="<?= site_url($this->router->fetch_class().'/form/'); ?>'+encodeID+'"><i class="la la-edit"></i></a>\
                            <a\
                             data-d_id="'+row.idDepartemen+'"\
                             data-d_nama="'+row.namaDepartemen+'"\
                             class="modalDelete m-btn btn btn-secondary m-btn--hover-danger" data-toggle="modal" href="#modalDelete"><i class="la la-trash"></i></a>\
                        </div>\
                    </div>\
					';
                }
            },
            {
                field: "idDepartemen",
                title: 'No',
                width: 50,
                responsive: {visible: 'lg'},
                textAlign: 'center',
                template: function (index) {
                    return index.idDepartemen;
                }
            },
            {
                field: "namaPerusahaan",
                textAlign: 'center',
                width: 200,
                title: "Perusahaan",
                template: function(row) {
                    return row.namaPerusahaan+' di '+row.lokasiPerusahaan;
                }
            },
            {
                field: "namaDepartemen",
                textAlign: 'center',
                width: 250,
                title: "Nama Departemen"
            },
            {
                field: "statusDepartemen",
                textAlign: 'center',
                width: 200,
                title: "Status",
                template: function (row) {
                    var status = {
                        0: {'title': 'Non Aktif', 'class': 'm-badge--danger'},
                        1: {'title': 'Aktif', 'class': ' m-badge--success'}
                    };
                    return '<span class="m-badge ' + status[row.statusDepartemen].class + ' m-badge--wide">' + status[row.statusDepartemen].title + '</span>';
                }
            },
            {
                field: "createdBy",
                title: "Created",
                width: 200,
                textAlign: 'center',
                template: function (row) {
                    var formatTanggal = function () {
                        var tmp = null;
                        $.ajax({
                            async: false,
                            type: "POST",
                            url: '<?= site_url($this->router->fetch_class().'/AJAX'); ?>',
                            data: {
                                'fungsi' : 'formatDateTime',
                                'createdDate' : row.createdDate
                            },
                            success: function(data){
                                tmp = data;
                            }
                        });
                        return tmp;
                    }();
                    return row.createdBy + ' <br> ' + formatTanggal;
                }
            },
            {
                field: "updatedBy",
                title: "Updated",
                textAlign: 'center',
                template: function (row) {
                    var formatTanggal = function () {
                        var tmp = null;
                        $.ajax({
                            async: false,
                            type: "POST",
                            url: '<?= site_url($this->router->fetch_class().'/AJAX'); ?>',
                            data: {
                                'fungsi' : 'formatDateTime',
                                'updatedDate' : row.updatedDate
                            },
                            success: function(data){
                                tmp = data;
                            }
                        });
                        return tmp;
                    }();
                    if (row.updatedBy == null) {
                        return '...';
                    } if (row.updatedBy !== null) {
                        return row.updatedBy + ' <br> ' + formatTanggal;
                    }
                }
            }
        ],
    });
</script>
