<template>
    <el-row
        :gutter="24"
        v-loading.fullscreen.lock="loading.status" class="row">
        <el-col :sm="8" :md="4" class="d-grid">
            <label>Từ khóa</label>
            <el-input placeholder="Nhập..."

                      style="width: 100%"
                      v-model="dataSearch.key"
            ></el-input>
        </el-col>
        <el-col :sm="8" :md="4" class="d-grid">
            <label>Từ ngày</label>
            <el-date-picker
                v-model="dataSearch.tuNgay"
                type="date"
                style="width: 100%"
                format="dd/MM/yyyy"
                value-format="yyyy-MM-dd "
                placeholder="Chọn ngày">
            </el-date-picker>
        </el-col>
        <el-col :sm="8" :md="4" class="d-grid">
            <label>Đến ngày</label>
            <el-date-picker

                style="width: 100%"
                v-model="dataSearch.denNgay"
                type="date"
                format="dd/MM/yyyy"
                value-format="yyyy-MM-dd"
                placeholder="Chọn ngày">
            </el-date-picker>
        </el-col>
        <el-col :sm="8" :md="8">
            <label style="color: transparent" class="d-block">Tìm kiếm</label>
            <el-button type="success" @click.prevent="getData(1)">Tìm kiếm
            </el-button>
            <el-button type="primary" @click.prevent="getData(2)">Xuất excel
            </el-button>
        </el-col>
        <el-col :span="24" style="padding-top:10px">
            <div class="card">
                <div class="card-header">
                    <el-row :gutter="24">
                        <el-col :span="12">
                            <h5 class="card-title">Danh sách khoản vay</h5></el-col>

                    </el-row>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table-bordered table hover-table">
                            <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Số hợp đồng</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <!--                                <th>Loại tài khoản</th>-->
                                <!--                                <th>CMND/CCCD</th>-->
                                <!--                                <th>Giới tính</th>-->
                                <!--                                <th>Ngày sinh</th>-->
                                <!--                                <th>Nghề nghiệp</th>-->
                                <!--                                <th>Thu nhập</th>-->
                                <th>Mục đích vay</th>
                                <!--                                <th>SĐT người thân</th>-->
                                <!--                                <th>Mối quan hệ với người thân</th>-->
                                <!--                                <th>Ngân hàng</th>-->
                                <!--                                <th>Số tài khoản</th>-->
                                <!--                                <th>Chủ tài khoản</th>-->
                                <!--                                <th>Ảnh CMND/CCCD mặt trước</th>-->
                                <!--                                <th>Ảnh CMND/CCCD mặt sau</th>-->
                                <!--                                <th>Ảnh chân dung</th>-->
                                <!--                                <th>Giấy tờ liên quan</th>-->
                                <!--                                <th>Ảnh chữ ký</th>-->
                                <th>Số tiền vay</th>
                                <!--                                <th>Lãi suất</th>-->
                                <th>Thời hạn vay</th>
                                <th>Tiền trả mỗi kỳ</th>
                                <!--                                <th>Số dư</th>-->
                                <th>Thời gian yêu cầu vay</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody v-if="list_data&&list_data.length">
                            <tr v-for="(item,index) in list_data" :key="index">
                                <td class="text-center">{{ index + 1 }}</td>
                                <td class="text-center">{{ 'HDVV0' + item.id }}</td>
                                <td class="text-center">{{ item.ho_ten }}</td>
                                <td class="text-center">
                                    {{ item.thong_tin_tai_khoan ? item.thong_tin_tai_khoan.phone : '' }}
                                </td>
                                <td class="text-center">{{ item.dia_chi }}</td>
                                <!--                                <td class="text-center">{{ item.cmnd }}</td>-->
                                <!--                                <td class="text-center">{{-->
                                <!--                                        item.thong_tin_tai_khoan ? (item.thong_tin_tai_khoan.type == 2 ? 'Doanh nghiệp' : 'Cá nhân') : 'Chưa xác định'-->
                                <!--                                    }}-->
                                <!--                                </td>-->
                                <!--                                <td class="text-center">{{ item.gioi_tinh }}</td>-->
                                <!--                                <td class="text-center">{{ item.ngay_sinh }}</td>-->
                                <!--                                <td class="text-center">{{ item.nghe_nghiep }}</td>-->
                                <!--                                <td class="text-center">{{ item.thu_nhap }}</td>-->
                                <td class="text-center">{{ item.muc_dich_vay }}</td>
                                <!--                                <td class="text-center">{{ item.sdt_nguoi_than }}</td>-->
                                <!--                                <td class="text-center">{{ item.moi_quan_he }}</td>-->
                                <!--                                <td class="text-center">{{ item.ngan_hang }}</td>-->
                                <!--                                <td class="text-center">{{ item.so_tai_khoan }}</td>-->
                                <!--                                <td class="text-center">{{ item.chu_tai_khoan }}</td>-->
                                <!--                                <td class="text-center">-->
                                <!--                                    <el-card shadow="always">-->
                                <!--                                        <img :src="item.anh_mat_truoc" alt=""-->
                                <!--                                             style="min-width:100px;min-height:100px;max-width:150px;max-height:150px">-->
                                <!--                                    </el-card>-->
                                <!--                                </td>-->
                                <!--                                <td class="text-center">-->
                                <!--                                    <el-card shadow="always">-->
                                <!--                                        <img :src="item.anh_mat_sau" alt=""-->
                                <!--                                             style="min-width:100px;min-height:100px;max-width:150px;max-height:150px">-->
                                <!--                                    </el-card>-->
                                <!--                                </td>-->
                                <!--                                <td class="text-center">-->
                                <!--                                    <el-card shadow="always">-->
                                <!--                                        <img :src="item.anh_chan_dung" alt=""-->
                                <!--                                             style="min-width:100px;min-height:100px;max-width:150px;max-height:150px">-->
                                <!--                                    </el-card>-->
                                <!--                                </td>-->
                                <!--                                <td class="text-center">-->
                                <!--                                    <el-card shadow="always">-->
                                <!--                                        <img :src="item.anh_giay_to" alt=""-->
                                <!--                                             style="min-width:100px;min-height:100px;max-width:150px;max-height:150px">-->
                                <!--                                    </el-card>-->
                                <!--                                </td>-->
                                <!--                                <td class="text-center">-->
                                <!--                                    <el-card shadow="always">-->
                                <!--                                        <img :src="item.chu_ky" alt=""-->
                                <!--                                             style="min-width:100px;min-height:100px;max-width:150px;max-height:150px">-->
                                <!--                                    </el-card>-->
                                <!--                                </td>-->
                                <td class="text-center">{{ parseInt(item.so_tien_vay ?? 0).toLocaleString() }} vnđ</td>
                                <!--                                <td class="text-center">{{ (parseInt(item.lai_suat??0) / 100).toFixed(2) }}%</td>-->
                                <td class="text-center">{{ item.thoi_han_vay }}</td>
                                <td class="text-center">{{ (item.tra_moi_ky ?? 0).toLocaleString() }} vnđ</td>
                                <!--                                <td class="text-center">{{ (item.so_du??0).toLocaleString() }} vnđ</td>-->
                                <td class="text-center">{{ item.created_at }}</td>
                                <td class="text-center">{{
                                        item.trang_thai == 1 ? 'Đã duyệt' : item.trang_thai == 0 ? 'Chưa duyệt' : 'Đã từ chối'
                                    }}
                                </td>
                                <td class="text-center">
                                    <el-button :disabled="item.trang_thai == 1" @click.prevent="updateStatus(item,1)"
                                               size="mini" type="success">Duyệt
                                    </el-button>
                                    <el-button :disabled="item.trang_thai == 1 " @click.prevent="updateStatus(item,2)"
                                               size="mini" type="danger">Từ chối
                                    </el-button>
                                    <el-button :disabled="item.trang_thai == 1 " @click.prevent="updateStatus(item,3)"
                                               size="mini" type="warning">Yêu cầu
                                        cung cấp lại hình ảnh
                                    </el-button>
                                </td>

                            </tr>
                            </tbody>
                            <tbody v-else>
                            <tr>
                                <td colspan="10" class="text-center">
                                    <p>Không có dữ liệu</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <PhanTrang v-show="paging.total>0" :tongbanghi="paging.total"
                                   :batdau="trangbatdau"
                                   @pageChange="layLai($event)">
                        </PhanTrang>
                    </div>
                </div>
            </div>
        </el-col>
    </el-row>
