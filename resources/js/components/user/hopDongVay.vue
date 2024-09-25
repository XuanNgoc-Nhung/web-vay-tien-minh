<template>

    <div style="padding-bottom: 80px;">
        <div class="fadein">
            <div style="padding: 10px 15px; opacity: 1; transform: none;">
                <div
                    style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 5px; border-bottom: 1px solid rgb(238, 238, 238);">
                    <div style="padding: 0px;">
                        <a href="/ho-so">
                        <span role="img" aria-label="left" class="anticon anticon-left"
                              style="font-size: 25px; color: rgb(85, 85, 85);"><svg
                            viewBox="64 64 896 896" focusable="false" data-icon="left" width="1em" height="1em"
                            fill="currentColor" aria-hidden="true"><path
                            d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 000 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path></svg></span>

                        </a>
                    </div>
                    <span class="ant-typography"
                          style="font-weight: 700; font-size: 20px;"><strong>Khoản vay</strong></span>
                    <div></div>
                </div>
                <div
                    style="padding: 10px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <div role="separator"
                         class="ant-divider ant-divider-horizontal ant-divider-with-text ant-divider-with-text-center">
                        <span class="ant-divider-inner-text"><span class="ant-typography" style="font-size: 16px;">Thông tin hợp đồng của bạn</span></span>
                    </div>
                    <div style="width: 100%; padding: 20px 10px 10px;">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                            <span class="ant-typography" style="font-size: 17px;">Mã hợp đồng :</span><span
                            class="ant-typography"
                            style="flex: 1 1 0%; margin-left: 20px; font-size: 17px; font-weight: 500;">{{
                                'HDVV0' + thongTinCaNhan.id
                            }}</span>
                        </div>
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                            <span class="ant-typography" style="font-size: 17px;">Số tiền vay :</span><span
                            class="ant-typography"
                            style="flex: 1 1 0%; margin-left: 20px; font-size: 17px; font-weight: 700;">{{
                                thongTinCaNhan.so_tien_vay ? thongTinCaNhan.so_tien_vay.toLocaleString() : '0'
                            }}VND</span>
                        </div>
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                            <span class="ant-typography" style="font-size: 17px;">Hạn thanh toán :</span><span
                            class="ant-typography"
                            style="flex: 1 1 0%; margin-left: 20px; font-size: 17px; font-weight: 500;">{{
                                thongTinCaNhan.thoi_han_vay
                            }} tháng</span>
                        </div>
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                            <span class="ant-typography" style="font-size: 17px;">Khởi tạo lúc :</span><span
                            class="ant-typography"
                            style="flex: 1 1 0%; margin-left: 20px; font-size: 17px; font-weight: 500;">{{
                                thongTinCaNhan.created_at
                            }}</span>
                        </div>
                        <a @click="hien_thi_chi_tiet_tra_no = true" class="ant-typography"><strong>Chi tiết trả
                            nợ</strong></a> <br> <br>
                        <button @click.prevent="hienThiHopDong" type="button"
                                class="ant-btn ant-btn-round ant-btn-default"
                                style="background: rgb(255, 115, 35); display: flex; justify-content: center; margin: 0px auto; align-items: center;">
                                <span class="ant-typography"
                                      style="color: rgb(255, 255, 255);"><strong>Xem hợp đồng</strong></span></button>
                    </div>
                </div>
            </div>
        </div>
        <el-dialog
            :visible.sync="hien_thi_hop_dong"
            width="95%"
            top="5vh"
            :before-close="handleClose">
            <div>
                <div class="ant-modal-body">
                    <div>
                        <h5 style="text-align: center;"><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></h5><h5
                        style="text-align: center; "><b>ĐỘC LẬP - TỰ DO - HANH PHÚC</b></h5><h5
                        style="text-align: center; "><b>HỢP ĐỒNG VAY TIỀN</b></h5><h5>Bên A (Bên cho vay) :Công ty Tài chính Trách nhiệm hữu hạn TC SHINHAN<br></h5>
