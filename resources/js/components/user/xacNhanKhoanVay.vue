<template>
    <div class="fadein">
        <div style="opacity: 1; transform: none;">
            <div class="header-content">
                <div style="padding: 0px;">
                    <a href="/hoan-tat-xac-minh"><span role="img" aria-label="left"
                                                       class="anticon anticon-left left-icon"><svg
                        viewBox="64 64 896 896"
                        focusable="false"
                        data-icon="left"
                        width="1em"
                        height="1em"
                        fill="currentColor"
                        aria-hidden="true"><path
                        d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 000 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path></svg></span>
                    </a>
                </div>
                <span class="ant-typography" style="font-weight: 700; font-size: 20px; color: white;"><strong>Xác nhận vay</strong></span>
                <div></div>
            </div>
            <div class="checking-container" style="padding-bottom: 120px;"><span class="ant-typography"
                                                                                 style="font-size: 15px; text-align: center;"><strong>Xác nhận khoản vay</strong></span><br><br><span
                class="ant-typography" style="font-size: 17px;">Khoản tiền vay : <span
                class="ant-typography"><strong>{{
                    thongTinCaNhan.so_tien_vay ? thongTinCaNhan.so_tien_vay.toLocaleString() : 0
                }}</strong></span> VND</span><span
                class="ant-typography"
                style="font-size: 17px;">Thời hạn thanh toán : <span
                class="ant-typography"><strong>{{
                    thongTinCaNhan.thoi_han_vay ? thongTinCaNhan.thoi_han_vay : 0
                }} tháng</strong></span></span>
                <button type="button" class="ant-btn ant-btn-round ant-btn-default"
                        @click.prevent="hienThiHopDong()"
                        style="background: rgb(255, 115, 35); margin: 10px;"><span class="ant-typography"
                                                                                   style="color: rgb(255, 255, 255);"><strong>Xem hợp đồng</strong></span>
                </button>
                <br>
                <div>
                    <div
                        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <span class="ant-typography" style="font-size: 12px;">Kí vào khung bên dưới </span>
                        <button type="button" @click.prevent="xacNhanChuKy()" class="ant-btn ant-btn-default" style="background: rgb(54, 124, 76);">
                            <span class="ant-typography" style="color: rgb(255, 255, 255);">Xác nhận chữ ký</span>
                        </button>
                    </div>
                    <div class="signing" style="width: 100%; height: 200px;">
                        <canvas ref="signatureCanvas" style="" :width="screenWidth-88" height="192"
                                @touchstart="startDrawing"
                                @touchmove="draw"
                                @touchend="stopDrawing"
                                @touchcancel="stopDrawing"></canvas>
<!--                        <canvas id="canvas419" ref="signatureCanvas" class="canvas" width="996" height="300"-->
<!--                                style="touch-action: none;"></canvas>-->
                    </div>
                    <div @click="clearCanvas()" class="refresh"><span class="ant-typography"
                                               style="text-decoration: underline;">Làm mới </span></div>
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
    setup() {
        const windowSize = ref(window.innerWidth)
        onMounted(() => {
            window.addEventListener('resize', () => {windowSize.value = window.innerWidth} )
        })
        onUnmounted(() => {
            window.removeEventListener('resize', () => {windowSize.value = window.innerWidth})
        })
        console.log(windowSize)
        return {
            windowSize
        }
    },
    data() {
        return {
            thongTinCaNhan: {},
            hien_thi_hop_dong: false,
            lastX: 0,
            lastY: 0,
            canvas: null,
            ctx: null,
            isDrawing: true,
            screenWidth:0

        }
    },
    mounted() {

        this.screenWidth = window.innerWidth;
        window.addEventListener('resize', this.updateScreenWidth);
        console.log('Mounted xác nhận khoản vay...');
        this.layThongTinCaNhan();

        // Lấy tham chiếu đến canvas
        this.canvas = this.$refs.signatureCanvas;
        this.ctx = this.canvas.getContext("2d");

        // Biến kiểm tra xem người dùng đang vẽ chữ ký hay không
        this.isDrawing = false;

        // Xác định các biến lưu trữ vị trí chuột trước đó
        this.lastX = 0;
        this.lastY = 0;
        this.ctx.strokeStyle = 'black';
        this.ctx.lineWidth = 2;

        // Lắng nghe sự kiện khi người dùng bắt đầu vẽ chữ ký
        this.canvas.addEventListener("mousedown", this.startDrawing);

        // Lắng nghe sự kiện khi người dùng di chuyển chuột để vẽ chữ ký
        this.canvas.addEventListener("mousemove", this.draw);

        // Lắng nghe sự kiện khi người dùng ngừng vẽ chữ ký
        this.canvas.addEventListener("mouseup", this.stopDrawing);
        this.canvas.addEventListener("mouseout", this.stopDrawing);
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.updateScreenWidth);
    },
    methods: {
        updateScreenWidth(){
            this.screenWidth = window.innerWidth;
        },
        // Bắt đầu vẽ chữ ký
        startDrawing(e) {
            this.isDrawing = true;
            const touch = e.touches[0];
            [this.lastX, this.lastY] = [touch.clientX - this.canvas.offsetLeft, touch.clientY - this.canvas.offsetTop];
        },
        // Vẽ điểm trên canvas
        draw(e) {
            if (!this.isDrawing) return;
            e.preventDefault();
            const touch = e.touches[0];
            this.ctx.beginPath();
            this.ctx.moveTo(this.lastX, this.lastY);
            this.ctx.lineTo(touch.clientX - this.canvas.offsetLeft, touch.clientY - this.canvas.offsetTop);
            this.ctx.stroke();
            [this.lastX, this.lastY] = [touch.clientX - this.canvas.offsetLeft, touch.clientY - this.canvas.offsetTop];
        },
        // Dừng vẽ chữ ký
        stopDrawing() {
            this.isDrawing = false;
        },
        // Xóa chữ ký
        clearCanvas() {
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        },
        getEmptyCanvasData() {
            const emptyCanvas = document.createElement("canvas");
            emptyCanvas.width = this.canvas.width;
            emptyCanvas.height = this.canvas.height;
            return emptyCanvas.toDataURL();
        },
        // Lưu chữ ký
        xacNhanChuKy() {
            console.log('Xác nhận lưu chữ ký:')
            console.log(this.canvas)
            const signatureDataURL = this.canvas.toDataURL();
            console.log(signatureDataURL);
            console.log(signatureDataURL.length);
            console.log('Lưu thông tin chữ ký')
            if (signatureDataURL === this.getEmptyCanvasData()) {
                console.log("Chữ ký trống rỗng");
                this.thongBao('error','Vui lòng bổ sung chữ ký vào khung bên dưới.')
                return
            }
            rest_api.post('/luu-thong-tin-chu-ky', {
                chuKy:signatureDataURL
            }).then(
                response => {
                    console.log('Res đăng ký:')
                    console.log(response)
                    if (response.data.rc == 0) {
                        window.open('/vay-thanh-cong','_self')
                    } else {
                        this.thongBao('error', response.data.rd)
                    }
                    console.log(this.thongTinCaNhan)
                }
            ).catch((e) => {
            })
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
        hienThiHopDong() {
            this.hien_thi_hop_dong = true;
        },
        handleClose() {
            this.hien_thi_hop_dong = false;
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