</template>
<script>
import rest_api from "../../api/rest_api";
import Vue from 'vue';
import ElementUI from 'element-ui';
import PhanTrang from "../Ui/phanTrang.vue";
import * as XLSX from 'xlsx';
import {saveAs} from 'file-saver';
import {
    Icon
} from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/vi'

Vue.use(ElementUI, {locale})
Vue.use(Icon);
export default {
    components: {
        PhanTrang
    },
    data() {
        return {
            list_data: [],
            list_data_export: [],
            loading: {
                status: false,
                text: 'Loading...'
            },
            dataSearch: {
                tuNgay: '',
                denNgay: '',
                key: '',
                type: 1
            },
            trangbatdau: false,
            paging: {
                total: 0,
                start: 0,
                limit: 10,
                currentPage: 1
            },
        }
    },
    mounted() {
        console.log('Mounted Giao dịch admin...');
        this.getData(1);
    },
    methods: {
        getData2() {
            console.log('getData2')

            const jsonData = [
                {Name: 'John', Age: 30},
                {Name: 'Jane', Age: 25},
            ];

            const worksheet = XLSX.utils.json_to_sheet(this.list_data_export);

            const columnWidths = [{wch: 5},
                {wch: 5},
                {wch: 30},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
            ]; // Chiều rộng của cột A và B
            worksheet['!cols'] = columnWidths;
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');

            const excelBuffer = XLSX.write(workbook, {bookType: 'xlsx', type: 'array'});
            const data = new Blob([excelBuffer], {type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'});

            saveAs(data, 'excel_file.xlsx');
        },
        updateStatus(item, status) {
            let params = {
                id: item.id,
                trang_thai: status,
            }
            this.loading.status = true;
            this.loading.text = 'Loading...'
            this.list_data = [];

            rest_api.post('/admin/cap-nhat-trang-thai-yeu-cau-vay', params).then(
                response => {
                    if (response.data.rc == 0) {
                        this.getData()
                    } else {
                        this.thongBao('error', response.data.rd)
                    }
                    console.log(this.list_data)
                    this.loading.status = false;
                }
            ).catch((e) => {
            })
        },
        layLai(e) {
            console.log('onPagingClick')
            this.paging.start = e.start;
            this.paging.limit = e.limit;
            this.paging.currentPage = e.currentPage;
            this.getData()
        },
        getData() {
            let e = 1;
            console.log('getData')
            this.dataSearch.type = e == 1 ? 1 : 2;
            let params = {
                tuNgay: this.dataSearch.tuNgay,
                denNgay: this.dataSearch.denNgay,
                toanBo: this.dataSearch.type == 2 ? true : false,
                start: this.paging.start,
                limit: this.paging.limit,
                key: this.dataSearch.key,
            }
            this.loading.status = true;
            this.loading.text = 'Loading...'

            if (this.dataSearch.type == 1) {

                this.list_data = [];
            }
            rest_api.post('/admin/danh-sach-yeu-cau-vay', params).then(
                response => {
                    if (response.data.rc == 0) {
                        if (this.dataSearch.type == 1) {
                            this.list_data = response.data.data;
                            this.paging.total = response.data.total
                            this.thongBao('success', 'Lấy dữ liệu thành công')
                        } else {
                            this.list_data_export = response.data.data
                            this.getData2()
                        }
                    } else {
                        this.thongBao('error', response.data.rd)
                    }
                    console.log(this.list_data)
                    this.loading.status = false;
                }
            ).catch((e) => {
            })
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
<style scoped="scoped">
th {
    text-align: center;
}

.el-date-table td {
    border: none !important;
}
</style>