<!--                        <p>Mã số hợp đồng:&nbsp;<span id="codeContractSetting"-->
<!--                                                      style="color:red">{{ 'HDVV0' + thongTinCaNhan.id }}</span>-->
<!--                        </p>-->
                        <p>Bên B(Bên vay) Ông/Bà: {{thongTinCaNhan.ho_ten}}</p>
                        <p>Số CMT / CCCD: {{thongTinCaNhan.cmnd}}</p>
                        <p>Ngày ký: {{thongTinCaNhan.created_at}}</p>
                        <p>Số tiền khoản vay: {{
                                thongTinCaNhan.so_tien_vay ? (parseInt(thongTinCaNhan.so_tien_vay)).toLocaleString() : 0
                            }} VNĐ</p>
                        <p>Mã hợp đồng: {{ 'HDVV0' + thongTinCaNhan.id }}</p>
                        <p>Thời gian vay: {{thongTinCaNhan.created_at}}</p>
                        <p>Lãi xuất vay: {{
                                ((parseInt(thongTinCaNhan.lai_suat) / 100).toFixed(2))}} % mỗi tháng</p>
                        <p>
                            Hợp đồng nêu rõ các bên đã đặt được thỏa thuận vay sau khi thương lượng và trên
                            cơ sở bình đẳng, tự nguyện và nhất trí. Tất cả các bên cần đọc kỹ tất cả các điều
                            khoản trong thỏa thuận này, sau khi ký vào thỏa thuận này coi như các bên đã hiểu
                            đầy đủ và đồng ý hoàn toàn với tất cả các điều khoản và nội dung trong thỏa thuận
                            này. <br>
                            1.Phù hợp với các nguyên tắc bình đẳng, tự nguyện, trung thực và uy tín, hai bên
                            thống nhất ký kết hợp đồng vay sau khi thương lượng và cùng cam kết thực hiện.<br>
                            2.Bên B cung cấp tài liệu đính kèm của hợp đồng vay và có hiệu lực pháp lý như
                            hợp đồng vay này.<br>
                            3.Bên B sẽ tạo lệnh tính tiền gốc và lãi dựa trên số tiền vay từ ví ứng dụng do bên A
                            cung cấp.<br>
                            4.Điều khoản đảm bảo.<br>
                            - Bên vay không được sử dụng tiền vay để thực hiện các hoạt động bất hợp pháp.
                            Nếu không, bên A có quyền yêu cầu bên B hoàn trả ngay tiền gốc và lãi, bên B phải
                            chịu các trách nhiệm pháp lý phát sinh từ đó.<br>
                            - Bên vay phải trả nợ gốc và lãi trong thời gian quy định hợp đồng. Đối với phần
                            quá hạn, người cho vay có quyền thu hồi nợ trong thời hạn và thu ( lãi quá hạn ) %
                            trên tổng số tiền vay trong ngày.<br>
                            - Gốc và lãi của mỗi lần trả nợ sẽ được hệ thống tự động chuyển từ tài khoản ngân
                            hàng do bên B bảo lưu sang tài khoản ngân hàng của bên A. Bên B phải đảm bảo có
                            đủ tiền trong tài khoản ngân hàng trước ngày trả nợ hàng tháng.<br>
                            5.Chịu trách nhiệm do vi phạm hợp đồng<br>
                            - Nếu bên B không trả được khoản vay theo quy định trong hợp đồng. Bên B phải
                            chịu các khoản bồi thường thiệt hại đã thanh lý và phí luật sư, phí kiện tụng, chi phí
                            đi lại và các chi phí khác phát sinh do kiện tụng.<br>
                            - Khi bên A cho rẳng bên B đã hoặc có thể xảy ra tình huống ảnh hưởng đến khoản
                            vay thì bên A có quyền yêu cầu bên B phải trả lại kịp thời trước thời hạn.<br>
                            - Người vay và người bảo lãnh không được vi phạm điều lệ hợp đồng vì bất kỳ lý
                            do gì<br>
                            6.Phương thức giải quyết tranh chấp hợp đồng.<br>
                            Tranh chấp phát sinh trong quá trình thực hiện hợp đồng này sẽ được giải quyết
                            thông qua thương lượng thân thiện giữa các bên hoặc có thể nhờ bên thứ ba làm
                            trung gian hòa giải. Nếu thương lượng hoặc hòa giải không thành, có thể khởi kiện
                            ra tòa án nhân dân nơi bên A có trụ sở.<br>
                            7.Khi người vay trong quá trình xét duyệt khoản vay không thành công do nhiều
                            yếu tố khác nhau như chứng minh thư sai, thẻ ngân hàng sai , danh bạ sai. Việc
                            thông tin sai lệch này sẽ khiến hệ thống phát hiện nghi ngờ gian lận hoặc giả mạo
                            khoản vay và bên vay phải chủ động hợp tác với bên A để xử lý.<br>
                            8.Nếu không hợp tác. Bên A có quyền khởi kiện ra Tòa án nhân dân và trình báo lên
                            Trung tâm Báo cáo tín dụng của Ngân hàng nhà nước Việt Nam, hồ sơ nợ xấu sẽ
                            được phản ánh trong báo cáo tín dụng, ảnh hưởng đến tín dụng sau này của người
                            vay, vay vốn ngân hàng và hạn chế tiều dùng của người thân, con cái người vay...
                        </p>
                    </div>
                    <div>
                        <el-row :gutter="20">
                            <el-col :span="12">

                                <p>Người vay ký</p> <img id="contractAppend" :src="thongTinCaNhan.chu_ky" width="250px"> <h5
                                id="contractAppendName">{{ thongTinCaNhan.ho_ten }}</h5>
                            </el-col>
                            <el-col :span="12">
                                <p style="text-align: center; "><img style="max-width:100%;"
                                                                     src="/static/media/anhConDau.jpg"><br>
                                </p>
                            </el-col>
                        </el-row>
                    </div>
                </div>
            </div>
            <span slot="footer" class="dialog-footer">
    <el-button size="mini" type="primary" @click="hien_thi_hop_dong = false">OK</el-button>
  </span>
        </el-dialog>

        <el-dialog
            title="Chi tiết trả nợ"
            :visible.sync="hien_thi_chi_tiet_tra_no"
            width="90%"
            :before-close="handleClose">
            <div>
                <div style="max-height: 350px; overflow-y: scroll;">
                    <table style="table-layout: auto;">
                        <colgroup></colgroup>
                        <thead class="ant-table-thead">
                        <tr>
                            <th class="ant-table-cell">Kỳ</th>
                            <th class="ant-table-cell">Số tiền</th>
                            <!--                            <th class="ant-table-cell">Ngày đóng</th>-->
                        </tr>
                        </thead>
                        <tbody class="ant-table-tbody">
                        <tr v-for="(item,i) in 12" class="ant-table-row ant-table-row-level-0">
                            <td class="ant-table-cell"><span class="ant-typography">Kì thứ {{ i + 1 }}</span></td>
                            <td class="ant-table-cell"><span
                                class="ant-typography"><strong>{{
                                    thongTinCaNhan.tra_moi_ky ? thongTinCaNhan.tra_moi_ky.toLocaleString() : 0
                                }}</strong></span>
                            </td>
                            <!--                            <td class="ant-table-cell"><span class="ant-typography"><strong>13 - 9</strong></span>-->
                            <!--                            </td>-->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <span slot="footer" class="dialog-footer">
    <el-button size="mini" type="primary" @click="hien_thi_chi_tiet_tra_no = false">OK</el-button>
  </span>
        </el-dialog>
    </div>
