define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'statics/shopinfo/index' + location.search,
                    add_url: 'statics/shopinfo/add',
                    edit_url: 'statics/shopinfo/edit',
                    del_url: 'statics/shopinfo/del',
                    multi_url: 'statics/shopinfo/multi',
                    table: 'shop_receivables',
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
                        {field: 'c_partner_code', title: '商家编号'},
                        {field: 'c_merchant_name', title: __('C_merchant_name')},
                        {field: 'c_short_name', title: __('C_short_name')},
                        {field: 'c_tel', title: __('C_tel')},
                        {field: 'c_service_phone', title: __('C_service_phone')},
                        {field: 'c_account_type', title: '账户类型',formatter:(value, row, index)=>{
                           // console.log(value,row,index);
                            if(value == 0) return "个人账户";
                            else if(value == 1) return "公司账户";
                            return value;
                            }},
                        {field: 'c_name', title: __('C_name')},
                        {field: 'c_bank', title: '开户银行'},
                        {field: 'c_bank_code', title: __('C_bank_code')},
                        // {field: 'c_bank_no', title: '支行联行号'},
                        // {field: 'c_province_code', title: __('C_province_code')},
                        {field: 'c_province', title: __('C_province')},
                        // {field: 'c_city_code', title: __('C_city_code')},
                        {field: 'c_city', title: __('C_city')},
                        // {field: 'c_county_code', title: __('C_county_code')},
                        {field: 'c_area', title: __('C_area')},
                        {field: 'c_address', title: __('C_address')},
                        // {field: 'c_bank_branch', title: __('C_bank_branch')},
                        {field: 'c_feedback_email', title: __('C_feedback_email')},
                        {field: 'c_alipay_no', title: __('C_alipay_no')},
                        {field: 'c_id_card_no', title: __('C_id_card_no')},
                        // {field: 'c_id_type', title: __('C_id_type')},
                        // {field: 'c_bank_is_boss', title: __('C_bank_is_boss')},
                        // {field: 'c_contact_type', title: __('C_contact_type')},
                        {field: 'c_id_card_img_f', title: __('C_id_card_img_f'),formatter: Table.api.formatter.image},
                        {field: 'c_id_card_b_img', title: __('C_id_card_b_img'),operate: false, events: Table.api.events.img,formatter: Table.api.formatter.image},
                        {field: 'c_license_img', title: __('C_license_img'),formatter: Table.api.formatter.image},
                        {field: 'c_store_quanjing_img', title: __('C_store_quanjing_img'),formatter: Table.api.formatter.image},
                        {field: 'c_store_shouyintai_img', title: __('C_store_shouyintai_img'),formatter: Table.api.formatter.image},
                        {field: 'c_store_zhaopai_img', title: __('C_store_zhaopai_img'),formatter: Table.api.formatter.image},
                        {field: 'c_service_permit_img', title: __('C_service_permit_img'),formatter: Table.api.formatter.image},
                        // {field: 'c_annex_img1', title: __('C_annex_img1')},
                        // {field: 'c_annex_img2', title: __('C_annex_img2')},
                        // {field: 'c_annex_img3', title: __('C_annex_img3')},
                        // {field: 'c_merchant_license', title: __('C_merchant_license')},
                        // {field: 'c_license_start_date', title: __('C_license_start_date')},
                        // {field: 'c_license_end_date', title: __('C_license_end_date')},
                        // {field: 'c_license_period', title: __('C_license_period')},

                        // {field: 'c_license_scope', title: __('C_license_scope')},



                        // {field: 'c_mch_id', title: __('C_mch_id')},
                        // {field: 'c_mch_key', title: __('C_mch_key')},
                        // {field: 'c_wx_merchant_code', title: __('C_wx_merchant_code')},
                        // {field: 'c_zfb_merchant_code', title: __('C_zfb_merchant_code')},
                        // {field: 'c_wx_audit_state', title: __('C_wx_audit_state')},
                        // {field: 'c_zfb_audit_state', title: __('C_zfb_audit_state')},
                        {field: 'c_state', title:'审核状态',formatter:(value, row, index)=>{
                                // console.log(value,row,index);
                                if(value == 0) return "未审核";
                                if(value == 1) return "审核中";
                                if(value == 2) return "已审核";
                                return value;
                            }},
                        {field: 'c_create_time', title: __('C_create_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });



                var isUse = $("#c_account_type").val();
                if(isUse){
                    $("#c_account_type").text('公司账户');
                }else{
                  $("#c_account_type").text('个人账户');
                }




            // 为表格绑定事件
            Table.api.bindevent(table);


        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            //页面初始化单选框相同name的情况下默认选中匹配值
            var state=Config.row.c_state;
            $("input[name='row[c_state]'][value="+state+"]").attr("checked", "checked");
            $("#c_phone_cashier").val(Config.row.c_phone_cashier);

            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});