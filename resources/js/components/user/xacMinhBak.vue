<template>
    <div style="padding-bottom: 80px;">
        <div class="fadein">
            <div style="opacity: 1; transform: none;">
                <div class="header-container">
                    <a href="/dang-ky-khoan-vay">
                    <span role="img" aria-label="left" tabindex="-1"
                          class="anticon anticon-left arrow-icon"><svg
                        viewBox="64 64 896 896" focusable="false" data-icon="left" width="1em" height="1em"
                        fill="currentColor" aria-hidden="true"><path
                        d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 000 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path></svg></span>

                    </a>
                    <span class="ant-typography header-title">Xác minh</span>
                    <div></div>
                </div>
                <div class="user-img-container" style="opacity: 1; transform: none;">
                    <span class="ant-typography"
                          style="font-size: 18px; padding: 5px;"><strong>Chụp ảnh định danh KYC</strong></span>
                    <div style="text-align:center">
                        <div style="border-radius:10px">
                            <video ref="videoElement" width="250" height="200"  autoplay></video>
                        </div>
                        <button style="bottom: 5px; right: 15px; width: 15%" @click="toggleCamera"><i class="el-icon-video-camera"></i></button>
                    </div>
                    <div class="image-container" style="position: relative">
                        <div v-if="imageDataMatTruoc" style="position: absolute; right: 10px; top:10px">
                            <i @click.prevent="imageDataMatTruoc = null" class="el-icon-refresh-right" style="font-size:20px; cursor: pointer"></i>
                        </div>
                        <span v-if="!imageDataMatTruoc" role="img" @click.prevent="chupAnhMatTruoc()" aria-label="camera" class="anticon anticon-camera" style=" cursor:pointer;font-size: 30px; color: rgb(51, 51, 51);">
                            <svg  viewBox="64 64 896 896" focusable="false" data-icon="camera" width="1em"
                                 height="1em" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M864 248H728l-32.4-90.8a32.07 32.07 0 00-30.2-21.2H358.6c-13.5 0-25.6 8.5-30.1 21.2L296 248H160c-44.2 0-80 35.8-80 80v456c0 44.2 35.8 80 80 80h704c44.2 0 80-35.8 80-80V328c0-44.2-35.8-80-80-80zm8 536c0 4.4-3.6 8-8 8H160c-4.4 0-8-3.6-8-8V328c0-4.4 3.6-8 8-8h186.7l17.1-47.8 22.9-64.2h250.5l22.9 64.2 17.1 47.8H864c4.4 0 8 3.6 8 8v456zM512 384c-88.4 0-160 71.6-160 160s71.6 160 160 160 160-71.6 160-160-71.6-160-160-160zm0 256c-53 0-96-43-96-96s43-96 96-96 96 43 96 96-43 96-96 96z"></path>

                            </svg>
                        </span>
                        <div v-if="!imageDataMatTruoc"
                            class="ant-typography"
                            style="color: rgb(51, 51, 51); font-weight: 700; font-size: 16px;">Mặt trước CMND / CCCD</div>
                            <img v-else ref="matTruoc" style="width: 100%; height:inherit !important;border-radius: 10px" :src="imageDataMatTruoc" />
                    </div>


                    <div class="image-container" style="position: relative">
                        <div v-if="imageDataMatSau" style="position: absolute; right: 10px; top:10px">
                            <i @click.prevent="imageDataMatSau=null" class="el-icon-refresh-right" style="font-size:20px; cursor: pointer"></i>
                        </div>
                        <span v-if="!imageDataMatSau" role="img" @click.prevent="chupAnhMatSau()" aria-label="camera" class="anticon anticon-camera" style=" cursor:pointer;font-size: 30px; color: rgb(51, 51, 51);">
                            <svg
                                 viewBox="64 64 896 896" focusable="false" data-icon="camera" width="1em"
                                 height="1em" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M864 248H728l-32.4-90.8a32.07 32.07 0 00-30.2-21.2H358.6c-13.5 0-25.6 8.5-30.1 21.2L296 248H160c-44.2 0-80 35.8-80 80v456c0 44.2 35.8 80 80 80h704c44.2 0 80-35.8 80-80V328c0-44.2-35.8-80-80-80zm8 536c0 4.4-3.6 8-8 8H160c-4.4 0-8-3.6-8-8V328c0-4.4 3.6-8 8-8h186.7l17.1-47.8 22.9-64.2h250.5l22.9 64.2 17.1 47.8H864c4.4 0 8 3.6 8 8v456zM512 384c-88.4 0-160 71.6-160 160s71.6 160 160 160 160-71.6 160-160-71.6-160-160-160zm0 256c-53 0-96-43-96-96s43-96 96-96 96 43 96 96-43 96-96 96z"></path>

                            </svg>
                        </span>
                        <div
                            v-if="!imageDataMatSau"
                            class="ant-typography"
                            style="color: rgb(51, 51, 51); font-weight: 700; font-size: 16px;">Mặt sau CMND / CCCD</div>
                        <img v-else ref="matSau" style="width: 100%; height:inherit !important; border-radius: 10px" :src="imageDataMatSau" />
                    </div>

                    <div class="image-container" style="position: relative">
                        <div v-if="imageDataChanDung" style="position: absolute; right: 10px; top:10px">
                            <i @click.prevent="imageDataChanDung = null" class="el-icon-refresh-right" style="font-size:20px; cursor: pointer"></i>
                        </div>
                        <span v-if="!imageDataChanDung" role="img" @click.prevent="chupAnhChanDung()" aria-label="camera" class="anticon anticon-camera" style=" cursor:pointer;font-size: 30px; color: rgb(51, 51, 51);">
                            <svg
                                 viewBox="64 64 896 896" focusable="false" data-icon="camera" width="1em"
                                 height="1em" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M864 248H728l-32.4-90.8a32.07 32.07 0 00-30.2-21.2H358.6c-13.5 0-25.6 8.5-30.1 21.2L296 248H160c-44.2 0-80 35.8-80 80v456c0 44.2 35.8 80 80 80h704c44.2 0 80-35.8 80-80V328c0-44.2-35.8-80-80-80zm8 536c0 4.4-3.6 8-8 8H160c-4.4 0-8-3.6-8-8V328c0-4.4 3.6-8 8-8h186.7l17.1-47.8 22.9-64.2h250.5l22.9 64.2 17.1 47.8H864c4.4 0 8 3.6 8 8v456zM512 384c-88.4 0-160 71.6-160 160s71.6 160 160 160 160-71.6 160-160-71.6-160-160-160zm0 256c-53 0-96-43-96-96s43-96 96-96 96 43 96 96-43 96-96 96z"></path>

                            </svg>
                        </span>
                        <div
                            v-if="!imageDataChanDung"
                            class="ant-typography"
                            style="color: rgb(51, 51, 51); font-weight: 700; font-size: 16px;">Ảnh chân dung</div>
                        <img v-else style="width: 100%; height:inherit !important; border-radius: 10px;" :src="imageDataChanDung" />
                    </div>




                    <div v-if="false" class="image-container" v-bind:style="{ 'background-image': 'url(' + urlUpload.matSau + ')' }"><span
                        role="img"
                        aria-label="camera"
                        class="anticon anticon-camera"
                        style="font-size: 30px; color: rgb(51, 51, 51);"><svg

                        v-show="!urlUpload.matSau"
                        viewBox="64 64 896 896" focusable="false" data-icon="camera" width="1em"
                        height="1em" fill="currentColor" aria-hidden="true"><path
                        d="M864 248H728l-32.4-90.8a32.07 32.07 0 00-30.2-21.2H358.6c-13.5 0-25.6 8.5-30.1 21.2L296 248H160c-44.2 0-80 35.8-80 80v456c0 44.2 35.8 80 80 80h704c44.2 0 80-35.8 80-80V328c0-44.2-35.8-80-80-80zm8 536c0 4.4-3.6 8-8 8H160c-4.4 0-8-3.6-8-8V328c0-4.4 3.6-8 8-8h186.7l17.1-47.8 22.9-64.2h250.5l22.9 64.2 17.1 47.8H864c4.4 0 8 3.6 8 8v456zM512 384c-88.4 0-160 71.6-160 160s71.6 160 160 160 160-71.6 160-160-71.6-160-160-160zm0 256c-53 0-96-43-96-96s43-96 96-96 96 43 96 96-43 96-96 96z"></path></svg></span>
                        <input type="file" accept="image/*" id="cameraback"
                               @change=" uploadFileMatSau"> <span
                            v-show="!urlUpload.matSau"
                            class="ant-typography"
                            style="color: rgb(51, 51, 51); font-weight: 700; font-size: 16px;">Mặt sau CMND / CCCD</span>
                    </div>
                    <div v-if="false" class="image-container"
                         v-bind:style="{ 'background-image': 'url(' + urlUpload.chanDung + ')' }"><span role="img"
                                                                                                        aria-label="camera"
                                                                                                        class="anticon anticon-camera"
                                                                                                        style="font-size: 30px; color: rgb(51, 51, 51);"><svg

                        v-show="!urlUpload.chanDung"
                        viewBox="64 64 896 896" focusable="false" data-icon="camera" width="1em"
                        height="1em" fill="currentColor" aria-hidden="true"><path
                        d="M864 248H728l-32.4-90.8a32.07 32.07 0 00-30.2-21.2H358.6c-13.5 0-25.6 8.5-30.1 21.2L296 248H160c-44.2 0-80 35.8-80 80v456c0 44.2 35.8 80 80 80h704c44.2 0 80-35.8 80-80V328c0-44.2-35.8-80-80-80zm8 536c0 4.4-3.6 8-8 8H160c-4.4 0-8-3.6-8-8V328c0-4.4 3.6-8 8-8h186.7l17.1-47.8 22.9-64.2h250.5l22.9 64.2 17.1 47.8H864c4.4 0 8 3.6 8 8v456zM512 384c-88.4 0-160 71.6-160 160s71.6 160 160 160 160-71.6 160-160-71.6-160-160-160zm0 256c-53 0-96-43-96-96s43-96 96-96 96 43 96 96-43 96-96 96z"></path></svg></span>
                        <input type="file" accept="image/*" id="cameraface"
                               @change=" uploadFileChanDung"> <span

                            v-show="!urlUpload.chanDung"
                            class="ant-typography"
                            style="color: rgb(51, 51, 51); font-weight: 700; font-size: 16px;">Ảnh chân dung</span>
                    </div>
                    <div class="image-container" v-if="loaiTaiKhoan==2"
                         v-bind:style="{ 'background-image': 'url(' + urlUpload.giayTo + ')' }"><span role="img"
                                                                                                      aria-label="camera"
                                                                                                      class="anticon anticon-camera"
                                                                                                      style="font-size: 30px; color: rgb(51, 51, 51);"><svg

                        v-show="!urlUpload.giayTo"
                        viewBox="64 64 896 896" focusable="false" data-icon="camera" width="1em"
                        height="1em" fill="currentColor" aria-hidden="true"><path
                        d="M864 248H728l-32.4-90.8a32.07 32.07 0 00-30.2-21.2H358.6c-13.5 0-25.6 8.5-30.1 21.2L296 248H160c-44.2 0-80 35.8-80 80v456c0 44.2 35.8 80 80 80h704c44.2 0 80-35.8 80-80V328c0-44.2-35.8-80-80-80zm8 536c0 4.4-3.6 8-8 8H160c-4.4 0-8-3.6-8-8V328c0-4.4 3.6-8 8-8h186.7l17.1-47.8 22.9-64.2h250.5l22.9 64.2 17.1 47.8H864c4.4 0 8 3.6 8 8v456zM512 384c-88.4 0-160 71.6-160 160s71.6 160 160 160 160-71.6 160-160-71.6-160-160-160zm0 256c-53 0-96-43-96-96s43-96 96-96 96 43 96 96-43 96-96 96z"></path></svg></span>
                        <input type="file" accept="image/*" id="cameraface"
                               @change="uploadFileGiayTo"> <span

                            v-show="!urlUpload.giayTo"
                            class="ant-typography"
                            style="color: rgb(51, 51, 51); font-weight: 700; font-size: 16px;">Ảnh chân dung</span>
                    </div>
                    <div class="confirm-div" @click.prevent="uploadXacMinh()">
                        <span class="ant-typography" style="color: rgb(255, 255, 255); font-weight: 700; font-size: 17px;">Tiếp tục</span>
                    </div>
                </div> <!----> <!----> <!----></div>
        </div> <!----> <!----></div>
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
            width: 640,
            height: 480,
            imageDataMatTruoc: null,
            imageDataMatSau: null,
            imageDataChanDung: null,
            thongTinVay: {
                traKyDau: 0,
                laiSuat: 0.8,
                thoiHan: 6,
                soTien: 0,
            },
            listFileUpload: [],
            urlUpload: {
                matTruoc: '',
                matSau: '',
                chanDung: '',
                giayTo: ''
            },
            selectedFile: {
                matTruoc: null,
                matSau: null,
                chanDung: null,
                giayTo: null,
            },
            loaiTaiKhoan: 1,

            currentDevice: null,
            devices: [],
        }
    },
    mounted() {
        console.log('Mounted Configs...');
        this.layThongTinCaNhan();
        this.startCamera();
    },
    methods: {

        async startCameraBak() {
            try {
                // Liệt kê danh sách các thiết bị media
                this.devices = await navigator.mediaDevices.enumerateDevices();
                this.currentDevice = this.devices.find((device) => device.kind === 'videoinput');

                // Bắt đầu truy cập camera
                const stream = await navigator.mediaDevices.getUserMedia({
                    video: { deviceId: this.currentDevice.deviceId },
                });
                this.$refs.videoElement.srcObject = stream;
            } catch (error) {
                console.error('Không thể truy cập camera:', error);
            }
        },

        startCamera() {
            navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: this.currentFacingMode
                }
            }).then(stream => {
                this.$refs.videoElement.srcObject = stream
                this.stream = stream
            }).catch(error => {
                console.error('Error accessing camera:', error)
            })
        },
        toggleCamera() {
            this.currentFacingMode =
                this.currentFacingMode === 'environment'
                    ? 'user'
                    : 'environment'
            this.stream.getTracks().forEach(track => track.stop())
            this.startCamera()
        },
        async toggleCameraBak() {
            try {
                // Tìm thiết bị camera tiếp theo
                const currentIndex = this.devices.indexOf(this.currentDevice);
                this.currentDevice = this.devices[(currentIndex + 1) % this.devices.length];

                // Bắt đầu truy cập camera mới
                const stream = await navigator.mediaDevices.getUserMedia({
                    video: { deviceId: this.currentDevice.deviceId },
                });
                this.$refs.videoElement.srcObject = stream;
            } catch (error) {
                console.error('Không thể chuyển đổi camera:', error);
            }
        },

        async startCameraBak2() {
            try {
                // Lấy stream video từ camera
                var stream = await navigator.mediaDevices.getUserMedia({
                    video: {
                        width: this.width,
                        height: this.height,
                    },
                    audio: false,
                });

                // Cập nhật video element với stream video
                this.$refs.videoElement.srcObject = stream;
            } catch (error) {
                console.error('Lỗi khi khởi động camera:', error);
            }
        },
        async sendImageToAPI() {
            console.log('sendImageToAPI')
            console.log(this.imageDataMatTruoc)
            if (!this.imageDataMatTruoc) {
                console.error('Không có ảnh chụp để gửi');
                return;
            }

            try {
                // Tạo FormData và thêm ảnh vào
                const formData = new FormData();
                formData.append('image', this.imageDataMatTruoc, 'image.png');

                // Gửi FormData lên API
                const response = await fetch('/api/upload', {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    console.log('Ảnh đã được gửi lên API thành công');
                } else {
                    console.error('Lỗi khi gửi ảnh lên API:', response.status);
                }
            } catch (error) {
                console.error('Lỗi khi gửi ảnh lên API:', error);
            }
        },
        chupAnhChanDung(){
            try {
                // Tạo một canvas và vẽ ảnh từ video element
                let canvas = document.createElement('canvas');
                canvas.width = this.width;
                canvas.height = this.height;
                canvas.getContext('2d').drawImage(this.$refs.videoElement, 0, 0, this.width, this.height);
                // Lưu ảnh chụp được vào biến imageDataMatTruoc
                this.imageDataChanDung = canvas.toDataURL('image/jpeg');
            } catch (error) {
                console.error('Lỗi khi chụp ảnh:', error);
            }
        },
        chupAnhMatSau(){
            try {
                // Tạo một canvas và vẽ ảnh từ video element
                let canvas = document.createElement('canvas');
                canvas.width = this.width;
                canvas.height = this.height;
                canvas.getContext('2d').drawImage(this.$refs.videoElement, 0, 0, this.width, this.height);

                // Lưu ảnh chụp được vào biến imageDataMatTruoc
                this.imageDataMatSau = canvas.toDataURL('image/jpeg');
            } catch (error) {
                console.error('Lỗi khi chụp ảnh:', error);
            }
        },
        chupAnhMatTruoc(){

            try {
                // Tạo một canvas và vẽ ảnh từ video element
                let canvas = document.createElement('canvas');
                canvas.width = this.width;
                canvas.height = this.height;
                canvas.getContext('2d').drawImage(this.$refs.videoElement, 0, 0, this.width, this.height);

                // Lưu ảnh chụp được vào biến imageDataMatTruoc
                this.imageDataMatTruoc = canvas.toDataURL('image/jpeg');
            } catch (error) {
                console.error('Lỗi khi chụp ảnh:', error);
            }
        },
        captureImage() {
            try {
                // Tạo một canvas và vẽ ảnh từ video element
                let canvas = document.createElement('canvas');
                canvas.width = this.width;
                canvas.height = this.height;
                canvas.getContext('2d').drawImage(this.$refs.videoElement, 0, 0, this.width, this.height);

                // Lưu ảnh chụp được vào biến imageDataMatTruoc
                this.imageDataMatTruoc = canvas.toDataURL('image/jpeg');
            } catch (error) {
                console.error('Lỗi khi chụp ảnh:', error);
            }
        },
        async uploadImage() {
            try {
                // Upload ảnh lên server
                const formData = new FormData();
                formData.append('image', this.imageDataMatTruocToBlob(this.imageDataMatTruoc));
                await fetch('/upload', {
                    method: 'POST',
                    body: formData,
                });
                console.log('Ảnh đã được upload thành công!');
            } catch (error) {
                console.error('Lỗi khi upload ảnh:', error);
            }
        },
        imageDataMatTruocToBlob(dataUrl) {
            const parts = dataUrl.split(';base64,');
            const contentType = parts[0].split(':')[1];
            const raw = window.atob(parts[1]);
            const rawLength = raw.length;
            const uint8Array = new Uint8Array(rawLength);

            for (let i = 0; i < rawLength; ++i) {
                uint8Array[i] = raw.charCodeAt(i);
            }

            return new Blob([uint8Array], {type: contentType});
        },


        layThongTinCaNhan() {
            console.log('Lấy thông tin cá nhân')
            rest_api.post('/lay-thong-tin-ca-nhan', {}).then(
                response => {
                    console.log('Res thông tin cá nhân:')
                    console.log(response)
                    if (response.data.rc == 0) {
                        this.loaiTaiKhoan = response.data.data.thong_tin_tai_khoan.type;
                        console.log(this.loaiTaiKhoan)
                    } else {
                        this.thongBao('error', response.data.rd)
                        // window.open("/", "_self")
                    }
                }
            ).catch((e) => {
            })
        },
        uploadXacMinh() {
            console.log('Upload Xác Minh')
            if (!this.imageDataMatSau || !this.imageDataMatTruoc || !this.imageDataChanDung) {
                this.thongBao('error', 'Vui lòng bổ sung thông tin.')
                return
            }
            // var dataForm = new FormData()
            // dataForm.append('matTruoc', this.selectedFile.matTruoc, this.selectedFile.matTruoc.name)
            // dataForm.append('matSau', this.selectedFile.matSau, this.selectedFile.matSau.name)
            // dataForm.append('chanDung', this.selectedFile.chanDung, this.selectedFile.chanDung.name)
            // if (this.selectedFile.giayTo) {
            //     dataForm.append('giayTo', this.selectedFile.giayTo, this.selectedFile.giayTo.name)
            // }
            rest_api.post('/xac-minh-hinh-anh', {
                matTruoc:this.imageDataMatTruoc,
                matSau:this.imageDataMatSau,
                chanDung:this.imageDataChanDung,
            }).then(
                response => {
                    if (response && response.data.rc == 0) {
                        window.open("/xac-minh-thong-tin-ca-nhan", "_self")
                    } else {
                        this.thongBao('error', response.data.rd)
                    }
                    this.loading.status = false;
                }
            ).catch((e) => {
            })
        },
        uploadFileMatTruoc(e) {
            this.selectedFile.matTruoc = e.target.files[0]
            let file = e.target.files[0];
            this.urlUpload.matTruoc = URL.createObjectURL(file);
            console.log(this.urlUpload)
            console.log(this.selectedFile)
        },
        uploadFileMatSau(e) {
            this.selectedFile.matSau = e.target.files[0]
            let file = e.target.files[0];
            this.urlUpload.matSau = URL.createObjectURL(file);
            console.log(this.urlUpload)
            console.log(this.selectedFile)
        },
        uploadFileChanDung(e) {
            this.selectedFile.chanDung = e.target.files[0]
            let file = e.target.files[0];
            this.urlUpload.chanDung = URL.createObjectURL(file);
            console.log(this.urlUpload)
            console.log(this.selectedFile)
        },
        uploadFileGiayTo(e) {
            this.selectedFile.giayTo = e.target.files[0]
            let file = e.target.files[0];
            this.urlUpload.giayTo = URL.createObjectURL(file);
            console.log(this.urlUpload)
            console.log(this.selectedFile)
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
<style>
input {
    opacity: 0;
    cursor: pointer;
    display: block;
    width: 100%;
    border: 1px solid red;
    height: inherit;
}

</style>
