define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'statics/payconfig/index' + location.search,
                    add_url: 'statics/payconfig/add',
                    edit_url: 'statics/payconfig/edit',
                    del_url: 'statics/payconfig/del',
                    multi_url: 'statics/payconfig/multi',
                    table: 'payment_config',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'c_id',
                sortName: 'c_id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'c_id', title: __('C_id'),visible:false},
                        {field: 'c_partner_code', title: __('C_partner_code')},
                        {field: 'basicspartner.c_name', title: __('Basicspartner.c_name')},
                        {field: 'basicspartner.c_contacts', title: __('Basicspartner.c_contacts')},
                        {field: 'basicspartner.c_phone', title: __('Basicspartner.c_phone')},
                        {field: 'basicspartner.c_email', title: __('Basicspartner.c_email')},
                        {field: 'c_mch_id', title: '微信支付子商户号'},
                        // {field: 'c_app_auth_token', title: __('C_app_auth_token')},
                        {field: 'c_user_id', title: '支付宝子商户号'},
                        // {field: 'c_auth_app_id', title: __('C_auth_app_id')},
                        // {field: 'c_expires_in', title: __('C_expires_in')},
                        // {field: 'c_re_expires_in', title: __('C_re_expires_in')},
                        // {field: 'c_app_refresh_token', title: __('C_app_refresh_token')},
                        {field: 'c_update_time', title: __('C_update_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'c_create_time', title: __('C_create_time'), operate:'RANGE', addclass:'datetimerange'},
                        // {field: 'c_property', title: __('C_property')},
                        // {field: 'basicspartner.c_id', title: __('Basicspartner.c_id')},
                        // {field: 'basicspartner.c_code', title: __('Basicspartner.c_code')},
                        // {field: 'basicspartner.c_password', title: __('Basicspartner.c_password')},
                        //
                        // {field: 'basicspartner.c_wx_name', title: __('Basicspartner.c_wx_name')},
                        // {field: 'basicspartner.c_logo', title: __('Basicspartner.c_logo')},
                        // {field: 'basicspartner.c_kefu_tel', title: __('Basicspartner.c_kefu_tel')},
                        // {field: 'basicspartner.c_time_type', title: __('Basicspartner.c_time_type')},
                        // {field: 'basicspartner.c_start_time', title: __('Basicspartner.c_start_time')},
                        // {field: 'basicspartner.c_end_time', title: __('Basicspartner.c_end_time')},
                        // {field: 'basicspartner.c_province', title: __('Basicspartner.c_province')},
                        // {field: 'basicspartner.c_city', title: __('Basicspartner.c_city')},
                        // {field: 'basicspartner.c_area', title: __('Basicspartner.c_area')},
                        // {field: 'basicspartner.c_address', title: __('Basicspartner.c_address')},
                        // {field: 'basicspartner.c_location_adderess', title: __('Basicspartner.c_location_adderess')},
                        // {field: 'basicspartner.c_longitude', title: __('Basicspartner.c_longitude')},
                        // {field: 'basicspartner.c_latitude', title: __('Basicspartner.c_latitude')},
                        // {field: 'basicspartner.c_jpush_id', title: __('Basicspartner.c_jpush_id')},
                        // {field: 'basicspartner.c_sms_num', title: __('Basicspartner.c_sms_num')},
                        // {field: 'basicspartner.c_wx_red_balance', title: __('Basicspartner.c_wx_red_balance')},
                        // {field: 'basicspartner.c_phone_cashier', title: __('Basicspartner.c_phone_cashier')},
                        // {field: 'basicspartner.c_use_cashier', title: __('Basicspartner.c_use_cashier')},
                        // {field: 'basicspartner.c_cashier_version', title: __('Basicspartner.c_cashier_version')},
                        // {field: 'basicspartner.c_cashier_version_no', title: __('Basicspartner.c_cashier_version_no')},
                        // {field: 'basicspartner.c_cashier_type', title: __('Basicspartner.c_cashier_type')},
                        // {field: 'basicspartner.c_wx_type', title: __('Basicspartner.c_wx_type')},
                        // {field: 'basicspartner.c_pay_version', title: __('Basicspartner.c_pay_version')},
                        // {field: 'basicspartner.c_is_shop', title: __('Basicspartner.c_is_shop')},
                        // {field: 'basicspartner.c_xcx_platform', title: __('Basicspartner.c_xcx_platform')},
                        // {field: 'basicspartner.c_business_type', title: __('Basicspartner.c_business_type')},
                        // {field: 'basicspartner.c_device_id', title: __('Basicspartner.c_device_id')},
                        // {field: 'basicspartner.c_login_state', title: __('Basicspartner.c_login_state')},
                        // {field: 'basicspartner.c_use_hongbao', title: __('Basicspartner.c_use_hongbao')},
                        // {field: 'basicspartner.c_use_waimai', title: __('Basicspartner.c_use_waimai')},
                        // {field: 'basicspartner.c_use_yuding', title: __('Basicspartner.c_use_yuding')},
                        // {field: 'basicspartner.c_use_coupon', title: __('Basicspartner.c_use_coupon')},
                        // {field: 'basicspartner.c_use_vip', title: __('Basicspartner.c_use_vip')},
                       // {field: 'basicspartner.c_enable_account', title: __('Basicspartner.c_enable_account')},
                      //  {field: 'basicspartner.c_create_time', title: __('Basicspartner.c_create_time'), operate:'RANGE', addclass:'datetimerange'},
                       // {field: 'basicspartner.c_property', title: __('Basicspartner.c_property')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
            var status=$("#c-c_mch_id").val();
            console.log(status);
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});