</template>

<script>
import rest_api from "../../api/rest_api";
import Vue from 'vue';
import ElementUI from 'element-ui';
import {
    Icon
} from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);
Vue.use(Icon);
export default {
    components: {},
    data() {
        return {
            thongTinCaNhan: {},
            hien_thi_hop_dong: false,
            hien_thi_chi_tiet_tra_no: false,
        }
    },
    mounted() {
        console.log('Mounted ví...');
        this.layThongTinCaNhan();
    },
    methods: {
        handleClose() {
            this.hien_thi_hop_dong = false;
            this.hien_thi_chi_tiet_tra_no = false;
        },
        hienThiHopDong() {
            this.hien_thi_hop_dong = true;
        },
        layThongTinCaNhan() {
            console.log('Lấy thông tin cá nhân')
            this.thongTinCaNhan = {};
            rest_api.post('/lay-thong-tin-ca-nhan', {}).then(
                response => {
                    console.log('Res đăng ký:')
                    console.log(response)
                    if (response.data.rc == 0) {
                        this.thongTinCaNhan = response.data.data;
                    } else {
                        this.thongBao('error', response.data.rd)
                    }
                    console.log(this.thongTinCaNhan)
                }
            ).catch((e) => {
            })
        },
        rutTien() {
            if (true) {
                this.thongBao('error', 'Số dư không đủ.')
                return;
            }
        },
        thongBao(typeNoty, msgNoty) {
            let msg = "";
            let cl = "";
            if (msgNoty) {
                msg = msgNoty;
            }
            let type = "success";
            if (typeNoty) {
                type = typeNoty
            }
            if (type == "success") {
                cl = "dts-noty-success"
            }
            if (type == "warning") {
                cl = "dts-noty-warning"
            }
            if (type == "error") {
                cl = "dts-noty-error"
            }
            if (type == "info") {
                cl = "dts-noty-info"
            }
            this.$message({
                customClass: cl,
                showClose: true,
                message: msg,
                type: type,
                duration: 3000
            });
        },
    }
}

</script>

