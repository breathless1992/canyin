define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'statics/partner/index' + location.search,
                    add_url: 'statics/partner/add',
                    edit_url: 'statics/partner/edit',
                    del_url: 'statics/partner/del',
                    import_url: 'statics/partner/import',
                    multi_url: 'statics/partner/multi',
                    table: 'basics_partner',
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
                        // {field: 'c_id', title: 'ID',visible:false},
                        {field: 'c_code', title: __('C_code')},
                        {field: 'c_name', title: __('C_name')},
                        // {field: 'c_password', title: __('C_password'),visible:false},
                        {field: 'c_email', title: __('C_email')},
                        {field: 'c_contacts', title: __('C_contacts')},
                        {field: 'c_phone', title: __('C_phone')},
                        // {field: 'c_wx_name', title: __('C_wx_name')},
                        // {field: 'c_logo', title: __('C_logo')},
                        // {field: 'c_kefu_tel', title: __('C_kefu_tel')},
                        // {field: 'c_time_type', title: __('C_time_type'),visible:false},
                        // {field: 'c_start_time', title: __('C_start_time')},
                        // {field: 'c_end_time', title: __('C_end_time')},
                        {field: 'c_province', title: __('C_province')},
                        {field: 'c_city', title: __('C_city')},
                        // {field: 'c_area', title: __('C_area')},
                        {field: 'c_address', title: __('C_address')},
                        // {field: 'c_location_adderess', title: __('C_location_adderess')},
                        // {field: 'c_longitude', title: __('C_longitude'),visible:false},
                        // {field: 'c_latitude', title: __('C_latitude'),visible:false},
                        // {field: 'c_jpush_id', title: __('C_jpush_id'),visible:false},
                        {field: 'c_sms_num', title: __('C_sms_num')},
                        // {field: 'c_wx_red_balance', title: __('C_wx_red_balance'),visible:false},
                        {field: 'c_xcx_platform', title: '小程序类型'},
                        {field: 'c_phone_cashier', title: '小程序外卖接单'},
                        {field: 'c_use_cashier', title:'是否允许收银'},
                        // {field: 'c_cashier_version', title: '收银业务类型'},
                        // {field: 'c_cashier_version_no', title: __('C_cashier_version_no')},
                        {field: 'c_cashier_type', title: '收银机类型'},
                        {field: 'c_wx_type', title: '微信餐厅类型'},
                        // {field: 'c_is_shop', title: __('C_is_shop'),visible:false},
                        // {field: 'c_business_type', title: __('C_business_type')},
                        // {field: 'c_device_id', title: __('C_device_id'),visible:false},
                        // {field: 'c_login_state', title: '收银机登录状态'},
                        // {field: 'c_use_hongbao', title: __('C_use_hongbao'),visible:false},
                        {field: 'c_use_waimai', title:'是否有外卖'},
                        {field: 'c_use_yuding', title:'是否有预定'},
                        {field: 'c_use_coupon', title:'是否有优惠券'},
                        {field: 'c_use_vip', title:'是否有会员卡'},
                        // {field: 'c_pay_version', title:'是否已付费'},
                        {field: 'c_enable_account', title:'账号激活停用'},
                        {field: 'c_create_time', title: __('C_create_time'), operate:'RANGE', addclass:'datetimerange'},
                        // {field: 'c_property', title: __('C_property')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            //省市区选择
            $("#city-picker").on("cp:updated", function() {
                var citypicker = $(this).data("citypicker");
                var code = citypicker.getCode("district") || citypicker.getCode("city") || citypicker.getCode("province");
                $("#code").val(code);

            });

            $("#c_xcx_platform").change(function(){
                var isUse = $("#c_xcx_platform").val();
                console.log(isUse);
            });

            //页面初始化判断是否允许收银，是的情况隐藏收银机类型选项
            $("#cashier_hidden").css('display','block');
            //用户选择是否允许收银开关后弹出收银机类型选项
            $("#c_use_cashier").change(function(event){
                var isUse = $("#c_use_cashier").val();
                if(isUse ==0){
                    $("#cashier_hidden").css('display',"none");
                }else{
                    $("#cashier_hidden").css('display','block');
                }
            });


            Controller.api.bindevent();
        },
        edit: function () {
            //页面初始化单选框相同name的情况下默认选中匹配值
            var wxtype=Config.row.c_wx_type;
            $("input[name='row[c_wx_type]'][value="+wxtype+"]").attr("checked", "checked");
            //页面初始化下拉框显示匹配值
            $("#c_phone_cashier").val(Config.row.c_phone_cashier);
            $("#c_use_cashier").val(Config.row.c_use_cashier);
            $("#c_cashier_type").val(Config.row.c_cashier_type);
            $("#c_use_waimai").val(Config.row.c_use_waimai);
            $("#c_use_coupon").val(Config.row.c_use_coupon);
            $("#c_use_vip").val(Config.row.c_use_vip);
            $("#c_enable_account").val(Config.row.c_enable_account);
            //页面初始化根据账号状态显示提示
            if(Config.row.c_enable_account==1){
                $("#accountstatus").text("   已激活");
            }else{
                $("#accountstatus").text("   已停用");
            }
            //账号启用停用按钮状态改变显示提示
            // $("#enable_account").on("click",function(event){
            $("#c_enable_account").change(function(){
                var isUse = $("#c_enable_account").val();
                console.log(isUse)
                if(isUse ==1){
                    $("#accountstatus").text("已激活");
                }else{
                    $("#accountstatus").text("已停用");
                }
            });
            //页面初始化判断是否允许收银，是的情况隐藏收银机类型选项
            if(Config.row.c_use_cashier == 0){
                $("#cashier_hidden").css('display',"none");
            }else{
                $("#cashier_hidden").css('display','block');
            }
            //用户选择是否允许收银开关后弹出收银机类型选项
            // $("#c_use_cashier").change(function(event){
            //     var isUse = $("#c_use_cashier").val();
            //     if(isUse ==0){
            //         $("#cashier_hidden").css('display',"none");
            //     }else{
            //         $("#cashier_hidden").css('display','block');
            //     }
            // });

            $('#c_cashier_type').change(function(){
                console.log($('#c_cashier_type').val());
            });

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