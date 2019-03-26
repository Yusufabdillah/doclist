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
                    url: '<?= site_url($this->router->fetch_class().'/AJAXLog'); ?>',
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
                field: "idLog",
                title: 'No',
                width: 50,
                responsive: {visible: 'lg'},
                textAlign: 'center',
                template: function (index) {
                    return index.idLog;
                }
            },
            {
                field: "tanggalLog",
                title: "Tanggal",
                width: 200,
                textAlign: 'center',
                template: function (row) {
                    if (row.tanggalLog == null) {
                        return "...";
                    } else if (row.tanggalLog !== null) {
                        var formatTanggal = function () {
                            var tmp = null;
                            $.ajax({
                                async: false,
                                type: "POST",
                                url: '<?= site_url($this->router->fetch_class().'/AJAXLog'); ?>',
                                data: {
                                    'fungsi' : 'formatDateTime',
                                    'data' : row.tanggalLog
                                },
                                success: function(data){
                                    tmp = data;
                                }
                            });
                            return tmp;
                        }();
                        return formatTanggal;
                    }

                }
            },
            {
                field: "signinLog",
                title: "Sign In",
                width: 200,
                textAlign: 'center',
                template: function (row) {
                    if (row.signinLog == null) {
                        return "...";
                    } else if (row.signinLog !== null) {
                        var formatTanggal = function () {
                            var tmp = null;
                            $.ajax({
                                async: false,
                                type: "POST",
                                url: '<?= site_url($this->router->fetch_class().'/AJAXLog'); ?>',
                                data: {
                                    'fungsi' : 'formatDateTime',
                                    'data' : row.signinLog
                                },
                                success: function(data){
                                    tmp = data;
                                }
                            });
                            return tmp;
                        }();
                        return formatTanggal;
                    }
                }
            },
            {
                field: "signoutLog",
                title: "Sign Out",
                width: 200,
                textAlign: 'center',
                template: function (row) {
                    if (row.signoutLog == null) {
                        return "...";
                    } else if (row.signoutLog !== null) {
                        var formatTanggal = function () {
                            var tmp = null;
                            $.ajax({
                                async: false,
                                type: "POST",
                                url: '<?= site_url($this->router->fetch_class().'/AJAXLog'); ?>',
                                data: {
                                    'fungsi' : 'formatDateTime',
                                    'data' : row.signoutLog
                                },
                                success: function(data){
                                    tmp = data;
                                }
                            });
                            return tmp;
                        }();
                        return formatTanggal;
                    }
                }
            },
            {
                field: "hostnameLog",
                textAlign: 'center',
                width: 200,
                title: "Host"
            },
            {
                field: "ipaddressLog",
                textAlign: 'center',
                width: 200,
                title: "IP Address"
            },
            {
                field: "deviceLog",
                textAlign: 'center',
                width: 200,
                title: "Device"
            },
            {
                field: "browserLog",
                textAlign: 'center',
                width: 200,
                title: "Browser"
            },
            {
                field: "platformLog",
                textAlign: 'center',
                width: 200,
                title: "Platform"
            },
            {
                field: "useragentLog",
                textAlign: 'center',
                width: 200,
                title: "User Agent"
            },
        ],
    });
</script>
